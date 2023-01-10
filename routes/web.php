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

Route::get('/admins-only', function () {
    return 'Only admins should be able to see this page';
})->middleware('can:visitAdminPages');

// User Related routes
Route::get('/', [UserController::class,"showCorrectHomepage"])->name('login');
Route::post('/register', [UserController::class,'register'])->middleware('guest');
Route::post('/login', [UserController::class,'login'])->middleware('guest');
Route::post('/logout', [UserController::class,'logout'])->middleware('auth');
Route::get('/manage-avatar', [UserController::class, 'showAvatarForm'])->middleware('mustBeLoggedIn');
Route::post('/manage-avatar', [UserController::class, 'storeAvatar'])->middleware('mustBeLoggedIn');

// Blog related routes
Route::get('/create-post',[PostController::class,'showCreateForm'])->middleware('guest');
Route::post('/create-post',[PostController::class,'storeNewPost'])->middleware('auth');
Route::get('/post/{post}',[PostController::class,'viewSinglePost']);
Route::delete('/post/{post}',[PostController::class,'delete'])->middleware('can:delete,post');
Route::get('/post/{post}/edit',[PostController::class, 'showEditForm'])->middleware('can:update,post');
Route::put('/post/{post}',[PostController::class, 'actuallyUpdate'])->middleware('can:update,post');

// Profile related routes

Route::get('/profile/{user:username}', [UserController::class,'profile']);
