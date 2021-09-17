<?php

use App\Http\Controllers\Api\BroadcastController;
use App\Http\Controllers\Api\ForumController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;

Route::get('tes', function () {
    return 'tes';
});

Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login/email', [AuthController::class, 'loginEmail']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::prefix('chat')->group(function () {
    Route::get('/contact-list', [ChatController::class, 'contactChatList']);
    Route::get('/user/{user}', [ChatController::class, 'ChatDetail']);
    Route::post('/send', [ChatController::class, 'sendChat']);
    Route::post('/delete-own', [ChatController::class, 'deleteOwnChat']);
});

Route::prefix('broadcast')->group(function () {
    Route::get('/', [BroadcastController::class, 'userBroadcast']);
    Route::post('/', [BroadcastController::class, 'adminStoreBroadcast']);
});

Route::prefix('forum')->group(function () {
    Route::get('/', [ForumController::class, 'index']);
    Route::post('/', [ForumController::class, 'store']);
});
