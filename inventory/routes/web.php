<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/categories', [HomeController::class, 'index'])->name('category.home');
Route::get('/categoryadd', function () {
    return view('addcategory');
});
Route::get('/category/{id}', [HomeController::class, 'edit'])->name('category.edit');
Route::patch('/categoryupdate', [HomeController::class, 'update'])->name('category.update');
Route::delete('/categorydelete/{category}', [HomeController::class, 'destroy'])->name('category.destroy');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/createcategory', function () {
    return view('createcategory');
})->middleware(['auth', 'verified']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
