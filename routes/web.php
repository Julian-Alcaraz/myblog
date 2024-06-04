<?php
// Route
use Illuminate\Support\Facades\Route;
// Controllers
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
Route::get('/', function () {
  return view('dashboard');
});
// Raro que siga nesecitando verificacion de logeo el dashboard
Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Post
Route::get('/post', [PostController::class, 'index'])->name('post.index');
Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');
Route::middleware(['auth', 'verified'])->group(function () { // Middleware que haya un usuario logeado
  Route::get('/post/create', [PostController::class, 'create'])->name('post.create'); // No funciona ahora, funcionaba antes!!!
  Route::get('/post/{post}/edit', [PostController::class, 'edit'])->name('post.edit')->middleware('handle'); // ver de cambiar nombre de middleware
  Route::post('/post', [PostController::class, 'store'])->name('post.store');
  Route::put('/post/{post}', [PostController::class, 'update'])->name('post.update');
  Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy');
});

//Route::resource('post', PostController::class); 
Route::resource('category', CategoryController::class);
Route::resource('role', RoleController::class);
Route::resource('menu', MenuController::class);
Route::resource('user', UserController::class);
/*
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/{menu}', [MenuController::class, 'show'])->name('menu.show');
Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create'); // No funciona ahora, funcionaba antes!!!
Route::get('/menu/{menu}/edit', [MenuController::class, 'edit'])->name('menu.edit'); // ver de cambiar nombre de middleware
Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
Route::put('/menu/{menu}', [MenuController::class, 'update'])->name('menu.update');
Route::delete('/menu/{menu}', [MenuController::class, 'destroy'])->name('menu.destroy');
*/



Route::resource('menu_roles', MenuController::class);

require __DIR__ . '/auth.php';
