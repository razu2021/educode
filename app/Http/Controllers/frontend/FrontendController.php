<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CourseCategory;
use App\Models\Course;
use App\Models\CourseSubCategory;
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


        // course detais 
    public function courseDetails($courseurl,$courseslug){

        $allcategorycourse  = CourseCategory::where('public_status',1)->get();
      
        $data = Course::where('url',$courseurl)->where('slug',$courseslug)->firstOrFail();

        // Increase view count
        $data->increment('view_count');

        return view('frontend.pages.course.course_details',compact('data','allcategorycourse'));
    }


    /** Purchese product  */
    public function purchese_product(){
        return view('frontend.pages.purchase');
    }




    /** ===============  course category function =========== */

    public function all_course_Category(Request $request){
       
        $allcategorycourse= CourseCategory::get(); // find the course catergory 
        $CourseSubCategory= CourseSubCategory::where('public_status',1)->get();
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

        return view('frontend.pages.course.Allcategory_course',compact('allcategorycourse','all','totalcourse','CourseSubCategory'));
    }



    /**
     * ==========  course category function ===================
     */
        public function course_Category(Request $request , $category_url){
            $allcategorycourse  = CourseCategory::where('public_status',1)->get();
            $category = CourseCategory::where('url',$category_url)->firstOrFail();
            $CourseSubCategory = CourseSubCategory::where('public_status',1)->where('course_category_id',$category->id)->get();

           

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

            return view('frontend.pages.course.course_category', compact('all','totalcourse','allcategorycourse','category','CourseSubCategory'));
        }




    public function course_SububCategory($category_url,$course_subcategory){
        $allcategory = CourseCategory::where('url',$category_url)->get();
        return view('frontend.pages.course.course_subcategory',compact('allcategory'));
    }


    public function course_childubCategory($category_url,$course_subcategory,$course_childCategory){
        $allcategory = CourseCategory::where('url',$category_url)->get();
        return view('frontend.pages.course.course_childcategory',compact('allcategory'));
    }





    // instructor  detais 
    public function instructor_details(){
        return view('frontend.pages.course.instructor_profile');
    }



    







/** function body end  */
}
/** function body end  */
