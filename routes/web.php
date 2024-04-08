<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AproposController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/mentionlegale', function () {
    return view('mentionlegale');
});

Route::get('/Apropos', [AproposController::class, 'index'])->name('Apropos');
Route::get('/welcome', [AproposController::class, 'index'])->name('welcome');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
