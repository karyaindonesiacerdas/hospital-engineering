<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Chats;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/tes', function () {
    return $users = User::where('role', '=', 'exhibitor')->get();
})->middleware('auth');

Route::get('/', [HomeController::class, 'index']);

Route::prefix('home')->group(function () {
    // OVERVIEW
    Route::get('about-hew', [HomeController::class, 'aboutHew']);
    Route::get('about-iahe', [HomeController::class, 'aboutIahe']);
    Route::get('seminar-rundown', [HomeController::class, 'seminarRundown']);
    Route::get('news', [HomeController::class, 'news']);
    Route::get('important-dates', [HomeController::class, 'importantDates']);

    // FAQ
    Route::get('faq-general', [HomeController::class, 'faqGeneral']);
    Route::get('faq-visitor', [HomeController::class, 'faqVisitor']);
    Route::get('faq-exhibitor', [HomeController::class, 'faqExhibitor']);
});

Route::prefix('register')->group(function () {
    Route::post('/guest', [AuthController::class, 'registerGuest'])->name('register.guest');
    Route::get('/visitor', [AuthController::class, 'registerVisitor'])->name('register.visitor');
    Route::get('/exhibitor', [AuthController::class, 'registerExhibitor'])->name('register.exhibitor');
});

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('/product', ProductController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/appointment', AppointmentController::class);
    Route::get('chat', Chats::class);
    Route::get('/company', [UserController::class, 'company'])->name('exhibitor.company');
    Route::get('/guideline', [UserController::class, 'guideline'])->name('exhibitor.guideline');
    Route::get('/certificate', [UserController::class, 'certificate'])->name('exhibitor.certificate');
});

// Route::prefix('public')->group(function () {
//     Route::get('chat', Chats::class);
// });

require __DIR__ . '/auth.php';
