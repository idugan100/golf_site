<?php

use App\Http\Controllers\CommentController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('profiles.user_profile');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('comments',CommentController::class)
    ->only(['destroy','store'])
    ->middleware(['auth','verified']);
//profile routes
Route::get('profile',[UserController::class,'index'])
    ->name('profile')
    ->middleware(['auth','verified']);
Route::patch('/profile/update',[UserController::class,'update'])
    ->middleware(['auth','verified']);
Route::get('profile/edit',[UserController::class,'edit'])
    ->name('profile.edit')
    ->middleware(['auth','verified']);
Route::get('profile/{id}',[UserController::class,'show'])
    ->name('profile.show')
    ->middleware(['auth', 'verified']);


Route::resource('posts',PostController::class)
    ->only(['index','store','edit','update','destroy'])
    ->middleware(['auth','verified']);

require __DIR__.'/auth.php';
