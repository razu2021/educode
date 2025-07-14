<?php

namespace App\Http\Controllers\instructor\manage;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; //----------  defualt -------
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Course_topic_video;

class InsCourseTopicVideController extends Controller
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
            $all = Course_topic_video::where('user_id',$user_id)->where('status',1)->where('original_price','LIKE',"%$search%")
            ->orWhere('discounted_price','LIKE',"%$search%")->orWhere('currency','LIKE',"%$search%")->orWhere('pricing_type','LIKE','%search%')->get();
        }else{
            $all = Course_topic_video::where('user_id',$user_id)->where('status',1)->get();
        }
        return view('instructor.manage.coursecontentvideo.index',compact('all'));
    }


    public function all_data(){
        $user_id = Auth::user()->id;
        $all = Course::with(['courseTopic','courseTopic.videos'])->withCount('courseTopic')->where('user_id',$user_id)->where('status',1)->get();
    
        return view('instructor.manage.coursecontentvideo.all_data',compact('all'));
    }
    public function all_topics($id,$slug){
        $user_id = Auth::user()->id;
        $all =Course::with(['courseTopic','courseTopic.videos'])->where('user_id',$user_id)->where('slug',$slug)->where('status',1)->get();
    
        return view('instructor.manage.coursecontentvideo.all_topics',compact('all'));
    }


   /**
    * ---------  add page functionality --------
    **/

    public function add($id,$slug){
        $user_id = Auth::user()->id;
        $data = Course::with(['courseTopic'])->where('user_id',$user_id)->where('id',$id)->where('slug',$slug)->firstOrFail();
       
        
        return view('instructor.manage.coursecontentvideo.add',compact('data'));
    }

   /**
    * ---------  view page functionality --------
    **/
    public function view($id,$slug){
        $user_id = Auth::user()->id;
        $data=Course_topic_video::where('user_id',$user_id)->where('id',$id)->where('slug',$slug)->firstOrFail();
        return view('instructor.manage.coursecontentvideo.view',compact('data'));
    }


   /**
    * ---------  edit page functionality --------
    **/
    public function edit($id,$slug){
        $user_id = Auth::user()->id;

        $data=Course_topic_video::with(['topic.course'])->where('user_id',$user_id)->where('id',$id)->where('slug',$slug)->firstOrFail();
        return view('instructor.manage.coursecontentvideo.edit',compact('data'));
    }


   /**
     * =======================================================================
     * ==============================================================================================  CREATE FUNCTION START HERE ========================================================
     * =======================================================================
     */
    public function insert(Request $request){
        /**--- validation code -- */
        $request->validate([
                'topic_id'  => 'required',
                'title'  => 'required',
                'description'  => 'required',
                'video_url'  => 'required',
                'video_type'  => 'required',
                'is_preview'  => 'required',
            ],[
                'topic.required'=> 'Topic is Reequired !',
                'title.required'=> 'Video Title is Required !',
                'video_url.required'=> 'Video URL is Required !',
                'video_type.required'=> 'Video Type is Required !',
                'is_preview.required'=> 'Video Visibility is Required !',
                'description.required'=> 'video Description is Required !',
            ]
        );
      
        // ------  create a slug & get creator id -------
        $slug = uniqid('20').Str::random(20) . '_'.mt_rand(10000, 100000).'-'.time();
        $user_id = Auth::user()->id;
        //-------  insert category record --------
        $insert = Course_topic_video::create([
            'topic_id'=>$request->topic_id,
            'title'=>$request->title,
            'video_url'=>$request->video_url,
            'video_type'=>$request->video_type,
            'duration'=>$request->duration,
            'is_preview'=>$request->is_preview,
            'position'=>$request->position,
            'description'=>$request->description,
            'public_status'=>1,
            'slug'=>$slug,
            'user_id' => $user_id,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
        // insert Successfully 
        if($insert){
            flash()->success('Information Added Successfuly');
            return redirect()->route('ins_course_content_video.all_data');
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
                'title'  => 'required',
                'description'  => 'required',
            ],[
                'title.required'=> 'Module Title is Required !',
                'description.required'=> 'Module Description is Required !',
            ]
        );
        //--- get specific Credential for update record & editor id --------
        $id = $request->id;
        $slug = $request->slug;
        $user_id = Auth::user()->id;

        //---------category update -------//
        $update = Course_topic_video::where('user_id',$user_id)->where('id',$id)->where('slug',$slug)->update([
                'title'=>$request->title,
                'description'=>$request->description,
                'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        // ------insert Successfully--------// 
        if($update){
            flash()->success('Information Update Successfuly');
        }else{
            flash()->error('Informatin Update Faild !');
        }
        return redirect()->route('ins_course_content_video.view',[$id,$slug]);

    } // update end 


   /**
     * =================================================
     * =========================================================================== SOFT,HEARD DELETE, RESTORE ,RECYCLE,ACTIVE ,DEACTIVE FUNCTION START HERE ========================================================
     * ================================================
     */
    public function softdelete($id){
        $user_id = Auth::user()->id;
        $data= Course_topic_video::where('user_id',$user_id)->where('id',$id)->first();
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
        $data = Course_topic_video::withTrashed()->where('user_id',$user_id)->where('id', $id)->first();
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
        $data = Course_topic_video::onlyTrashed()->where('user_id',$user_id)->where('id', $id)->first();
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
        $published = Course_topic_video::where('user_id',$user_id)->where('id',$id)->where('slug',$slug)->where('public_status',0)->update([
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
        $private = Course_topic_video::where('user_id',$user_id)->where('id',$id)->where('slug',$slug)->where('public_status',1)->update([
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
        $all = Course_topic_video::onlyTrashed()->where('user_id',$user_id)->get();
        return view('instructor.manage.coursecontentvideo.recycle',compact('all'));
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
            Course_topic_video::whereIn('id', $ids)->where('user_id',$user_id)->delete();
            return response()->json(['success' => true, 'message' => 'Selected Items deleted.']);
        }
        //--- for multiple items heard delete -------//
        if ($action === 'heard_delete') {
            $categories = Course_topic_video::onlyTrashed()->whereIn('id', $ids)->where('user_id',$user_id)->get();
        
            foreach ($categories as $category) {
                // 4. Category force delete
                $category->forceDelete();
            }
        
            return response()->json(['success' => true, 'message' => 'Selected categories permanently deleted.']);
        }
        
    
        //---- for multiple items resotre --------//
        if ($action === 'restore') {
            $categories = Course_topic_video::onlyTrashed()->whereIn('id', $ids)->where('user_id',$user_id)->get();
            if($categories){
                foreach($categories as $data){
                    $data->restore();
                }
            }
            return response()->json(['success' => true, 'message' => 'Selected categories archived.']);
        }
        //----- for multiple items active ----//
        if ($action === 'active') {
            $categories = Course_topic_video::whereIn('id', $ids)->where('user_id',$user_id)->get();

            if($categories){
                foreach($categories as $data){
                    Course_topic_video::whereIn('id',$ids)->where('public_status',0)->where('user_id',$user_id)->update([
                        'public_status'=>1,
                    ]);
                }
            }
            return response()->json(['success' => true, 'message' => 'Active process started.']);
        }

        //--  for multiple items deactive ----- //
        if ($action === 'deactive') {
            $categories = Course_topic_video::whereIn('id', $ids)->get();
            if($categories){
                foreach($categories as $data){
                    Course_topic_video::whereIn('id',$ids)->where('user_id',$user_id)->where('public_status',1)->update([
                        'public_status'=>0,
                    ]);
                }
            }
            return response()->json(['success' => true, 'message' => 'Deactive process started.']);
        }
        return response()->json(['success' => false, 'message' => 'Invalid action.']);
    } // bulk action end here 




}
