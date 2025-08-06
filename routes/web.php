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
    // ---
    Route::get('live/quiz/test/{id}/{slug}','live_quize')->name('live.quiz');
    Route::get('/quiz-question/{quiz_id}/{index}', 'loadSingleQuestion')->name('loadSingleQuestion');
    // Save answer
    Route::post('/quiz-answer-save', 'saveQuizeAnswer')->name('save_quiz_answer');
    Route::get('/quiz/result/{id}/{slug}', 'quize_result')->name('quize.result');
    Route::get('/quiz/test/again/{id}/{slug}', 'quize_test_again')->name('quize.test_again');

    Route::get('/quiz/test/result/download/{id}/{slug}', 'quize_result_download')->name('quize.result_download');



});


/**
* **-------------  SSLCommerze Payment Route Start here -----------
*/
Route::controller(PaymentController::class)->middleware(['auth'])->group(function(){
    Route::get('/payment/ssl/initiate/{id}/{slug}','sslpayment_initiate')->name('ssl_payment_initiate');
    Route::post('/payment/create/url',  'ssl_paymentCreate')->name('ssl_payment.create');
    Route::get('/invoice/download/{tran_id}','downloadInvoice')->name('invoice.download');
    //-------------------
    Route::get('/course/{id}/already-enrolled/download','exist_course')->name('exist.course');
    Route::get('/course/enrolment/free/{id}/{slug}','free_enrolment')->name('free.enrolment');

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