<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
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
Route::post('logout', function() {Auth::logout();return redirect()->route('welcome');})->name('logout');
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

// Route for the user home
Route::get('user/home', function () { return view('user.home'); })->name('user.home');

Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('admin/news', [AdminController::class, 'news'])->name('admin.news');
Route::get('admin/buses', [AdminController::class, 'buses'])->name('admin.buses');
Route::get('admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
