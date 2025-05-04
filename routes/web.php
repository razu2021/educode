<?php

use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\ProfileController;
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

});











Route::controller(FrontendController::class)->prefix('product/purchese')->group(function(){
    Route::get('/fashion-and-clothing/man-fashion/t-shirt/xyz','purchese_product')->name('purchese_product'); // sub category product
});





















Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin_auth.php';
require __DIR__.'/backend.php';
