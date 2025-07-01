<?php

use App\Http\Controllers\backend\subscription\PaymentController;
use App\Http\Controllers\backend\subscription\SubscriptionController;
use App\Http\Controllers\instructor\BillingCheckoutController;
use App\Http\Controllers\instructor\InstructorController;
use App\Http\Controllers\instructor\InstructorRequestController;
use App\Http\Controllers\instructor\manage\InsCourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

/**================   Admin auth middleware route protection ============ */
Route::middleware(['auth','instructor'])->group(function(){
/**================   Admin auth middleware route protection ============ */



Route::get('/instructor/dashboard',[InstructorController::class , 'index'])->name('instructor.dashboard');



Route::controller(InstructorRequestController::class)->prefix('/instructor/dashboard/documents/')->name('instructor_documents.')->group(function(){

    Route::get('upload/{userid}/{slug}' , 'instructor_document_upload')->name('document_verification');
    Route::post('submit','strat_verification')->name('submit');
    Route::post('update','instructor_document_update')->name('update');
    //  -------  social media update  route -----
});

Route::controller(InstructorRequestController::class)->prefix('/instructor/dashboard/social/')->name('user_social.')->group(function(){
    Route::get('upload/{userid}/{slug}' , 'user_social')->name('add');
    Route::post('update','user_social_update')->name('update');
    //  -------  social media update  route -----
});
Route::controller(InstructorRequestController::class)->prefix('/instructor/application/submission/')->name('application.')->group(function(){
    Route::post('application/sunmission','application_submit')->name('application_submit');
    //  -------  social media update  route -----
});







//---------------------------------------------------------------------------------------------------------------------

Route::get('/instructor/subscription/price',[BillingCheckoutController::class ,'instructor_plan_price'])->name('instructor_paln_price');
Route::get('/instructor/subscription/checkout/{id}/{slug}',[BillingCheckoutController::class ,'instructor_plan_checkout'])->name('instructor_paln_checkout');




/**------------  payment route setup -------- */

Route::get('/instructor/payment/stripe/{id}/{slug}',[SubscriptionController::class ,'instructor_payment_stripe'])->name('instructor_payment_stripe');

//  -------------  stripe payment start here ------------
Route::post('/payment/initiate', [PaymentController::class, 'initiatePayment'])->name('payment_initiate');
Route::get('/payment/status', [PaymentController::class, 'payment_status'])->name('payment.status');
Route::view('/payment/success', 'payment_success')->name('payment.success');
Route::view('/payment/failed', 'payment_failed')->name('payment.failed');
// ------------   stripe payment end here   --------------







Route::get('/payment/now', [PaymentController::class, 'paywithsslCommerz'])->name('sslcommerz');
Route::get('/payment/fail', [PaymentController::class, 'fail'])->name('payment.fail');
Route::get('/payment/cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');







/**====
 * 
 * ===============   manage route start here ======================
 */

 /**------------- Child category route is here ------- */
Route::controller(InsCourseController::class)->prefix('instructor/dashboard/course/')->name('ins_course.')->group(function(){
    Route::get('all','index')->name('all');
    Route::get('all/course','all_course')->name('all_course');
    Route::get('add','add')->name('add');
    Route::get('view/{id}/{slug}','view')->name('view');
    Route::get('edit/{id}/{slug}','edit')->name('edit');
    Route::post('submit','insert')->name('submit');
    Route::post('update','update')->name('update');
    Route::delete('softdelete/{id}','softdelete')->name('softdelete');
    Route::post('restore/{id}','restore')->name('restore');
    Route::delete('delete/{id}','delete')->name('delete');
    Route::post('bulk-action','bulkAction')->name('bulkAction');
    Route::get('recycle','recycle')->name('recycle');
    Route::get('public/{id}/{slug}','public_status')->name('public');
    Route::get('private/{id}/{slug}','private_status')->name('private'); 
    // export route 
    Route::get('export-pdf','export_pdf')->name('export_pdf'); 
    Route::get('export-excel','export_excel')->name('export_excel'); 
    Route::get('export-csv','export_csv')->name('export_csv'); 
    Route::get('export-zip','export_zip')->name('export_zip'); 
    Route::get('export-single-pdf/{id}/{slug}','export_single_pdf')->name('export_single_pdf'); 



});
Route::get('/get-subcategories/instructor/{category_id}', [InsCourseController::class, 'getSubcategories']);
Route::get('/get-childcategories/instructor/{subcategory_id}', [InsCourseController::class, 'getChildcategories']);













/**================   instructor  auth middleware route protection ============ */
});
/**================   instructor auth middleware route protection ============ */

















































Route::middleware(['auth','check_role'])->group(function(){

    Route::controller(InstructorRequestController::class)->prefix('dashboard/instructor/request/')->name('instructor_request.')->group(function(){
        Route::get('how-to-find-us','find_us')->name('find_us');
        Route::get('category','category')->name('category');
        Route::get('education/qualification/other','education')->name('education');
        Route::get('teaching/experience','teaching_ex')->name('teaching_ex');
        Route::get('course/preparation','course_pre')->name('course_pre');
        Route::get('technicale/setup','technicale_setup')->name('technicale_setup');
        Route::get('communication/commitment','comiunication_skil')->name('comiunication_skil');
        Route::get('ethics','ethics')->name('ethics');
        Route::get('promote-your-course-on-social-media','self_promot_course')->name('self_promot_course');
        Route::get('why-become-an-instructor','self_motivation')->name('self_motivation');
        Route::get('terms-and-condition','condition')->name('condition');


        Route::post('insert','insert')->name('submit');



        Route::post('how-to-find-us/update','find_us_update')->name('find_us_update');
        Route::post('category/update','category_update')->name('category_update');
        Route::post('education/qualification/other/update','education_update')->name('education_update');
        Route::post('course/preparation/update','course_pre_update')->name('course_pre_update');
        Route::post('teaching/experience/update','teaching_ex_update')->name('teaching_ex_update');
        Route::post('technicale/setup/update',action: 'technicale_setup_update')->name('technicale_setup_update');
        Route::post('communication/commitment/update','comiunication_skil_update')->name('comiunication_skil_update');
        Route::post('ethics/update','ethics_update')->name('ethics_update');
        Route::post('promote-your-course-on-social-media/update','self_promot_course_update')->name('self_promot_course_update');
        Route::post('why-become-an-instructor/update','self_motivation_update')->name('self_motivation_update');
        Route::post('terms-and-condition/update','condition_update')->name('condition_update');
        Route::post('aproval-request/sbmit','aproval_status_update')->name('aproval_status_update');
    });







    Route::get('/dashboard',[InstructorRequestController::class,'index'])->name('dashboard');

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth', 'verified','check_role'])->name('dashboard');
    
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    


});