<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CourseCategory;
use App\Models\Course;
use Illuminate\Http\Request;

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
        $allcategorycourse= CourseCategory::get();
        $query =  Course::with(['coursePrice'])->where('public_status', 1);

        // if($request->ajax()){
        // $all = Course::with(['coursePrice'])
        //             ->where('public_status', 1)
        //             ->when($request->search, function($query) use ($request) {
        //                 $query->where('course_name', 'like', '%' . $request->search . '%');
        //             })
        //             ->paginate(2);

        // return view('frontend.pages.course.components.course_card3', compact('all'))->render(); // only card HTML
        // }else{
        //     $all = Course::with(['coursePrice'])->where('public_status',1)->paginate(30);
        // }        

           if ($request->price) {
                $query->where('course_type', $request->price); // assuming you have a 'level' column
            }

        $all = $query->paginate(30);

        if ($request->ajax()){
          return view('frontend.pages.course.components.course_card3', compact('all'))->render();
        }


        
        //dd($all);
        return view('frontend.pages.course.Allcategory_course',compact('allcategorycourse','all'));
    }

    public function course_Category($category_url){
        $allcategory = CourseCategory::with('CourseCategorys')->where('url',$category_url)->get();

        //dd($allcategory);

        return view('frontend.pages.course.course_category',compact('allcategory'));
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
    public function course_details(){

        $course = Course::findOrFail(1);

        // Increase view count
        $course->increment('view_count');

        return view('frontend.pages.course.course_details');
    }
    // instructor  detais 
    public function instructor_details(){
        return view('frontend.pages.course.instructor_profile');
    }



    







/** function body end  */
}
/** function body end  */
