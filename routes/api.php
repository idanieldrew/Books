<?php

use App\Http\Controllers\Api\v1\BookController;
use App\Http\Controllers\Api\v1\LoginController;
use App\Http\Controllers\Api\v1\LikeController;
use App\Http\Controllers\Api\v1\CommentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('books', [BookController::class, 'index'])->name('book.index');
Route::get('book/{book:slug}', [BookController::class, 'show'])->name('book.show');

Route::post('book/{book:slug}/like', [LikeController::class, 'store'])->name('like.store');

Route::post('book/{book:slug}/comment', [CommentController::class, 'store'])->name('like.store');

Route::get('search', [BookController::class, 'search'])->name('book.search');

Route::post('login', [LoginController::class, 'Login'])->name('login');
