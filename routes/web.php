<?php

use App\Http\Controllers\backend\subscription\PaymentController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\frontend\FrontendController;

use Illuminate\Support\Facades\Route;





Route::get('/',[FrontendController::class, 'index'])->name('index');

// ✅ keep this before anything dynamic
Route::get('/courses/details/{courseurl}/{courseslug}',[FrontendController::class,'courseDetails'])->name('course_details');

// 🟨 dynamic group starts here
Route::controller(FrontendController::class)->group(function(){
    Route::get('/courses/all-category','all_course_Category')->name('allcoursecategory');
    Route::get('/courses/{category_url}','course_Category')->name('coursecategory');
    Route::get('/courses/{category_url}/{course_subcategory}','course_SububCategory')->name('coursesubcategory');
    Route::get('/courses/{category_url}/{course_subcategory}/{course_childCategory}','course_childubCategory')->name('coursechildcategory');
    Route::get('instructor/details','instructor_details')->name('instructor_details');
});


/**
* -------------  SSLCommerze Payment Route Start here -----------
*/
Route::controller(PaymentController::class)->middleware(['auth'])->group(function(){
    Route::get('/payment/ssl/initiate/{id}/{slug}','sslpayment_initiate')->name('ssl_payment_initiate');
    Route::post('/payment/create/url',  'ssl_paymentCreate')->name('ssl_payment.create');
    Route::get('/invoice/download/{tran_id}','downloadInvoice')->name('invoice.download');

    //-------------------
    Route::get('/course/{id}/already-enrolled/download','exist_course')->name('exist.course');

});


Route::post('/apply-coupon', [FrontendController::class, 'applyCoupon'])->name('apply.coupon');




Route::middleware(['auth'])->group(function(){
Route::get('/chat', [ChatController::class, 'chatUsers'])->name('chat.indexx');
Route::get('/chat/{user}', [ChatController::class, 'index'])->name('chat.index');
Route::middleware('auth')->post('/send-message', [ChatController::class, 'send'])->name('chat.send');


});



require __DIR__.'/auth.php';
require __DIR__.'/admin_auth.php';
require __DIR__.'/student_auth.php';
require __DIR__.'/instructor_auth.php';
require __DIR__.'/backend.php';
require __DIR__.'/instructor_authback.php';

// ✅ wildcard route thaka site_setting.php sobcheye niche
require __DIR__.'/site_setting.php';