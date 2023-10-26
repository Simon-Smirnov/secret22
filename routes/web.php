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

Route::get('/posts', [Posts::class, 'index']);
Route::get('/posts/create', [Posts::class, 'create']);
Route::put('/posts/{id}', [Posts::class, 'update']);
Route::delete('/posts/{id}', [Posts::class, 'destroy']);
Route::get('/posts/{id}', [Posts::class, 'show']);
Route::get('/posts/edit/{id}', [Posts::class, 'edit']);
Route::post('/posts', [Posts::class, 'store']);

Route::get('/cars', [Cars::class, 'index']);
Route::post('/cars', [Cars::class, 'store']);
Route::get('/cars/create', [Cars::class, 'create']);
Route::get('/cars/{car}', [Cars::class, 'show']);
Route::get('/cars/edit/{car}', [Cars::class, 'edit']);
Route::put('/cars/{car}', [Cars::class, 'update']);
Route::delete('/cars/{car}', [Cars::class, 'destroy']);