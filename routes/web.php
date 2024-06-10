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
use App\Http\Controllers\MenuRoleController;

Route::get('/', function () {
  return redirect('post');
})->name('post');
// Profile
Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Post
Route::get('/post', [PostController::class, 'index'])->name('post.index');

Route::middleware(['auth', 'verified'])->group(function () { // Middleware para que haya un usuario logeado
  // Post
  Route::get('/post/{post}/edit', [PostController::class, 'edit'])->name('post.edit')->middleware('PostMiddleware'); // Middleware para que el usuario sea dueño del post
  Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
  Route::post('/post', [PostController::class, 'store'])->name('post.store');
  Route::put('/post/{post}', [PostController::class, 'update'])->name('post.update');
  Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy');
  Route::middleware('AdminMiddleware')->group(function () { // Middleware para que el usuario logeado tenga rol admin
    // Vistas de admin
    // Menu
    Route::resource('menu', MenuController::class);
    Route::post('/menu/{menu}', [MenuController::class, 'alta'])->name('menu.alta');
    // Role
    Route::resource('role', RoleController::class);
    Route::post('/role/{role}', [RoleController::class, 'alta'])->name('role.alta');
    // Category
    Route::resource('category', CategoryController::class);
    Route::post('/category/{category}', [CategoryController::class, 'alta'])->name('category.alta');
    // User
    Route::resource('user', UserController::class);
    Route::post('/user/{user}', [UserController::class, 'alta'])->name('user.alta');
    // MenuRole
    Route::resource('menuroles', MenuRoleController::class);
  });
});
Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');
require __DIR__ . '/auth.php';
