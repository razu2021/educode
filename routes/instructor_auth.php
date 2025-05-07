<?php
use App\Http\Controllers\instructor\InstructorController;
use App\Http\Controllers\instructor\InstructorRequestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

/**================   Admin auth middleware route protection ============ */
Route::middleware(['auth','instructor'])->group(function(){
/**================   Admin auth middleware route protection ============ */



Route::get('/instructor/dashboard',[InstructorController::class , 'index'])->name('instructor.dashboard');












/**================   Admin auth middleware route protection ============ */
});
/**================   Admin auth middleware route protection ============ */


Route::middleware(['auth','check_role'])->group(function(){
    Route::controller(InstructorRequestController::class)->prefix('dashboard/instructor/request/')->name('instructor_request.')->group(function(){
        Route::get('how-to-find-us','find_us')->name('find_us');
        Route::post('insert','insert')->name('submit');

        Route::post('update','update')->name('update');
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