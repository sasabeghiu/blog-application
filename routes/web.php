<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;

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

Route::get('/', [PagesController::class, 'index']);
Route::get('/about', [PagesController::class, 'about']);
Route::get('/services', [PagesController::class, 'services']);

// all the routes for posts 
Route::resource('posts', PostsController::class);

Route::get('/posts', [PostsController::class, 'index']);

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
