<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BusController;

// Route for the welcome page
Route::get('/', [WelcomeController::class, 'index'])->name('welcome'); 

// Route for the search page (different URL from welcome)
Route::get('/search', [BusController::class, 'search'])->name('search');

// Route to handle the search form submission and display the results
Route::get('/search-route', [BusController::class, 'searchRoute'])->name('search.route');

// Rute untuk halaman services
Route::get('/services', function () {return view('services');})->name('services');

// Rute untuk halaman contact
Route::get('/contact', function () {return view('contact'); })->name('contact');

// Routes for login, register, etc.
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

// Routes for user home and admin dashboard
Route::get('user/home', function () { return view('user.home'); })->name('user.home');

Route::get('admin/dashboard', function () {
    return view('admin.dashboard'); // Make sure the view exists
})->name('admin.dashboard');
