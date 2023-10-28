<?php

use App\Http\Controllers\Posts;
use App\Http\Controllers\Cars;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/posts', [Posts::class, 'index'])->name('posts.index');
Route::get('/posts/create', [Posts::class, 'create'])->name('posts.create');
Route::put('/posts/{id}', [Posts::class, 'update'])->name('posts.update');
Route::delete('/posts/{id}', [Posts::class, 'destroy'])->name('posts.destroy');
Route::get('/posts/{id}', [Posts::class, 'show'])->name('posts.show');
Route::get('/posts/{id}/edit', [Posts::class, 'edit'])->name('posts.edit');
Route::post('/posts', [Posts::class, 'store'])->name('posts.store');

Route::resource('cars', Cars::class);

// Route::get('/cars', [Cars::class, 'index']);
// Route::post('/cars', [Cars::class, 'store']);
// Route::get('/cars/create', [Cars::class, 'create']);
// Route::get('/cars/{car}', [Cars::class, 'show']);
// Route::get('/cars/{car}/edit', [Cars::class, 'edit']);
// Route::put('/cars/{car}', [Cars::class, 'update']);
// Route::delete('/cars/{car}', [Cars::class, 'destroy']);