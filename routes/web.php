<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('status.index');
})->middleware(['auth', 'verified'])->name('status.index');
// in progress
Route::get('/in-progress',[TaskController::class,'progress'])->middleware(['auth', 'verified'])->name('status.inprogress');

// Completed tasks
Route::get('/complete', [TaskController::class, 'complete'])->middleware(['auth', 'verified'])->name('status.complete');




// task crud

Route::get('/dashboard', [TaskController::class,'index'])->middleware(['auth', 'verified'])->name('status.index');
Route::get('/task/create', [TaskController::class, 'create'])->name('task.create');



Route::post('/task',[TaskController::class ,'store'])->middleware(['auth', 'verified'])->name('task.store');
Route::get('/task/{task}/edit', [TaskController::class, 'edit'])->name('task.edit');
Route::put('/task/{task}/update', [TaskController::class, 'update'])->name('task.update');
Route::delete('/task/{task}/destroy', [TaskController::class, 'destroy'])->name('task.destroy');


// Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
