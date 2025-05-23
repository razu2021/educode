<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use App\Models\CourseCategory;
use App\Models\InstructoreRequest;
use Illuminate\Http\Request;


class InstructorRequestController extends Controller
{

    /**  -- index page  */
    public function index()
    {
        $user_id = auth()->id();
    
        $data = InstructoreRequest::where('user_id', $user_id)->first();
    
        if ($data) {
            return view('instructor.instructor_request.index', compact('data'));
        }
        return view('instructor.instructor_request.request.get_start');
    }




    /**------ how to find use --- */
    public function find_us(){
        return view('instructor.instructor_request.request.find_us');
    }   
    
    /**------ secect your course category  --- */
    public function category(){
        $category = CourseCategory::where('public_status',1)->get();
        return view('instructor.instructor_request.request.category',compact('category'));
    }

    /**------ how to find use --- */
    public function education(){
        return view('instructor.instructor_request.request.education_qualification');
    }


    /**------ course preparation  --- */
    public function course_pre(){
        return view('instructor.instructor_request.request.course_preparation');
    }

    /**------ Teaching Exprerience   --- */
    public function teaching_ex(){
        return view('instructor.instructor_request.request.teaching_ex');
    }
    /**------ Technicle Setup    --- */
    public function technicale_setup(){
        return view('instructor.instructor_request.request.technicale_setup');
    }

    /**------ Technicle Setup    --- */
    public function comiunication_skil(){
        return view('instructor.instructor_request.request.comiunication_skill');
    }
    /**------ Technicle Setup    --- */
    public function ethics(){
        return view('instructor.instructor_request.request.ethics');
    }
    /**------  self promort your course and    --- */
    public function self_promot_course(){
        return view('instructor.instructor_request.request.social_marketing');
    }
    /**------  self promort your course and    --- */
    public function self_motivation(){
        return view('instructor.instructor_request.request.motivation');
    }

    /**------  self promort your course and    --- */
    public function condition(){
        return view('instructor.instructor_request.request.condition');
    }













    public function insert(Request $request){


        $user_id = auth()->id();
        $alreadyExists = InstructoreRequest::where('user_id', $user_id)->exists();

        if ($alreadyExists) {
            return back()->withErrors(['msg' => 'You have already submitted a request!']);
        }
     
        $insert = InstructoreRequest::create([
            'user_id' => $user_id,
        ]);
        return redirect()->route('instructor_request.find_us');
    
    }




    /**--------- how to find us update  */
    public function find_us_update(Request $request){
        $user_id = auth()->id();
        $update = InstructoreRequest::where('user_id',$user_id)->update([
            'sourcing' => $request->sourcing,
        ]);
        return redirect()->route('instructor_request.category');
    
    }
    /**--------- category update */
    public function category_update(Request $request){
        $user_id = auth()->id();
        $update = InstructoreRequest::where('user_id',$user_id)->update([
            'category' => $request->category,
        ]);
        return redirect()->route('instructor_request.education');
    
    }
    /**--------- Education and  qualification  update */
    public function education_update(Request $request){
        $user_id = auth()->id();
        $update = InstructoreRequest::where('user_id',$user_id)->update([
            'last_education' => $request->last_education,
            'location' => $request->location,
            'daily_available_hours' => $request->daily_available_hours,
        ]);
        return redirect()->route('instructor_request.teaching_ex');
    
    }

/**----  teaching experience ------- */
    public function teaching_ex_update(Request $request){
        $user_id = auth()->id();
        $update = InstructoreRequest::where('user_id',$user_id)->update([
            'has_teaching_experience' => $request->has_teaching_experience,
            'experience_year' => $request->experience_year,
            'preferred_student_level' => $request->preferred_student_level,
        ]);
        return redirect()->route('instructor_request.course_pre');
    
    }


     /**--------- course preparetion  update */
    public function course_pre_update(Request $request){
        $user_id = auth()->id();
        $update = InstructoreRequest::where('user_id',$user_id)->update([
            'can_create_thumbnail' => $request->can_create_thumbnail,
            'can_create_promo_video' => $request->can_create_promo_video,
            'has_course_module' => $request->has_course_module,
            'has_course_video_upload' => $request->has_course_video_upload,
            'can_create_assignments' => $request->can_create_assignments,
        ]);
        return redirect()->route('instructor_request.technicale_setup');
    
    }
     /**--------- Teaching Experience   update */


     /**--------- TEchnicale setup   update */
    public function technicale_setup_update(Request $request){
        $user_id = auth()->id();
        $update = InstructoreRequest::where('user_id',$user_id)->update([
            'able_tolive_class' => $request->able_tolive_class,
            'has_webcam' => $request->has_webcam,
            'can_use_video_call_tools' => $request->can_use_video_call_tools,
        ]);
        return redirect()->route('instructor_request.comiunication_skil');
    
    }


     /**--------- Comiunication skil  update */
    public function comiunication_skil_update(Request $request){
        $user_id = auth()->id();
        $update = InstructoreRequest::where('user_id',$user_id)->update([
            'can_reply_within_24h' => $request->can_reply_within_24h,
            'can_participate_community' => $request->can_participate_community,
            'available_for_live_qa' => $request->available_for_live_qa,
        ]);
        return redirect()->route('instructor_request.ethics');
    
    }
     /**--------- Ethics and commitment update */
    public function ethics_update(Request $request){
        $user_id = auth()->id();
        $update = InstructoreRequest::where('user_id',$user_id)->update([
            'no_copyright_violation' => $request->no_copyright_violation,
            'accepts_review_policy' => $request->accepts_review_policy,
            //'agrees_to_terms' => $request->agrees_to_terms,
        ]);
        return redirect()->route('instructor_request.self_promot_course');
    
    }



     /**--------- self promort your course update */
    public function self_promot_course_update(Request $request){
        $user_id = auth()->id();
        $update = InstructoreRequest::where('user_id',$user_id)->update([
            'willing_to_promote_course' => $request->willing_to_promote_course,
            'interested_in_affiliate' => $request->interested_in_affiliate,
            'plans_more_courses' => $request->plans_more_courses,
        ]);
        return redirect()->route('instructor_request.self_motivation');
    
    }


     /**--------- Self Motivation why become an instructor  --------- */
    public function self_motivation_update(Request $request){
        /**-------- custom validation apply ------- */
        $request->validate([
            'why_become_instructor' => [function ($attribute, $value, $fail) {
                if ($value && str_word_count(strip_tags($value)) > 5) {
                     $fail('You can write a maximum of 500 words in this section.');
                }
            }],
            'future_contribution_plan' => [function ($attribute, $value, $fail) {
                if ($value && str_word_count(strip_tags($value)) > 500) {
                     $fail('You can write a maximum of 500 words in this section.');
                }
            }],
            'what_makes_you_unique' => [function ($attribute, $value, $fail) {
                if ($value && str_word_count(strip_tags($value)) > 500) {
                    $  $fail('You can write a maximum of 500 words in this section.');
                }
            }],
        ]);



        $user_id = auth()->id();
        $update = InstructoreRequest::where('user_id',$user_id)->update([
            'why_become_instructor' => $request->why_become_instructor,
            'future_contribution_plan' => $request->future_contribution_plan,
            'what_makes_you_unique' => $request->what_makes_you_unique,
        ]);
        return redirect()->route('instructor_request.condition');
    
    }

    public function condition_update(Request $request){

         $user_id = auth()->id();
        $update = InstructoreRequest::where('user_id',$user_id)->update([
            'agrees_to_terms' => $request->agrees_to_terms,
        ]);
        return redirect()->route('dashboard');
    }









}
