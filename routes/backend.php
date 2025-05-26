<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\admin\AdminController;
use App\Http\Controllers\backend\category\categoryController;


use App\Http\Controllers\backend\category\ChildCategoryController;
use App\Http\Controllers\backend\category\SubCategoryController;
use App\Http\Controllers\backend\courses\CourseCategoryController;
use App\Http\Controllers\backend\courses\CourseChildCategoryController;
use App\Http\Controllers\backend\courses\CourseController;
use App\Http\Controllers\backend\courses\CoursesSubCategorys;
use App\Http\Controllers\backend\other\MetaTagController;




/**================   Admin auth middleware route protection ============ */
Route::middleware(['auth:admin','admin'])->group(function(){
/**================   Admin auth middleware route protection ============ */

Route::get('admin/dashboard',[AdminController::class, 'index'])->name('admin.dashboard');




/** -------  optimization  clear code ------- */
Route::get('admin/dashboard/cc',function(){
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return " Optimize Clear Successfuly ! ";

});




/**
 * =========================================
 * ==================================================== BACKEND ROUTE START HERE ===================================== // 
 * =========================================
 */





/**-------------  category route is here ------- */
Route::controller(categoryController::class)->prefix('admin/dashboard/category/')->name('category.')->group(function(){
    Route::get('all','index')->name('all');
    Route::get('add','add')->name('add');
    Route::get('view/{id}/{slug}','view')->name('view');
    Route::get('edit{id}/{slug}','edit')->name('edit');
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
/**------------- Sub category route is here ------- */
Route::controller(SubCategoryController::class)->prefix('admin/dashboard/subcategory/')->name('subcategory.')->group(function(){
    Route::get('all','index')->name('all');
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
/**------------- Child category route is here ------- */
Route::controller(ChildCategoryController::class)->prefix('admin/dashboard/childcategory/')->name('childcategory.')->group(function(){
    Route::get('all','index')->name('all');
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

/**------------- Child category route is here ------- */
Route::controller(CourseCategoryController::class)->prefix('admin/dashboard/course-category/')->name('coursecategory.')->group(function(){
    Route::get('all','index')->name('all');
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
/**------------- Child category route is here ------- */
Route::controller(CoursesSubCategorys::class)->prefix('admin/dashboard/course/sub/category/')->name('coursesubcategory.')->group(function(){
    Route::get('all','index')->name('all');
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
/**------------- course  Child category route is here ------- */
Route::controller(CourseChildCategoryController::class)->prefix('admin/dashboard/course/child/category/')->name('coursechildcategory.')->group(function(){
    Route::get('all','index')->name('all');
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






/**------------- Child category route is here ------- */
Route::controller(CourseController::class)->prefix('admin/dashboard/course/')->name('course.')->group(function(){
    Route::get('all','index')->name('all');
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
Route::get('/get-subcategories/{category_id}', [CourseController::class, 'getSubcategories']);
Route::get('/get-childcategories/{subcategory_id}', [CourseController::class, 'getChildcategories']);






















































 /**-------------  Meta Tag  route is here ------- */
 Route::controller(MetaTagController::class)->prefix('admin/dashboard/metatag/')->name('metatag.')->group(function(){
    Route::get('all','index')->name('all');
    Route::get('add','add')->name('add');
    Route::get('view/{id}/{model_type}/{slug}','view')->name('view');
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
    Route::post('add_seo_image','add_seo_image')->name('add_seo_image');
    Route::post('update_seo_image','update_seo_image')->name('update_seo_image');
});



/**================   Admin auth middleware route protection ============ */
});
/**================   Admin auth middleware route protection ============ */
