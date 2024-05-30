<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'getHome'])->name("home");

Route::get('auth/', function () {
  return view('auth/login');
});

Route::get('logout/', function () {
  return view('logout');
});

Route::get('category/', [CategoryController::class, 'getIndex'])->name("category");
Route::get('category/show/{id}', [CategoryController::class, 'getShow'])->name("categoryShow");
Route::get('category/edit/{id}', [CategoryController::class, 'getEdit'])->name("categoryEdit");
Route::get('category/create', [CategoryController::class, 'getCreate'])->name("categoryCreate");

require __DIR__.'/auth.php';
