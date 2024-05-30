<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
// use Illuminate\Support\Facades\Route;

// Route::get('/', [HomeController::class, 'getHome'])->name("home");

// Route::get('auth/', function () {
//   return view('auth/login');
// });

// Route::get('logout/', function () {
//   return view('logout');
// });

Route::get('category/', [CategoryController::class, 'getIndex'])->name("category");
Route::get('category/show/{id}', [CategoryController::class, 'getShow'])->name("categoryShow");
Route::get('category/edit/{id}', [CategoryController::class, 'getEdit'])->name("categoryEdit");
Route::get('category/create', [CategoryController::class, 'getCreate'])->name("categoryCreate");

require __DIR__.'/auth.php';
