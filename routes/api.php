<?php

use Illuminate\Support\Facades\Route;

// ??
Route::get('download/{filename}', function ($filename) {
    return response()->download(public_path($filename));
});
Route::get('download/{storage}/{filename}', function ($storage, $filename) {
    return response()->download(public_path('storage/' . $storage) . '/' . $filename);
});
Route::get('/banner/download/storage/{filename}', [App\Http\Controllers\Api\BannerController::class, 'download']);

// dipakai
Route::get('/validation-referral/{referral?}', [App\Http\Controllers\HomeController::class, 'validationReferral']);

Route::prefix('admin')->group(function () {
    Route::post('check-referral', [App\Http\Controllers\Api\AdminController::class, 'getReferral']);
    Route::post('update-referral', [App\Http\Controllers\Api\AdminController::class, 'updateReferral']);
});

Route::prefix('auth')->group(function () {
    Route::post('register', [App\Http\Controllers\Api\AuthController::class, 'register']);
    Route::post('login/email', [App\Http\Controllers\Api\AuthController::class, 'loginEmail']);
    Route::post('login', [App\Http\Controllers\Api\AuthController::class, 'login']);
    Route::post('logout', [App\Http\Controllers\Api\AuthController::class, 'logout']);
    Route::post('refresh', [App\Http\Controllers\Api\AuthController::class, 'refresh']);
    Route::post('me', [App\Http\Controllers\Api\AuthController::class, 'me']);
    Route::put('update', [App\Http\Controllers\Api\AuthController::class, 'update']);
    Route::put('update/status', [App\Http\Controllers\Api\AuthController::class, 'adminUpdateStatus']);
    Route::post('reset/password', [App\Http\Controllers\Api\AuthController::class, 'adminResetPassword']);
});

Route::apiResource('/setting', App\Http\Controllers\Api\SettingController::class);

Route::get('user/detail/{user}', [App\Http\Controllers\Api\AuthController::class, 'userDetail']);
Route::resource('/post', App\Http\Controllers\Api\PostController::class);
Route::apiResource('/package', App\Http\Controllers\Api\PackageController::class);
Route::apiResource('/rundown', App\Http\Controllers\Api\RundownController::class);

Route::post('/tracker/update-location', [App\Http\Controllers\Api\TrackerController::class, 'upateLocation']);
Route::get('/tracker/graph-accumulative', [App\Http\Controllers\Api\TrackerController::class, 'graphAccumulative']);
Route::get('/tracker/graph-total', [App\Http\Controllers\Api\TrackerController::class, 'graphTotal']);
Route::get('/tracker/graph-province', [App\Http\Controllers\Api\TrackerController::class, 'graphProvince']);
Route::post('/tracker', [App\Http\Controllers\Api\TrackerController::class, 'store']);

// COUNTER
Route::get('/list-visitor-views', [App\Http\Controllers\Api\CounterVisitorController::class, 'listVisitorViews']);
Route::get('/admin/list-visitor-views', [App\Http\Controllers\Api\CounterVisitorController::class, 'adminListVisitorViews']);
Route::get('/admin/list-visitor-booth-views', [App\Http\Controllers\Api\CounterVisitorController::class, 'adminListVisitorBoothViews']);

Route::prefix('chat')->group(function () {
    Route::get('/contact-list', [App\Http\Controllers\Api\ChatController::class, 'contactChatList']);
    Route::get('/user/{user}', [App\Http\Controllers\Api\ChatController::class, 'ChatDetail']);
    Route::post('/send', [App\Http\Controllers\Api\ChatController::class, 'sendChat']);
    Route::post('/delete-own', [App\Http\Controllers\Api\ChatController::class, 'deleteOwnChat']);
});

Route::prefix('broadcast')->group(function () {
    Route::get('/', [App\Http\Controllers\Api\BroadcastController::class, 'userBroadcast']);
    Route::post('/', [App\Http\Controllers\Api\BroadcastController::class, 'adminStoreBroadcast']);
});

Route::prefix('forum')->group(function () {
    Route::get('/', [App\Http\Controllers\Api\ForumController::class, 'index']);
    Route::post('/', [App\Http\Controllers\Api\ForumController::class, 'store']);
});

Route::prefix('consultation')->group(function () {
    Route::get('/', [App\Http\Controllers\Api\ConsultationController::class, 'index']);
    Route::get('/available', [App\Http\Controllers\Api\ConsultationController::class, 'available']);
    Route::put('/{consultation}', [App\Http\Controllers\Api\ConsultationController::class, 'update']);
    Route::post('/', [App\Http\Controllers\Api\ConsultationController::class, 'store']);
    Route::delete('/{consultation}', [App\Http\Controllers\Api\ConsultationController::class, 'destroy']);
    // without login first
    Route::post('/guest', [App\Http\Controllers\Api\ConsultationController::class, 'storeGuest']);
});

Route::prefix('user')->group(function () {
    Route::get('/list', [App\Http\Controllers\Api\UserController::class, 'userList']);
    Route::get('detail', [App\Http\Controllers\Api\UserController::class, 'detailByEmail']);
});

Route::prefix('exhibitor')->group(function () {
    Route::get('/banner', [App\Http\Controllers\Api\BannerController::class, 'index']);
    Route::post('/banner', [App\Http\Controllers\Api\BannerController::class, 'store']);
    Route::delete('/banner/{banner}', [App\Http\Controllers\Api\BannerController::class, 'destroy']);

    Route::get('/', [App\Http\Controllers\Api\UserController::class, 'exhibitorList']);
    Route::get('/{user}', [App\Http\Controllers\Api\UserController::class, 'exhibitorDetail']);
});
