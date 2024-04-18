<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AproposController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;



Route::get('/Apropos', [AproposController::class, 'index'])->name('Apropos');
Route::get('/Mentionslegale', [AproposController::class, 'index'])->name('Mentionslegale');
Route::get('/', [PostController::class, 'index'])->name('welcome');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [PostController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/myposts', [PostController::class, 'myposts'])->name('dashboard.myposts');

    Route::get('/dashboard/myposts/create', [PostController::class, 'create'])->name('dashboard.myposts.create');
    Route::post('/dashboard/myposts', [PostController::class, 'store'])->name('dashboard.myposts.store');

    Route::get('/dashboard/myposts/{id}', [PostController::class, 'show'])->name('dashboard.myposts.show');

    Route::get('/dashboard/myposts/{id}/edit', [PostController::class, 'edit'])->name('dashboard.myposts.edit');
    Route::put('/dashboard/myposts/{id}/edit', [PostController::class, 'update'])->name('dashboard.myposts.update');

    Route::delete('/dashboard/myposts/{id}', [PostController::class, 'destroy'])->name('dashboard.myposts.destroy');

    Route::get('/dashboard/myposts/{categoryId}/posts', [PostController::class, 'getPostsByCategoryId'])->name('dashboard.myposts.category');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['auth', 'AdminMiddleware']], function () {

    Route::resource('categories', CategoryController::class); // CRUD de catégories
    Route::resource('users', UserController::class); // CRUD d'utilisateurs
});

Route::group(['middleware' => ['auth', 'AdminMiddleware']], function () {

    
    Route::get('/users/{id}', [UserController::class, 'show'])->name('user.show');

    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/users/{id}/update', [UserController::class, 'update'])->name('user.update');

    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});

require __DIR__.'/auth.php';

