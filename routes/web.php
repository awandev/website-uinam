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

Route::get('posts/detail/{post:slug}', [PostController::class, 'show']);
Route::get('posts/{post:slug}/edit', [PostController::class, 'edit']);
Route::patch('posts/{post:slug}/edit', [PostController::class, 'update']);
Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('posts/store', [PostController::class, 'store']);
Route::delete('posts/{post:slug}/delete', [PostController::class, 'destroy']);


Route::get('categories/{category:slug}', [CategoryController::class, 'show']);

// Route::get('posts/creates', [PostController::class, 'create'])->name('posts.create');
