<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\CourseCategory;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $categorys = Category::where('public_status',1)->get();

        /**  --- course ORM  ---- */
        $coursecate = CourseCategory::with(['CourseSubcategory','CourseSubcategory.CourschildCategory'])->get();
       // dd($coursecate);



        // view share 
        view()->share([
            'categories'=> $categorys,
            'globalcoursecategory' => $coursecate,
        ]);
    }
}
