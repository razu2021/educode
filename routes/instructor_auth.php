<?php
use App\Http\Controllers\instructor\InstructorController;
use Illuminate\Support\Facades\Route;


/**================   Admin auth middleware route protection ============ */
Route::middleware(['auth','instructor'])->group(function(){
/**================   Admin auth middleware route protection ============ */



Route::get('/instructor/dashboard',[InstructorController::class , 'index'])->name('instructor.dashboard');












/**================   Admin auth middleware route protection ============ */
});
/**================   Admin auth middleware route protection ============ */
