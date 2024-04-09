<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AproposController;
use App\Http\Controllers\PostController;



Route::get('/Apropos', [AproposController::class, 'index'])->name('Apropos');
Route::get('/Mentionslegale', [AproposController::class, 'index'])->name('Mentionslegale');
Route::get('/', [PostController::class, 'index'])->name('welcome');
/*Route::resource('posts', 'App\Http\Controllers\PostController');*/

   /* Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');*/

Route::middleware('auth')->group(function () {
    
    Route::get('/dashboard', [PostController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/myposts', [PostController::class, 'myposts'])->name('dashboard.mypost');

    Route::get('/profile', [PostController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [PostController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [PostController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
