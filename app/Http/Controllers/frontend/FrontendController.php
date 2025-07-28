<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CourseCategory;
use App\Models\Course;
use App\Models\CourseChildCategory;
use App\Models\CourseSubCategory;
use App\Models\DiscountCoupon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\CourseFilterTrait;

use Illuminate\Support\Facades\Log;

class FrontendController extends Controller
{
    use CourseFilterTrait;
    /**----------  index page function ----- */
    public function index(){
       // $all = Course::where()->get();
        return view('frontend.index');
    }
    /**----------  about page function ----- */
    public function about(){
        return view('frontend.pages.about');
    }


    /**
     * 
     * ===============  course details functionality ===========
     */
    public function courseDetails($courseurl,$courseslug ){

        $allcategorycourse  = CourseCategory::where('public_status',1)->get();
      
        $data = Course::with(['coursePrice'])->where('url',$courseurl)->where('slug',$courseslug)->firstOrFail();

        // Increase view count
        $data->increment('view_count');


        // Get coupon from query (or session/form later)
      
        $priceData = $this->calculatePrices($data);

        return view('frontend.pages.course.course_details',compact('data','allcategorycourse','priceData'));
    }

    // 2. Apply Coupon via AJAX
    public function applyCoupon(Request $request)
    {
      
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'coupon_code' => 'required|string',
        ]);

        $course = Course::with('coursePrice')->findOrFail($request->course_id);

        // Pass coupon code for calculation
        $priceData = $this->calculatePrices($course, $request->coupon_code);

        if (!$priceData['coupon_applied']) {
            return response()->json([
                'status' => 'invalid',
                'message' => 'Invalid or expired coupon code.',
            ], 422);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Coupon applied successfully!',
                'priceData' => [
                    'currency' => $priceData['currency'],
                    'final_price' => $priceData['final_price'],
                    'coupon_discount' => $priceData['coupon_discount'],
                    // অন্য দরকারি ফিল্ডও নিতে পারো
                ],

        ]);
    }



    private function calculatePrices($course , $couponCode = null){
        $original = $course->coursePrice->original_price ?? 0;
        $discount = $course->coursePrice->discounted_price ?? null;
        $startDate = $course->coursePrice->start_date ?? null;
        $endDate = $course->coursePrice->end_date ?? null;
        $currency = $course->coursePrice->currency ?? 'BDT';

        $today = \Carbon\Carbon::now();
        $isDiscountActive = false;

        if (!empty($discount) && $discount > 0) {
            if (empty($startDate) && empty($endDate)) {
                $isDiscountActive = true;
            } elseif (!empty($startDate) && empty($endDate)) {
                $isDiscountActive = $today->gte($startDate);
            } elseif (empty($startDate) && !empty($endDate)) {
                $isDiscountActive = $today->lte($endDate);
            } elseif (!empty($startDate) && !empty($endDate)) {
                $isDiscountActive = $today->between($startDate, $endDate);
            }
        }

        // get the final price after discounted amount 
        $finalPrice = $isDiscountActive ? ($original - $discount) : $original;
        Log::info('final price after discount price : ' . $finalPrice);

        $appliedCoupon = null;
        $couponDiscountAmount = 0;

        if($couponCode){
             $coupon = DiscountCoupon::where('code', $couponCode)->where('public_status',1)->first();

           
            
           
            if ($coupon) {
                 Log::info('coupon info : ' . $coupon->code );
                 Log::info('coupon info : ' . $coupon-> discount_amount);
                $appliedCoupon = $coupon->code;

            if ($coupon->discount_type === 'fixed') {
                $couponDiscountAmount = $coupon->discount_amount;
            } elseif ($coupon->discount_type === 'percentage') {
                $couponDiscountAmount = ($finalPrice * $coupon->discount_amount) / 100;
                Log::info('coupon info percentage: ' . $couponDiscountAmount);
            }

            $finalPrice = $finalPrice - $couponDiscountAmount;

          Log::info('coupon final price  : ' . $finalPrice);

        }

        }


    // Never go below zero
    $finalPrice = max(0, $finalPrice);

        return [
        'original_price' => $original,
        'discounted_price' => $discount,
        'is_discount_active' => $isDiscountActive,
        'coupon_applied' => $appliedCoupon,
        'coupon_discount' => $couponDiscountAmount,
        'final_price' => $finalPrice,
        'currency' => $currency,
        'valid_until' => $isDiscountActive ? ($endDate ?? null) : null, // 👈 Added
        'days_left' => $isDiscountActive && $endDate ? \Carbon\Carbon::now()->diffInDays($endDate, false) : null,
        ];
    }





    /** Purchese product  */
    public function purchese_product(){
        return view('frontend.pages.purchase');
    }




    /** ===============  course category function =========== */

    public function all_course_Category(Request $request){
       
        $allcategorycourse= CourseCategory::get(); // find the course catergory 
        $CourseSubCategory= CourseSubCategory::where('public_status',1)->get();
        $allchildCategory= CourseChildCategory::where('public_status',1)->get();
        $totalcourse = Course::count();
       
        $query = $this->filterCourses($request);  

        $all = $query->paginate(30); 
        if ($request->ajax()) {
            if ($all->count() > 0) {
                $html = view('frontend.pages.course.components.course_card3', compact('all'))->render();
                return response()->json(['html' => $html, 'empty' => false]);
            } else {
                return response()->json(['html' => '', 'empty' => true]);
            }
        }

        return view('frontend.pages.course.Allcategory_course',compact('allcategorycourse','all','totalcourse','CourseSubCategory','allchildCategory
        '));
    }



    /**
     * 
     * 
     * ==========  course category function ===================
     */
        public function course_Category(Request $request , $category_url){
            $allcategorycourse  = CourseCategory::where('public_status',1)->get();
            $category = CourseCategory::where('url',$category_url)->firstOrFail();
            $CourseSubCategory = CourseSubCategory::where('public_status',1)->where('course_category_id',$category->id)->get();
            $populerTopics = CourseSubCategory::where('public_status',1)->where('course_category_id',$category->id)->get();
            
            //--- find instructor 
            $instructorId= Course::where('course_category_id',$category->id)->pluck('user_id')->unique()->toArray();

            $instructorDetails = User::whereIn('id',$instructorId)->where('role',1)->get();

           

            // ✅ Use fixed relation
            $baseQuery = $category->CourseCategorys()->where('status', 1);

            $query = $this->filterCourses($request, $baseQuery);

            $all = $query->where('course_category_id',$category->id)->paginate(30);

            $totalcourse =  $all->count();

            if ($request->ajax()) {
                if ($all->count() > 0) {
                    $html = view('frontend.pages.course.components.course_card3', compact('all'))->render();
                    return response()->json(['html' => $html, 'empty' => false]);
                } else {
                    return response()->json(['html' => '', 'empty' => true]);
                }
            }

            return view('frontend.pages.course.course_category', [
                'allcategorycourse' => $allcategorycourse,
                'bannerdata'=> $category,
                'all' => $all,
                'totalcourse' => $totalcourse,
                'category' => $category,
                'CourseSubCategory' => $CourseSubCategory,
                'populerTopics' => $populerTopics,
                'instructorDetails' => $instructorDetails,
            ]);
        }



    /**
     * ============================================================================================
     *  ==========  subcategory functionality start here ===========
     * ============================================================================================
     * */
    public function course_SububCategory(Request $request , $category_url,$course_subcategory){
        // ------ find actual category 
        $category = CourseCategory::where('url',$category_url)->firstOrFail();

        //--- find  a subcategory item 
        $CourseSubCategory = CourseSubCategory::where('public_status',1)->where('course_category_id',$category->id)->where('url',$course_subcategory)->firstOrFail();

        //--- find all category for show extra menu items & use also filter 
        $allcategorycourse  = CourseCategory::where('public_status',1)->get();

        $allsubcategory = CourseSubCategory::where('public_status',1)->where('course_category_id',$category->id)->get();

        $allchildCategory = CourseChildCategory::where('public_status',1)->where('course_category_id',$category->id)->where('course_sub_category_id',$CourseSubCategory->id)->get();

        //---------- find populet topics 
        $populerTopics =  CourseChildCategory::where('public_status',1)->where('course_sub_category_id',$CourseSubCategory->id)->get();
   
     
       /**--------------  find course with fiter ----------- */
        $baseQuery = $CourseSubCategory->course()->where('status', 1);

        $query = $this->filterCourses($request, $baseQuery);

        $all = $query->where('course_subcategory_id',$CourseSubCategory->id)->paginate(30);

        $totalcourse =  $all->count();

        if ($request->ajax()) {
            if ($all->count() > 0) {
                $html = view('frontend.pages.course.components.course_card3', compact('all'))->render();
                return response()->json(['html' => $html, 'empty' => false]);
            } else {
                return response()->json(['html' => '', 'empty' => true]);
            }
        }
        /**--------------  find course with fiter ----------- */

   


        return view('frontend.pages.course.course_subcategory',[
            'allcategorycourse' => $allcategorycourse,
            'bannerdata' => $CourseSubCategory,
            'all' =>$all, 
            'totalcourse' => $totalcourse,
            'CourseSubCategory' => $allsubcategory,
            'allchildCategory' => $allchildCategory,
            //-------------------------
            'category_url' => $category->url,
            'subcategory_url' => $CourseSubCategory->url,
            'category_url' => $category->url,
            'populerTopics' => $populerTopics,


            
        ]);
    }








    public function course_childubCategory(Request $request, $category_url,$course_subcategory,$course_childCategory){
        
        // --- Find Category 
        $category = CourseCategory::where('url',$category_url)->firstOrFail();
        
        //--- find  a subcategory item match with Category 
        $CourseSubCategory = CourseSubCategory::where('public_status',1)->where('course_category_id',$category->id)->where('url',$course_subcategory)->firstOrFail();

        // --- find cahild category .. wherer categoryId, sucCategoryId is metch 
        $courseChildCategory = CourseChildCategory::where('public_status',1)->where('course_category_id',$category->id)->where('course_sub_category_id',$CourseSubCategory->id)->where('url',$course_childCategory)->firstOrFail();
       

        /** --- find all category  use for data filter --- */
        $allcategorycourse  = CourseCategory::where('public_status',1)->get();

        $allsubcategory = CourseSubCategory::where('public_status',1)->where('course_category_id',$category->id)->get();

        $allchildCategory = CourseChildCategory::where('public_status',1)->where('course_category_id',$category->id)->where('course_sub_category_id',$CourseSubCategory->id)->get();
        /** --- find all category  use for data filter --- */





        /**--------------  find course with fiter ----------- */
        $baseQuery = $courseChildCategory->course()->where('status', 1);

        $query = $this->filterCourses($request, $baseQuery);

        $all = $query->where('course_childcategory_id',$courseChildCategory->id)->paginate(30);

        $totalcourse =  $all->count();

        if ($request->ajax()) {
            if ($all->count() > 0) {
                $html = view('frontend.pages.course.components.course_card3', compact('all'))->render();
                return response()->json(['html' => $html, 'empty' => false]);
            } else {
                return response()->json(['html' => '', 'empty' => true]);
            }
        }
        /**--------------  find course with fiter ----------- */






        return view('frontend.pages.course.course_childcategory',[
            'bannerdata' => $courseChildCategory,
            'all' => $all,
            'totalcourse' => $totalcourse,
            'allcategorycourse' => $allcategorycourse,
            'CourseSubCategory' => $allsubcategory,
            'allchildCategory' => $allchildCategory,
            //-----------------------------
            'category_url'=>$category->url,
            'subcategory_url'=>$CourseSubCategory->url,
            'childcategory_url'=>$courseChildCategory->url,
        ]);



    }





    // instructor  detais 
    public function instructor_details(){
        return view('frontend.pages.course.instructor_profile');
    }



    







/** function body end  */
}
/** function body end  */
