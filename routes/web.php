<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    // return view('welcome');
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('post', PostController::class);

Route::get('/returnUser', PostController::class .'@returnUser')->name('post.returnUser');
//Route::get('/posts/{post}/edit', PostController::class .'@edit')->name('posts.edit');
//Route::get('returnUser/{colPost}/return', PostController::class .'returnUser')->name('post.returnUser');

Route::resource('category', CategoryController::class);
Route::resource('post', PostController::class);


Route::resource('role', RoleController::class);
Route::resource('menu', MenuController::class);
// pruebas juli
// Route::group(function (){
//     Route::get('/user',[ProfileController::class, 'returnUser'])->name('user.get');
// });
require __DIR__.'/auth.php';
