<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{CategoryController, PostController};
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

Route::get('/', function () {
    // return view('welcome');
    return view('home');
});


Route::get('posts', [PostController::class, 'index'])->name('posts.index');

Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('posts/store', [PostController::class, 'store']);
// Route::get('posts/{post:slug}', [PostController::class, 'show']);




Route::get('categories', [CategoryController::class, 'index'])->name('category.index');
Route::get('categories/create', [CategoryController::class, 'create'])->name('category.create');

// Route::get('posts/creates', [PostController::class, 'create'])->name('posts.create');
