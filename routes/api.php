<?php

// PINDAH SEMUA CONTROLLER KE API DIR
// JANGAN IMPORT CONTROLLER TAPI TULIS LENGKAP NAMESPACE, EQ. [App\Http\Controllers\Api\BroadcastController::class, 'SOMETHING'];

use App\Http\Controllers\Api\BroadcastController;
use App\Http\Controllers\Api\ForumController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\UserController;
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
    Route::put('update', [AuthController::class, 'update']);
    Route::put('update/status', [AuthController::class, 'adminUpdateStatus']);
});

Route::resource('/post', App\Http\Controllers\Api\PostController::class);
Route::apiResource('/package', App\Http\Controllers\Api\PackageController::class);
Route::apiResource('/rundown', App\Http\Controllers\Api\RundownController::class);

// COUNTER
Route::get('/list-visitor-views', [App\Http\Controllers\Api\CounterVisitorController::class, 'listVisitorViews']);
Route::post('/count-visitor-views', [App\Http\Controllers\Api\CounterVisitorController::class, 'countVisitorViews']);

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

Route::prefix('consultation')->group(function () {
    Route::get('/', [ConsultationController::class, 'index']);
    Route::get('/available', [ConsultationController::class, 'available']);
    Route::put('/{consultation}', [ConsultationController::class, 'update']);
    Route::post('/', [ConsultationController::class, 'store']);
    Route::delete('/{consultation}', [ConsultationController::class, 'destroy']);
});

Route::prefix('exhibitor')->group(function () {
    Route::get('/banner', [BannerController::class, 'index']);
    Route::post('/banner', [BannerController::class, 'store']);
    Route::delete('/banner/{banner}', [BannerController::class, 'destroy']);

    Route::get('/', [UserController::class, 'exhibitorList']);
    Route::get('/{user}', [UserController::class, 'exhibitorDetail']);
    // Route::post('/', [ConsultationController::class, 'store']);

    // BANNER
});


// Route::prefix('product')->group(function () {
//     Route::get('/', [ConsultationController::class, 'index']);
//     Route::post('/', [ConsultationController::class, 'store']);
// });
