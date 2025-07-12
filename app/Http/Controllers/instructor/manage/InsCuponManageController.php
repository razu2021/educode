<?php

namespace App\Http\Controllers\instructor\manage;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response; 
use Carbon\Carbon; //----------  defualt -------
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Course_price;
use App\Models\DiscountCoupon;
class InsCuponManageController extends Controller
{
     /**
     * =============================================================
     * ==============================================================================================  SHOW FUNCTION START HERE ========================================================
     * =============================================================
     */
    public function index(Request $request){
        $user_id = Auth::user()->id;
        $search = $request['search'] ?? "";
        if($search !=""){
            $all = DiscountCoupon::where('user_id',$user_id)->where('status',1)->where('original_price','LIKE',"%$search%")
            ->orWhere('discounted_price','LIKE',"%$search%")->orWhere('currency','LIKE',"%$search%")->orWhere('pricing_type','LIKE','%search%')->get();
        }else{
            $all = DiscountCoupon::where('user_id',$user_id)->where('status',1)->get();
        }
        return view('instructor.manage.coupon.index',compact('all'));
    }


    public function all_data(){
       
        $user_id = Auth::user()->id;
        $all = Course::with(['coursePrice','courseCoupon'])->where('user_id',$user_id)->where('status',1)->get();
         foreach($all as $course ){
           $course->calculatedPrice =$this->calculateCoursePrice($course);
        }
          return view('instructor.manage.coupon.all_data',compact('all'));
    }



    public function apply_coupon(Request $request){
    $course_id = $request->course_id;
    $coupon_code = $request->coupon_code;

    // Find Course
    $course = Course::with(['coursePrice', 'courseCoupon'])->findOrFail($course_id);

    // Find Coupon for the Course
    $coupon = DiscountCoupon::where('code', strtoupper($coupon_code))
                ->where('course_id', $course_id)
                ->first();


    // Check if coupon exists 
    if (!$coupon) {
        return response()->json([
            'status' => false,
            'message' => 'Invalid coupon code for this course.',
        ]);
    }

    $today = Carbon::now();
    $startDate = Carbon::parse($coupon->start_date);
    $endDate = Carbon::parse($coupon->end_date);

    // ✅ Check if Coupon is Valid (within date range)
    if (!($today->between($startDate, $endDate))) {
        return response()->json([
            'status' => false,
            'message' => 'This coupon is not valid at this time.',
        ]);
    }

    // ⬇️ Continue price calculation here if valid
   $calculatedPrice = $this->calculateCoursePrice($course, $coupon);

    return response()->json([
        'status' => true,
        'html' => view('instructor.manage.coupon.all_data', [
            'priceInfo' => $calculatedPrice
        ])->render()
    ]);
}

private function calculateCoursePrice($course = null , $coupon = null){


    $price = $course->coursePrice->original_price ?? 0 ;
    $discount = $course->coursePrice->discounted_price ?? null ;
    $startDate = $course->coursePrice->start_date ?? null ;
    $endDate = $course->coursePrice->end_date ?? null ;
    $currency = $course->coursePrice->currency ?? 'BDT' ;
    $today = \Carbon\Carbon::now();

    $isDiscountActive  = false;

    if(!empty($discount) && $discount > 0){
        if(empty($startDate) && empty($endDate)){
        $isDiscountActive = true ;
        }elseif (!empty($startDate) && empty($endDate)) {
            $isDiscountActive = $today->gte($startDate) ;
        }elseif (empty($startDate) && !empty($endDate)) {
        $isDiscountActive = $today->lte($endDate) ;
        }elseif (!empty($startDate) && !empty($endDate)) {
            $isDiscountActive = $today->between($startDate,$endDate) ;
        }
    }
      // Base price (after course discount if applicable)
    $basePrice = $isDiscountActive ? ($price - $discount) : $price;

    // Coupon Discount Logic
    $couponDiscountAmount = 0;
    $finalPrice = $basePrice;

    if ($coupon && $coupon->discount_amount > 0) {
        if ($coupon->discount_type === 'percentage') {
            $couponDiscountAmount = ($basePrice * $coupon->discount_amount) / 100;
        } elseif ($coupon->discount_type === 'fixed') {
            $couponDiscountAmount = $coupon->discount_amount;
        }

        // Now subtract coupon from base price
        $finalPrice = max($basePrice - $couponDiscountAmount, 0);
    }

   return [
        'original_price' => $price,
        'discounted_price' => $discount,
        'is_discount_active' => $isDiscountActive,
        'base_price' => $basePrice, // after course discount
        'coupon_discount' => $couponDiscountAmount,
        'final_price' => $finalPrice, // after course + coupon
        'coupon_code' => $coupon?->code,
        'currency' => $currency,

    ];

}








