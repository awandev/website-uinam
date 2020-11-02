<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{CategoryController, HomeController, PostController, TagController};
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('posts', [PostController::class, 'index'])->name('posts.index');


Route::prefix('posts')->middleware('auth')->group(function () {
    Route::get('{post:slug}/edit', [PostController::class, 'edit']);
    Route::patch('{post:slug}/edit', [PostController::class, 'update']);
    Route::get('create', [PostController::class, 'create'])->name('posts.create');
    Route::post('store', [PostController::class, 'store']);
    Route::delete('{post:slug}/delete', [PostController::class, 'destroy']);
});
Route::get('posts/{post:slug}', [PostController::class, 'show']);


Route::get('categories/{category:slug}', [CategoryController::class, 'show']);
Route::get('tags/{tag:slug}', [TagController::class, 'show']);
// Route::get('posts/creates', [PostController::class, 'create'])->name('posts.create');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
