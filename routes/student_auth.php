<?php
use App\Http\Controllers\student\StudentController;
use Illuminate\Support\Facades\Route;


/**================   Admin auth middleware route protection ============ */
Route::middleware(['auth','student'])->group(function(){
/**================   Admin auth middleware route protection ============ */

    
Route::get('/student/dashboard',[StudentController::class , 'index'])->name('student.dashboard');


















/**================   Admin auth middleware route protection ============ */
});
/**================   Admin auth middleware route protection ============ */
