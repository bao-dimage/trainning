<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TimesheetController;
use App\Http\Livewire\Timesheet\Index;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/timesheet', function () {
//     return view('timesheet');
// })->middleware(['auth', 'verified'])->name('timesheet');

Route::prefix('/timesheet')->middleware(['auth'])->group(function(){
    Route::get('',[TimesheetController::class,'index'])->name('timesheet');
    Route::get('/create',[TimesheetController::class,'create']);
    Route::post('',[TimesheetController::class,'store'])->name('timesheet.store');
    Route::get('/edit/{timesheet}',[TimesheetController::class,'edit']);
    Route::patch('{timesheet}',[TimesheetController::class,'update'])->name('timesheet.update');
    Route::get('/detail/{timesheet}',[TimesheetController::class,'show'])->name('timesheet.show');
    
    
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
