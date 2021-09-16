<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Chats;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/lang', function (Request $request) {
    $locale = $request->input('locale', 'en');
    App::setLocale($locale);
    return view('demo');
});

// DashboardController
Route::get('/main-hall', [DashboardController::class, 'mainHall'])->name('main-hall');
Route::get('/live-schedule', [DashboardController::class, 'liveSchedule'])->name('live-schedule');
Route::get('/consultation', [DashboardController::class, 'consultation'])->name('consultation');
Route::get('/exhibitor-list', [DashboardController::class, 'exhibitorList'])->name('exhibitor-list');




Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/under-construction', [HomeController::class, 'maintenance'])->name('maintenance');

Route::prefix('home')->group(function () {
    // OVERVIEW
    Route::get('about-hef', [HomeController::class, 'aboutHef'])->name('overview.about-hef');
    Route::get('about-iahe', [HomeController::class, 'aboutIahe'])->name('overview.about-iahe');
    Route::get('programs', [HomeController::class, 'programs'])->name('overview.programs');
    Route::get('webinar-rundown', [HomeController::class, 'webinarRundown'])->name('overview.webinar-rundown');
    Route::get('news', [HomeController::class, 'news'])->name('overview.news');
    Route::get('important-dates', [HomeController::class, 'importantDates'])->name('overview.important-dates');

    // EXHIBITOR
    Route::get('exhibitor-guideline', [HomeController::class, 'exhibitorGuideline'])->name('exhibitor.guideline');
    Route::get('who-exhibit', [HomeController::class, 'whoExhibit'])->name('exhibitor.who-exhibit');
    Route::get('why-exhibit', [HomeController::class, 'whyExhibit'])->name('exhibitor.why-exhibit');
    Route::get('packages', [HomeController::class, 'packages'])->name('exhibitor.packages');

    // VISITOR
    Route::get('visitor-guideline', [HomeController::class, 'visitorGuideline'])->name('visitor.guideline');
    Route::get('why-attend', [HomeController::class, 'whyAttend'])->name('visitor.why-attend');
    Route::get('who-attend', [HomeController::class, 'whoAttend'])->name('visitor.who-attend');

    // FAQ
    Route::get('faq-general', [HomeController::class, 'faqGeneral'])->name('faq.general');
    Route::get('faq-visitor', [HomeController::class, 'faqVisitor'])->name('faq.visitor');
    Route::get('faq-exhibitor', [HomeController::class, 'faqExhibitor'])->name('faq.exhibitor');
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
    Route::resource('/news', NewsController::class);
    Route::get('chat', Chats::class);
    Route::get('/company', [UserController::class, 'company'])->name('exhibitor.company');
    // Route::get('/guideline', [UserController::class, 'guideline'])->name('exhibitor.guideline');
    Route::get('/certificate', [UserController::class, 'certificate'])->name('exhibitor.certificate');
});

// Route::prefix('public')->group(function () {
//     Route::get('chat', Chats::class);
// });

require __DIR__ . '/auth.php';
