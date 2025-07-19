<?php

namespace App\Http\Controllers\instructor\manage;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; //----------  defualt -------
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Course_topic;
use App\Models\courseQuize;
use App\Models\courseQuizeQustions;

class InsQuizeQustionController extends Controller
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
            $all = courseQuizeQustions::with('quize.course')->where('user_id',$user_id)->where('status',1)->where(function ($query) use ($search) {
                $query->where('question', 'LIKE', "%$search%")
                    ->orWhere('answer', 'LIKE', "%$search%")
                  
                    
                    // Search in course_topic table (e.g. mdrazuhossainraj01817078309course_name)
                    ->orWhereHas('quize', function ($q) use ($search) {
                        $q->where('title', 'LIKE', "%$search%");
                    })

                    //  Search in course table (e.g. title)
                    ->orWhereHas('quize.course', function ($q) use ($search) {
                        $q->where('course_name', 'LIKE', "%$search%");
                    });
            })
            ->get();
        }else{
            $all = courseQuizeQustions::with(['quize.course'])->where('user_id',$user_id)->where('status',1)->get();
        }
        return view('instructor.manage.quizequstion.index',compact('all'));
    }


    public function all_data(){
        $user_id = Auth::user()->id;
        $all = Course::with(['courseQuizzes','courseQuizzes.quizeQustions'])->withCount('courseQuizzes')->where('user_id',$user_id)->where('status',1)->get();
  
     
        return view('instructor.manage.quizequstion.all_data',compact('all'));
    }
    public function all_topics($id,$slug){
        $user_id = Auth::user()->id;
        $all =Course::with(['courseQuizzes','courseQuizzes.quizeQustions'])->where('user_id',$user_id)->where('slug',$slug)->where('status',1)->get();
      
        return view('instructor.manage.quizequstion.all_topics',compact('all'));
    }


   /**
    * ---------  add page functionality --------
    **/

    public function add($id,$slug){
        $user_id = Auth::user()->id;
        $data = Course::with(['courseQuizzes'])->where('user_id',$user_id)->where('id',$id)->where('slug',$slug)->firstOrFail();
        return view('instructor.manage.quizequstion.add',compact('data'));
    }

   /**
    * ---------  view page functionality --------
    **/
    public function view($id,$slug){
        $user_id = Auth::user()->id;
        $data=courseQuizeQustions::where('user_id',$user_id)->where('id',$id)->where('slug',$slug)->firstOrFail();
        return view('instructor.manage.quizequstion.view',compact('data'));
    }


   /**
    * ---------  edit page functionality --------
    **/
    public function edit($id,$slug){
        $user_id = Auth::user()->id;
        $data=courseQuizeQustions::with(['quize.course'])->where('user_id',$user_id)->where('id',$id)->where('slug',$slug)->firstOrFail();
        $course_id = $data->quize->course_id;
       // dd($course_id);
        
        $course_topic = courseQuize::where('course_id',$course_id)->get();
    
        return view('instructor.manage.quizequstion.edit',compact('data','course_topic'));
    }


   /**
     * =======================================================================
     * ==============================================================================================  CREATE FUNCTION START HERE ========================================================
     * =======================================================================
     */
    public function insert(Request $request){
       
        /**--- validation code -- */
        $request->validate([
                'quize_id'  => 'required',
                'question'  => 'required',
                'option1'  => 'required',
                'option2'  => 'required',
                'option3'  => 'required',
                'option4'  => 'required',
                'answer'  => 'required',
            ],[
                'quize_id.required'=> 'Select your Quiz Name  !',
                'question.required'=> 'Write your Quiz Question!',
                'option1.required'=> 'Option 1 is Required !',
                'option2.required'=> 'Option 2 URL is Required !',
                'option3.required'=> 'Option 3 is Required !',
                'option4.required'=> 'Option 4 is Required !',
                
            ]
        );
      
        // ------  create a slug & get creator id -------
        $slug = uniqid('20').Str::random(20) . '_'.mt_rand(10000, 100000).'-'.time();
        $user_id = Auth::user()->id;
        //-------  insert category record --------
        $insert = courseQuizeQustions::create([
            'quize_id'=>$request->quize_id,
            'question'=>$request->question,
            'option1'=>$request->option1,
            'option2'=>$request->option2,
            'option3'=>$request->option3,
            'option4'=>$request->option4,
            'answer'=>$request->answer,
            'public_status'=>1,
            'slug'=>$slug,
            'user_id' => $user_id,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
        // insert Successfully 
        if($insert){
            flash()->success('Information Added Successfuly');
            return redirect()->route('ins_course_quize_qustion.all_data');
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
        /**--- validation code -- */
        $request->validate([
                'quize_id'  => 'required',
                'question'  => 'required',
                'option1'  => 'required',
                'option2'  => 'required',
                'option3'  => 'required',
                'option4'  => 'required',
                'answer'  => 'required',
            ],[
                'quize_id.required'=> 'Select your Quiz Name  !',
                'question.required'=> 'Write your Quiz Question!',
                'option1.required'=> 'Option 1 is Required !',
                'option2.required'=> 'Option 2 URL is Required !',
                'option3.required'=> 'Option 3 is Required !',
                'option4.required'=> 'Option 4 is Required !',
                
            ]
        );
        //--- get specific Credential for update record & editor id --------
        $id = $request->id;
        $slug = $request->slug;
        $user_id = Auth::user()->id;

        //---------category update -------//
        $update = courseQuizeQustions::where('user_id',$user_id)->where('id',$id)->where('slug',$slug)->update([
             'quize_id'=>$request->quize_id,
            'question'=>$request->question,
            'option1'=>$request->option1,
            'option2'=>$request->option2,
            'option3'=>$request->option3,
            'option4'=>$request->option4,
            'answer'=>$request->answer,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        // ------insert Successfully--------// 
        if($update){
            flash()->success('Information Update Successfuly');
        }else{
            flash()->error('Informatin Update Faild !');
        }
        return redirect()->route('ins_course_quize_qustion.view',[$id,$slug]);

    } // update end 


   /**
     * =================================================
     * =========================================================================== SOFT,HEARD DELETE, RESTORE ,RECYCLE,ACTIVE ,DEACTIVE FUNCTION START HERE ========================================================
     * ================================================
     */
    public function softdelete($id){
        $user_id = Auth::user()->id;
        $data= courseQuizeQustions::where('user_id',$user_id)->where('id',$id)->first();
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
        $data = courseQuizeQustions::withTrashed()->where('user_id',$user_id)->where('id', $id)->first();
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
        $data = courseQuizeQustions::onlyTrashed()->where('user_id',$user_id)->where('id', $id)->first();
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
        $published = courseQuizeQustions::where('user_id',$user_id)->where('id',$id)->where('slug',$slug)->where('public_status',0)->update([
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
        $private = courseQuizeQustions::where('user_id',$user_id)->where('id',$id)->where('slug',$slug)->where('public_status',1)->update([
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
        $all = courseQuizeQustions::onlyTrashed()->where('user_id',$user_id)->get();
        return view('instructor.manage.quizequstion.recycle',compact('all'));
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
            courseQuizeQustions::whereIn('id', $ids)->where('user_id',$user_id)->delete();
            return response()->json(['success' => true, 'message' => 'Selected Items deleted.']);
        }
        //--- for multiple items heard delete -------//
        if ($action === 'heard_delete') {
            $categories = courseQuizeQustions::onlyTrashed()->whereIn('id', $ids)->where('user_id',$user_id)->get();
        
            foreach ($categories as $category) {
                // 4. Category force delete
                $category->forceDelete();
            }
        
            return response()->json(['success' => true, 'message' => 'Selected categories permanently deleted.']);
        }
        
    
        //---- for multiple items resotre --------//
        if ($action === 'restore') {
            $categories = courseQuizeQustions::onlyTrashed()->whereIn('id', $ids)->where('user_id',$user_id)->get();
            if($categories){
                foreach($categories as $data){
                    $data->restore();
                }
            }
            return response()->json(['success' => true, 'message' => 'Selected categories archived.']);
        }
        //----- for multiple items active ----//
        if ($action === 'active') {
            $categories = courseQuizeQustions::whereIn('id', $ids)->where('user_id',$user_id)->get();

            if($categories){
                foreach($categories as $data){
                    courseQuizeQustions::whereIn('id',$ids)->where('public_status',0)->where('user_id',$user_id)->update([
                        'public_status'=>1,
                    ]);
                }
            }
            return response()->json(['success' => true, 'message' => 'Active process started.']);
        }

        //--  for multiple items deactive ----- //
        if ($action === 'deactive') {
            $categories = courseQuizeQustions::whereIn('id', $ids)->get();
            if($categories){
                foreach($categories as $data){
                    courseQuizeQustions::whereIn('id',$ids)->where('user_id',$user_id)->where('public_status',1)->update([
                        'public_status'=>0,
                    ]);
                }
            }
            return response()->json(['success' => true, 'message' => 'Deactive process started.']);
        }
        return response()->json(['success' => false, 'message' => 'Invalid action.']);
    } // bulk action end here 

}