   /**
    * ---------  add page functionality --------
    **/

    public function add($id,$slug){
        $user_id = Auth::user()->id;
        $data = Course::where('user_id',$user_id)->where('id',$id)->where('slug',$slug)->firstOrFail();
       
        return view('instructor.manage.coupon.add',compact('data'));
    }

   /**
    * ---------  view page functionality --------
    **/
    public function view($id,$slug){
        $user_id = Auth::user()->id;
        $data=DiscountCoupon::where('user_id',$user_id)->where('id',$id)->where('slug',$slug)->firstOrFail();
        return view('instructor.manage.coupon.view',compact('data'));
    }


   /**
    * ---------  edit page functionality --------
    **/
    public function edit($id,$slug){
        $totalpost  = DiscountCoupon::get()->count();
        $latestPost = DiscountCoupon::latest()->first();
        $user_id = Auth::user()->id;
        $data=DiscountCoupon::where('user_id',$user_id)->where('id',$id)->where('slug',$slug)->firstOrFail();
        return view('instructor.manage.coupon.edit',compact('totalpost','latestPost','data'));
    }


   /**
     * =======================================================================
     * ==============================================================================================  CREATE FUNCTION START HERE ========================================================
     * =======================================================================
     */
    public function insert(Request $request){
        /**--- validation code -- */
        $request->validate([
                'discount_amount'  => 'required',
                'max_usage'  => 'required',
            ],[
                'original_price.required'=> 'Original Price is Required !',
            ]
        );
        // ------  create a slug & get creator id -------
        $slug = uniqid('20').Str::random(20) . '_'.mt_rand(10000, 100000).'-'.time();
        $code = strtoupper(Str::random(6)) . mt_rand(1000, 9999);
        $type = 'course';
        $discount_type = 'fixed';
        $user_id = Auth::user()->id;
        //-------  insert category record --------
        $insert = DiscountCoupon::create([
            'discount_amount'=>$request->discount_amount,
            'max_usage'=>$request->max_usage,
            'code'=>$code,
            'type'=>$type,
            'discount_type'=>$discount_type,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'course_id'=>$request->course_id,
            'public_status'=>1,
            'slug'=>$slug,
            'user_id' => $user_id,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
        // insert Successfully 
        if($insert){
            flash()->success('Information Added Successfuly');
            return redirect()->route('ins_coupon.all_data');
        }else{
            flash()->error('Informatin Added Faild !');
        }
        return redirect()->back();
    }


   /**
     * ===========================================================
     * ==============================================================================================  UPDATE FUNCTION START HERE ========================================================
     * ===========================================================
     */
    public function update(Request $request){
           /**--- validation code -- */
        $request->validate([
                'original_price'  => 'required',
                'currency'  => 'required',
                'pricing_type'  => 'required',
            ],[
                'original_price.required'=> 'Original Price is Required !',
            ]
        );
        //--- get specific Credential for update record & editor id --------
        $id = $request->id;
        $slug = $request->slug;
        $user_id = Auth::user()->id;

        //---------category update -------//
        $update = DiscountCoupon::where('user_id',$user_id)->where('id',$id)->where('slug',$slug)->update([
                'original_price'=>$request->original_price,
                'discounted_price'=>$request->discounted_price,
                'currency'=>$request->currency,
                'pricing_type'=>$request->pricing_type,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        // ------insert Successfully--------// 
        if($update){
            flash()->success('Information Update Successfuly');
        }else{
            flash()->error('Informatin Update Faild !');
        }
        return redirect()->route('ins_coupon.view',[$id,$slug]);

    } // update end 


   /**
     * =================================================
     * =========================================================================== SOFT,HEARD DELETE, RESTORE ,RECYCLE,ACTIVE ,DEACTIVE FUNCTION START HERE ========================================================
     * ================================================
     */
    public function softdelete($id){
        $user_id = Auth::user()->id;
        $data= DiscountCoupon::where('user_id',$user_id)->where('id',$id)->first();
        $data->delete();
        // ----Delete Successfully ----//
        if($data){
            flash()->success('Information Delete Successfuly');
        }else{
            flash()->error('Informatin Delete Faild !');
        }
        return redirect()->back();
    }

   /**
    * ---------  restore  page functionality --------
    **/
    public function restore($id){
        $user_id = Auth::user()->id;
        $data = DiscountCoupon::withTrashed()->where('user_id',$user_id)->where('id', $id)->first();
        $data->restore();
        // Delete Successfully 
        if($data){
            flash()->success('Information Restore Successfuly!');
        }else{
            flash()->error('Informatin Restore Faild !');
        }
        return redirect()->back();
    }


   /**
    * ---------  Heard Delete  functionality --------
    **/
    public function delete($id){
        $user_id = Auth::user()->id;
        $data = DiscountCoupon::onlyTrashed()->where('user_id',$user_id)->where('id', $id)->first();
        if($data) {
            $data->forceDelete();
            flash()->success('Record Deleted Successfully');
        } else {
            flash()->error('Delete Record Failed!');
        }
        return redirect()->back();
    }
    


   /**
    * ---------  Published post  functionality --------//
    **/
    public function public_status($id,$slug){
        $user_id = Auth::user()->id;
        $published = DiscountCoupon::where('user_id',$user_id)->where('id',$id)->where('slug',$slug)->where('public_status',0)->update([
            'public_status'=>1,
        ]);
        // Delete Successfully 
        if($published){
            flash()->success('Information Published Successfully !');
        }else{
            flash()->error('Informatin Published Faild !');
        }
        return redirect()->back();
    }

   /**
    * ---------  Private post  functionality --------//
    **/
    public function private_status($id,$slug){
        $user_id = Auth::user()->id;
        $private = DiscountCoupon::where('user_id',$user_id)->where('id',$id)->where('slug',$slug)->where('public_status',1)->update([
            'public_status'=>0,
        ]);
        // Delete Successfully 
        if($private){
            flash()->success('Information Private Successfully !');
        }else{
            flash()->error('Informatin Private Faild !');
        }
        return redirect()->back();
    }


   /**
    * ---------  Recycle  page functionality --------//
    **/
    public function recycle(){
        $user_id = Auth::user()->id;
        $all = DiscountCoupon::onlyTrashed()->where('user_id',$user_id)->get();
        return view('instructor.manage.coupon.recycle',compact('all'));
    }
   /**
     * =====================================================
     * ==============================================================================================  BULK ACTION FUNCTION START HERE ========================================================
     * =====================================================
     */

    public function bulkAction(Request $request)
    {
        //----- get multiple items id or bulk record -----//
     
        $ids = $request->input('ids', []);
        $action = $request->input('action');
         $user_id = Auth::user()->id;
        if (empty($ids)) {
            return response()->json(['success' => false, 'message' => 'No IDs selected.']);
        }
    
        //----- for multiple items soft delete ----//
        if ($action === 'delete') {
            DiscountCoupon::whereIn('id', $ids)->where('user_id',$user_id)->delete();
            return response()->json(['success' => true, 'message' => 'Selected Items deleted.']);
        }
        //--- for multiple items heard delete -------//
        if ($action === 'heard_delete') {
            $categories = DiscountCoupon::onlyTrashed()->whereIn('id', $ids)->where('user_id',$user_id)->get();
        
            foreach ($categories as $category) {
                // 4. Category force delete
                $category->forceDelete();
            }
        
            return response()->json(['success' => true, 'message' => 'Selected categories permanently deleted.']);
        }
        
    
        //---- for multiple items resotre --------//
        if ($action === 'restore') {
            $categories = DiscountCoupon::onlyTrashed()->whereIn('id', $ids)->where('user_id',$user_id)->get();
            if($categories){
                foreach($categories as $data){
                    $data->restore();
                }
            }
            return response()->json(['success' => true, 'message' => 'Selected categories archived.']);
        }
        //----- for multiple items active ----//
        if ($action === 'active') {
            $categories = DiscountCoupon::whereIn('id', $ids)->where('user_id',$user_id)->get();

            if($categories){
                foreach($categories as $data){
                    DiscountCoupon::whereIn('id',$ids)->where('public_status',0)->where('user_id',$user_id)->update([
                        'public_status'=>1,
                    ]);
                }
            }
            return response()->json(['success' => true, 'message' => 'Active process started.']);
        }

        //--  for multiple items deactive ----- //
        if ($action === 'deactive') {
            $categories = DiscountCoupon::whereIn('id', $ids)->get();
            if($categories){
                foreach($categories as $data){
                    DiscountCoupon::whereIn('id',$ids)->where('user_id',$user_id)->where('public_status',1)->update([
                        'public_status'=>0,
                    ]);
                }
            }
            return response()->json(['success' => true, 'message' => 'Deactive process started.']);
        }
        return response()->json(['success' => false, 'message' => 'Invalid action.']);
    } // bulk action end here 
    
}
