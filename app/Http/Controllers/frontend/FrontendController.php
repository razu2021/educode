<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CourseCategory;
use App\Models\Course;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

class FrontendController extends Controller
{
    /**----------  index page function ----- */
    public function index(){
       // $all = Course::where()->get();
        return view('frontend.index');
    }
    /**----------  about page function ----- */
    public function about(){
        return view('frontend.pages.about');
    }





    /** category product  */
    public function product_category($url,$slug){

        $data = Category::with(['subcategorys'])
        ->where('public_status',1)->where('url',$url)->where('slug',$slug)->firstOrFail();
        //dd($data);
        return view('frontend.pages.category_product',compact('data'));
    }

    /** category product  */
    public function sub_category_product($categoryUrl,$subcategoryUrl,$category_slug,$subcategory_slug){
        $data = Category::where('public_status',1)->where('url',$categoryUrl)->where('slug',$category_slug)
        ->with(['subcategorys'=>function($query) use($subcategoryUrl,$subcategory_slug){
            $query->where('sub_category_url',$subcategoryUrl)->where('slug',$subcategory_slug)
            ->with('childcategories');
        }])
        ->firstOrFail();
        //dd($data);
        return view('frontend.pages.sub_category_product',compact('data'));
    }





 /** category product  */

    public function child_category_product($categoryUrl,$subcategoryUrl,$childCategoryUrl,$categorySlug,$subcategorySlug,$childCategorySlug){
      
        $data = Category::where('public_status',1)
            ->where('url',$categoryUrl)
            ->where('slug',$categorySlug)
            ->with(['subcategorys' => function($query) use ($subcategoryUrl, $subcategorySlug,$childCategoryUrl, $childCategorySlug) {  // make sure `use` contains all variables
                $query->where('sub_category_url',$subcategoryUrl)
                    ->where('slug',$subcategorySlug)
                    ->with(['childcategories' => function($childQuery) use ($childCategoryUrl, $childCategorySlug){ // pass variables here as well
                        $childQuery->where('child_category_url',$childCategoryUrl)
                            ->where('slug',$childCategorySlug);
                    }]);
            }])
            ->firstOrFail();
      
    
        return view('frontend.pages.sub_sub_category_product',compact('data'));
    }
    

   



    /** Purchese product  */
    public function purchese_product(){
        return view('frontend.pages.purchase');
    }







    /** ===============  course category function =========== */

    public function all_course_Category(Request $request){
       
        $allcategorycourse= CourseCategory::get(); // find the course catergory 
        $totalcourse = Course::count();
        $query =  Course::with(['coursePrice'])->where('public_status', 1);
      
        if ($request->filled('search')) {
            $query->where('course_name', "LIKE", '%'.$request->search . '%')->orWhere('course_title', "LIKE", '%'.$request->search . '%')
            ->orWhere('course_des', "LIKE", '%'.$request->search . '%')
            ->orWhere('course_language', "LIKE", '%'.$request->search . '%')
            ->orWhere('course_type', "LIKE", '%'.$request->search . '%')
            ->orWhere('course_lable', "LIKE", '%'.$request->search . '%')
            ->orWhere('course_time', "LIKE", '%'.$request->search . '%')
            ->orWhere('label', "LIKE", '%'.$request->search . '%')
            ->orWhere('sell', "LIKE", '%'.$request->search . '%');
        }

        if ($request->filled('category')) {
            $query->where('course_category_id', $request->category); // assuming you have a 'level' column
        }

        if ($request->level) {
            $query->where('course_lable', $request->level); // assuming you have a 'level' column
            
        }
        if ($request->language) {
            $query->where('course_language', $request->language); // assuming you have a 'level' column
            
        }
        if ($request->duration) {
            $query->where('course_time', $request->duration); // assuming you have a 'level' column
            
        }

        if ($request->price) {
            $query->where('course_type', $request->price); // assuming you have a 'level' column
        }

        $all = $query->paginate(30);

            if ($request->ajax()) {
            if ($all->count() > 0) {
                $html = view('frontend.pages.course.components.course_card3', compact('all'))->render();
                return response()->json(['html' => $html, 'empty' => false]);
            } else {
                return response()->json(['html' => '', 'empty' => true]);
            }
        }

        return view('frontend.pages.course.Allcategory_course',compact('allcategorycourse','all','totalcourse'));
    }



    /**
     * ==========  course category function ===================
     */
    public function course_Category($category_url){
        $allcategorycourse = CourseCategory::where('public_status',1)->get();

        $category = CourseCategory::where('url',$category_url)->firstOrFail();
        $all =  $category->CourseCategorys()->where('status', 1)->latest()->paginate(12);;
        $totalcourse =  $all->count();

       
        return view('frontend.pages.course.course_category',compact('all','totalcourse','allcategorycourse'));
    }



    public function course_SububCategory($category_url,$course_subcategory){
        $allcategory = CourseCategory::where('url',$category_url)->get();
        return view('frontend.pages.course.course_subcategory',compact('allcategory'));
    }


    public function course_childubCategory($category_url,$course_subcategory,$course_childCategory){
        $allcategory = CourseCategory::where('url',$category_url)->get();
        return view('frontend.pages.course.course_childcategory',compact('allcategory'));
    }



    // course detais 
    public function course_details($url,$slug){

        $data = Course::where('url',$url)->where('slug',$slug)->firstOrFail();

        // Increase view count
        $data->increment('view_count');

        return view('frontend.pages.course.course_details',compact('data'));
    }


    // instructor  detais 
    public function instructor_details(){
        return view('frontend.pages.course.instructor_profile');
    }



    







/** function body end  */
}
/** function body end  */
