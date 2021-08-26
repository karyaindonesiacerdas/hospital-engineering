<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->group(function () {
    Route::resource('/', UserController::class);
});

// HOME
Route::get('/', [HomeController::class, 'index']);
Route::get('about', [HomeController::class, 'about']);
Route::get('faq', [HomeController::class, 'faq']);
Route::post('register/guest', [AuthController::class, 'registerGuest'])->name('register.guest');
Route::get('register/visitor', [AuthController::class, 'registerVisitor'])->name('register.visitor');
Route::get('register/exhibitor', [AuthController::class, 'registerExhibitor'])->name('register.exhibitor');

Route::prefix('dashboard')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    // Route::get('/', function () {
    //     return view('dashboard');
    // })->middleware(['auth'])->name('dashboard');
    Route::resource('/product', ProductController::class);
    Route::resource('/appointment', AppointmentController::class);
    Route::get('/company', [UserController::class, 'company'])->name('exhibitor.company');
    Route::get('/guideline', [UserController::class, 'guideline'])->name('exhibitor.guideline');
    Route::get('/certificate', [UserController::class, 'certificate'])->name('exhibitor.certificate');
});

require __DIR__ . '/auth.php';
