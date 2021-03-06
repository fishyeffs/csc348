<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ThreadController;
use App\Http\Controllers\Api\CommentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('thread', [ThreadController::class, 'index']);

Route::get('thread/{id}', [ThreadController::class, 'displayThread']);

Route::get('comment', [CommentController::class, 'index']);

Route::get('comment/{id}', [CommentController::class, 'get']);

