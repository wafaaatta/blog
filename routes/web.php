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
    Route::get('/dashboard/myposts', [PostController::class, 'myposts'])->name('dashboard.myposts');

    Route::get('/dashboard/myposts/create', [PostController::class, 'create'])->name('dashboard.myposts.create');
    Route::post('/dashboard/myposts', [PostController::class, 'store'])->name('dashboard.myposts.store');

    Route::get('/dashboard/myposts/{id}', [PostController::class, 'show'])->name('dashboard.myposts.show');

    Route::get('/dashboard/myposts/{id}/edit', [PostController::class, 'edit'])->name('dashboard.myposts.edit');
    Route::put('/dashboard/myposts/{id}/edit', [PostController::class, 'update'])->name('dashboard.myposts.update');

    Route::delete('/dashboard/myposts/{id}', [PostController::class, 'destroy'])->name('dashboard.myposts.destroy');


    Route::get('/profile', [ProfilController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfilController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfilController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
