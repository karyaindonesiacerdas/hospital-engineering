<?php

use App\Http\Controllers\Api\BroadcastController;
use App\Http\Controllers\Api\ForumController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login/email', [AuthController::class, 'loginEmail']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});
Route::prefix('broadcast')->group(function () {
    Route::get('/', [BroadcastController::class, 'userBroadcast']);
    Route::post('/', [BroadcastController::class, 'adminStoreBroadcast']);
});

Route::prefix('forum')->group(function () {
    Route::get('/', [ForumController::class, 'index']);
    Route::post('/', [ForumController::class, 'store']);
});
