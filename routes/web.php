<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SignUpController;

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

Route::get('home', function () {
    return view('components.home');
})->name('home'); 

Route::get('profile', function () {
    return view('components.profile');
})->name('profile');

Route::get('thread/{id}', function () {
    return view('components.thread');
});

Route::get('signup', [SignUpController::class, 'index'])->name('signup');

Route::post('signup', [SignUpController::class, 'store']);