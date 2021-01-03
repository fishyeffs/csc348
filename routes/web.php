<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SignUpController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogOutController;
use App\Http\Controllers\HomePgController;
use App\Http\Controllers\Api\ThreadController;
use App\Http\Controllers\Api\CommentController;

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

Route::get('home', [HomePgController::class, 'index'])->name('home');

Route::get('profile', function () {
    return view('components.profile');
})->name('profile')->middleware('auth');

Route::get('thread/{id}', function () {
    return view('components.thread');
});

Route::get('thread/{id}/edit', [ThreadController::class, 'edit'])
    ->name('edit')
    ->middleware('auth');

Route::put('thread/{id}/update', [ThreadController::class, 'update'])
    ->name('update')
    ->middleware('auth');

Route::get('login', [LoginController::class, 'index'])
    ->name('login')
    ->middleware('guest');
Route::post('login', [LoginController::class, 'store']);

Route::get('signup', [SignUpController::class, 'index'])->name('signup');
Route::post('signup', [SignUpController::class, 'store']);

Route::get('logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('create-thread', [ThreadController::class, 'createThreadForm'])
    ->name('createThreadForm')
    ->middleware('auth'); //stops non-users from posting

Route::post('create', [ThreadController::class, 'store'])
    ->name('create')
    ->middleware('auth');

Route::post('create-comment', [CommentController::class, 'store'])
    ->name('store-comment')
    ->middleware('auth');