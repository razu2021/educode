<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\CourseCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Event;
// ----- event  ----
use App\Events\user\UserRegisterEvent;
//----- listener ---
use App\Listeners\user\UserRegisterListener; 
// logviwer
use Opcodes\LogViewer\Facades\LogViewer;
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



                /**  -----  added Event and  listner  -----*/

        Event::listen(
            UserRegisterEvent::class, 
            [UserRegisterListener::class, 'handle']
        );


        /**=====  logviewr route protected code ====== */
        LogViewer::auth(function ($request) {
            return Auth::guard('admin')->check();
        });
    }
}
