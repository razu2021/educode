<?php

use App\Http\Controllers\backend\subscription\PaymentController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\frontend\FrontendController;

use Illuminate\Support\Facades\Route;





Route::get('/',[FrontendController::class, 'index'])->name('index');



Route::controller(FrontendController::class)->group(function(){
Route::get('/courses/all-category','all_course_Category')->name('allcoursecategory');

// Product Category Routes
Route::get('/product/{url}/{slug}','product_category')->name('product_category');
Route::get('/product/{categoryUrl}/{subcategoryUrl}/{category_slug}/{subcategory_slug}','sub_category_product')->name('sub_category_product');
Route::get('/product/{categoryUrl}/{subcategoryUrl}/{childCategoryUrl}/{categorySlug}/{subcategorySlug}/{childCategorySlug}','child_category_product')->name('child_category_product');


// Course Category Routes
Route::get('/courses/{category_url}','course_Category')->name('coursecategory');
Route::get('/courses/{category_url}/{course_subcategory}','course_SububCategory')->name('coursesubcategory');
Route::get('/courses/{category_url}/{course_subcategory}/{course_childCategory}','course_childubCategory')->name('coursechildcategory');

Route::get('/{url}/{slug}','course_details')->name('course_details');
Route::get('instructor/details','instructor_details')->name('instructor_details');

});

/**
* -------------  SSLCommerze Payment Route Start here -----------
*/
Route::controller(PaymentController::class)->middleware(['auth'])->group(function(){
    Route::get('payment/initiate','sslpayment_initiate')->name('ssl_payment_initiate');
    Route::post('/payment/create/url',  'ssl_paymentCreate')->name('ssl_payment.create');
});






Route::controller(FrontendController::class)->prefix('product/purchese')->group(function(){
    Route::get('/fashion-and-clothing/man-fashion/t-shirt/xyz','purchese_product')->name('purchese_product'); // sub category product
});



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
require __DIR__.'/site_setting.php';
require __DIR__.'/instructor_authback.php';
