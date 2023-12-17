<?php

use App\Http\Controllers\Posts;
use App\Http\Controllers\Cars;
use App\Http\Controllers\Brands;
use App\Http\Controllers\Tags;
use App\Http\Controllers\Comments;
use App\Http\Controllers\Auth\Sessions;
use App\Http\Controllers\Auth\Register;
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

Route::prefix('/auth')->name('auth.')->group(function() {
    Route::controller(Register::class)->group(function() {
        Route::get('/register', 'create')->name('register.form');
        Route::post('/register', 'store')->name('register.store');
    });
});

Route::prefix('/auth')->middleware('guest')->name('auth.')->group(function() {
    Route::controller(Sessions::class)->group(function() {
        Route::get('/login', 'create')->name('session.login');
        Route::post('/login', 'store')->name('session.store');
    });
    // Route::controller(Register::class)->group(function() {
    //     Route::get('/register', 'create')->name('register.form');
    //     Route::post('/register', 'store')->name('register.store');
    // });
});


Route::prefix('/auth')->middleware('auth')->name('auth.')->group(function() {
    Route::get('/logout', [Sessions::class, 'destroy'])->name('session.logout');
    // Route::controller(Sessions::class)->group(function() {
    //     Route::get('/login', 'create')->name('session.login');
    //     Route::post('/login', 'store')->name('session.store');
    // });
});

Route::get('/posts', [Posts::class, 'index'])->name('posts.index');
Route::get('/posts/create', [Posts::class, 'create'])->name('posts.create');
Route::put('/posts/{id}', [Posts::class, 'update'])->name('posts.update');
Route::delete('/posts/{id}', [Posts::class, 'destroy'])->name('posts.destroy');
Route::get('/posts/{id}', [Posts::class, 'show'])->name('posts.show');
Route::get('/posts/{id}/edit', [Posts::class, 'edit'])->name('posts.edit');
Route::post('/posts', [Posts::class, 'store'])->name('posts.store');

Route::resource('cars', Cars::class);

Route::middleware('auth', 'verified')->group(function() {
    Route::resource('brands', Brands::class);
    Route::middleware('can:tags')->group(function() {
        Route::resource('tags', Tags::class);
    });
    Route::get('/admin/logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
});
Route::post('comments', [Comments::class, 'store'])->name('comments.store');
Route::get('trash', [Cars::class, 'trash'])->name('cars.trash.index');
Route::put('/trash/{id}', [Cars::class, 'restore'])->name('cars.restore');

// Route::get('/cars', [Cars::class, 'index']);
// Route::post('/cars', [Cars::class, 'store']);
// Route::get('/cars/create', [Cars::class, 'create']);
// Route::get('/cars/{car}', [Cars::class, 'show']);
// Route::get('/cars/{car}/edit', [Cars::class, 'edit']);
// Route::put('/cars/{car}', [Cars::class, 'update']);
// Route::delete('/cars/{car}', [Cars::class, 'destroy']);