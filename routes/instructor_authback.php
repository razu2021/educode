<?php
use App\Http\Controllers\backend\users\UserManagementController;
use Illuminate\Support\Facades\Route;


/**================   Admin auth middleware route protection ============ */
Route::middleware(['auth:admin','admin'])->group(function(){
/**================   Admin auth middleware route protection ============ */


/**-------------  category route is here ------- */
Route::controller(UserManagementController::class)->prefix('admin/dashboard/instructor/new/instructor/')->name('new_instructor.')->group(function(){
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
    //export route 
    Route::get('export-pdf','export_pdf')->name('export_pdf'); 
    Route::get('export-excel','export_excel')->name('export_excel'); 
    Route::get('export-csv','export_csv')->name('export_csv'); 
    Route::get('export-zip','export_zip')->name('export_zip'); 
    Route::get('export-single-pdf/{id}/{slug}','export_single_pdf')->name('export_single_pdf'); 
});




















/**================   Admin auth middleware route protection ============ */
});
/**================   Admin auth middleware route protection ============ */
