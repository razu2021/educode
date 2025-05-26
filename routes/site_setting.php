<?php

use App\Http\Controllers\backend\setting\AuthCredentialController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\backend\setting\CopyRightController;
use App\Http\Controllers\backend\setting\CustomCssController;
use App\Http\Controllers\backend\setting\CustomScriptController;
use App\Http\Controllers\backend\setting\DatetimeFormateController;
use App\Http\Controllers\backend\setting\EmailSetupController;
use App\Http\Controllers\backend\setting\EmbedGooglemapController;
use App\Http\Controllers\backend\setting\GoogleTagManageController;
use App\Http\Controllers\backend\setting\IconMagementController;
use App\Http\Controllers\backend\setting\LogManagementController;
use App\Http\Controllers\backend\setting\MaintenancemodeController;
use App\Http\Controllers\backend\setting\PaymentGetwayCredentialController;
use App\Http\Controllers\backend\setting\PreloaderController;
use App\Http\Controllers\backend\setting\SendEmailController;
use App\Http\Controllers\backend\setting\siteAddressController;
use App\Http\Controllers\backend\setting\SiteAdminMailController;
use App\Http\Controllers\backend\setting\SiteEmailController;
use App\Http\Controllers\backend\setting\SiteInformationController;
use App\Http\Controllers\backend\setting\SitePhoneController;
use App\Http\Controllers\backend\setting\SiteSocialController;

/** ==========  site setting middleware start =============== */
Route::middleware('auth:admin')->group(function(){
/** ==========  site setting middleware end  =============== */

/** -------  optimization  clear code ------- */
Route::get('admin/dashboard/cc',function(){
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');
    return " Optimize Clear Successfuly ! ";

});


// migrate database 



 /**-------------  Meta Tag  route is here ------- */
 Route::controller(MaintenancemodeController::class)->prefix('admin/dashboard/maintenancemode/')->name('maintenancemode.')->group(function(){
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
    Route::get('public-hader/{id}/{slug}','public_header')->name('public_header'); 
    Route::get('private-hader/{id}/{slug}','private_header')->name('private_header'); 
    // export route 
    Route::get('export-pdf','export_pdf')->name('export_pdf'); 
    Route::get('export-excel','export_excel')->name('export_excel'); 
    Route::get('export-csv','export_csv')->name('export_csv'); 
    Route::get('export-zip','export_zip')->name('export_zip'); 
    Route::get('export-single-pdf/{id}/{slug}','export_single_pdf')->name('export_single_pdf'); 
});
 /**-------------  Email route is here ------- */
 Route::controller(SiteEmailController::class)->prefix('admin/dashboard/siteemail/')->name('siteemail.')->group(function(){
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
 /**-------------  Email route is here ------- */
 Route::controller(SitePhoneController::class)->prefix('admin/dashboard/sitephone/')->name('sitephone.')->group(function(){
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
 /**-------------  Email route is here ------- */
 Route::controller(siteAddressController::class)->prefix('admin/dashboard/siteaddress/')->name('siteaddress.')->group(function(){
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
 /**-------------  Email route is here ------- */
 Route::controller(EmbedGooglemapController::class)->prefix('admin/dashboard/embedmap/')->name('embedmap.')->group(function(){
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
 /**-------------  Date time formate  route is here ------- */
 Route::controller(DatetimeFormateController::class)->prefix('admin/dashboard/date-time/')->name('datetime.')->group(function(){
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
 /**-------------  Site copy tight  route is here ------- */
 Route::controller(CopyRightController::class)->prefix('admin/dashboard/copy-right/')->name('copyright.')->group(function(){
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
 /**-------------  custom css route is here ------- */
 Route::controller(CustomCssController::class)->prefix('admin/dashboard/custome/css/')->name('customcss.')->group(function(){
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
 /**-------------  custom script route is here ------- */
 Route::controller(CustomScriptController::class)->prefix('admin/dashboard/custome/script/')->name('customscript.')->group(function(){
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
 /**-------------  custom script route is here ------- */
 Route::controller(PreloaderController::class)->prefix('admin/dashboard/preloader/')->name('preloader.')->group(function(){
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
// -------  site information route ---------
Route::controller(SiteInformationController::class)->prefix('admin/dashboard/siteinformation/')->name('siteinformation.')->group(function(){
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
// -------  site information route ---------
Route::controller(IconMagementController::class)->prefix('admin/dashboard/iconmangement/')->name('iconmanagement.')->group(function(){
    Route::get('all','index')->name('all');
    Route::get('import/icon','importIcon')->name('icon.seeder.run');
    Route::get('add','add')->name('add');
    Route::get('view/{id}','view')->name('view');
    Route::get('edit/{id}','edit')->name('edit');
    Route::post('submit','insert')->name('submit');
    Route::post('update','update')->name('update');
    Route::delete('softdelete/{id}','softdelete')->name('softdelete');
    Route::post('restore/{id}','restore')->name('restore');
    Route::delete('delete/{id}','delete')->name('delete');
    Route::post('bulk-action','bulkAction')->name('bulkAction');
    Route::get('recycle','recycle')->name('recycle');
    Route::get('public/{id}','public_status')->name('public');
    Route::get('private/{id}','private_status')->name('private');
    // export route 
    Route::get('export-pdf','export_pdf')->name('export_pdf'); 
    Route::get('export-excel','export_excel')->name('export_excel'); 
    Route::get('export-csv','export_csv')->name('export_csv'); 
    Route::get('export-zip','export_zip')->name('export_zip'); 
    Route::get('export-single-pdf/{id}','export_single_pdf')->name('export_single_pdf'); 
});
// -------  site information route ---------
Route::controller(SiteSocialController::class)->prefix('admin/dashboard/sitesocial/')->name('sitesocial.')->group(function(){
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
// ------ google tag manager route ---------------
Route::controller(GoogleTagManageController::class)->prefix('admin/dashboard/googletagmanager/')->name('googletagmanager.')->group(function(){
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
// ------ google tag manager route ---------------
Route::controller(AuthCredentialController::class)->prefix('admin/dashboard/authcredential/')->name('authcredential.')->group(function(){
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
    Route::get('manageall','manage_all')->name('manageall'); 
});

// ------ google tag manager route ---------------
Route::controller(PaymentGetwayCredentialController::class)->prefix('admin/dashboard/pgcredential/')->name('pgcredential.')->group(function(){
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
    Route::get('manageall','manage_all')->name('manageall'); 
});
// ------ email setup route route ---------------
Route::controller(EmailSetupController::class)->prefix('admin/dashboard/emailsetup/')->name('emailsetup.')->group(function(){
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
// ------ Site Admin mail route ---------------
Route::controller(SiteAdminMailController::class)->prefix('admin/dashboard/siteadminmail/')->name('siteadminmail.')->group(function(){
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
// ------ Send  mail route ---------------
Route::controller(SendEmailController::class)->prefix('admin/dashboard/sendemail/')->name('sendemail.')->group(function(){
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

















/**  ----------  site setting meddleware end ===== */
});

/**  ----------  site setting meddleware end ===== */