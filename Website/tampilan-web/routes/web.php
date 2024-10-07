<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\BusAdminController;
use App\Http\Controllers\ScheduleController;

// Route for the welcome page
Route::get('/', [WelcomeController::class, 'index'])->name('welcome'); 

Route::get('berita/{id}', [NewsController::class, 'show'])->name('berita.show');

// Route for the search page (different URL from welcome)
Route::get('/search', [BusController::class, 'search'])->name('search');

// Route to handle the search form submission and display the results
Route::get('/search-route', [BusController::class, 'searchRoute'])->name('search.route');

// Route for the services page
Route::get('/services', function () {
    return view('services');
})->name('services');

// Route for the contact page
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Routes for login, register, etc.
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', function() {
    Auth::logout();
    return redirect()->route('welcome');
})->name('logout');
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

// Route for the user home
Route::get('user/home', function () {
    return view('user.home');
})->name('user.home');

// Admin dashboard routes
Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

// News CRUD routes under the 'admin' prefix
Route::prefix('admin')->group(function () {
    Route::get('news', [NewsController::class, 'index'])->name('admin.news.index');
    Route::get('news/create', [NewsController::class, 'create'])->name('admin.news.create');
    Route::post('news', [NewsController::class, 'store'])->name('admin.news.store');
    Route::get('news/{id}/edit', [NewsController::class, 'edit'])->name('admin.news.edit');
    Route::put('news/{id}', [NewsController::class, 'update'])->name('admin.news.update');
    Route::delete('news/{id}', [NewsController::class, 'destroy'])->name('admin.news.destroy');
});

// Bus CRUD routes under the 'admin' prefix
Route::prefix('admin')->group(function () {
    Route::get('buses', [BusAdminController::class, 'index'])->name('admin.buses.index');
    Route::get('buses/create', [BusAdminController::class, 'create'])->name('admin.buses.create');
    Route::post('buses', [BusAdminController::class, 'store'])->name('admin.buses.store');
    Route::get('buses/{id}/edit', [BusAdminController::class, 'edit'])->name('admin.buses.edit');
    Route::put('buses/{id}', [BusAdminController::class, 'update'])->name('admin.buses.update');
    Route::delete('buses/{id}', [BusAdminController::class, 'destroy'])->name('admin.buses.destroy');
});

// Schedule CRUD routes under the 'admin' prefix
Route::prefix('admin')->group(function () {
    Route::get('schedules', [ScheduleController::class, 'index'])->name('admin.schedules.index');
    Route::get('schedules/create', [ScheduleController::class, 'create'])->name('admin.schedules.create');
    Route::post('schedules', [ScheduleController::class, 'store'])->name('admin.schedules.store');
    Route::get('schedules/{id}/edit', [ScheduleController::class, 'edit'])->name('admin.schedules.edit');
    Route::put('schedules/{id}', [ScheduleController::class, 'update'])->name('admin.schedules.update');
    Route::delete('schedules/{id}', [ScheduleController::class, 'destroy'])->name('admin.schedules.destroy');
});

Route::get('/bus/{routeId}/{scheduleId}', [BusController::class, 'showDetails'])->name('bus.details');
