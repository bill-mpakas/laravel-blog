<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// User Related routes
Route::get('/', [UserController::class,"showCorrectHomepage"])->name('login');
Route::post('/register', [UserController::class,'register'])->middleware('guest');
Route::post('/login', [UserController::class,'login'])->middleware('guest');
Route::post('/logout', [UserController::class,'logout'])->middleware('auth');

// Blog related routes
Route::get('/create-post',[PostController::class,'showCreateForm'])->middleware('guest');
Route::post('/create-post',[PostController::class,'storeNewPost'])->middleware('auth');
Route::get('/post/{post}',[PostController::class,'viewSinglePost']);
