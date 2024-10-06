<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\BusController;

// Route untuk halaman welcome
Route::get('/', function () {
    return view('welcome'); // Pastikan ada file resources/views/welcome.blade.php
})->name('welcome');

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// Rute untuk login
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

// Rute untuk logout
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Rute untuk register
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

// Rute untuk user home
Route::get('user/home', function () {
    return view('user.home'); // Pastikan ada file resources/views/user/home.blade.php
})->name('user.home');

// Rute untuk dashboard admin
Route::get('admin/dashboard', function () {
    return view('admin.dashboard'); // Pastikan ada file resources/views/admin/dashboard.blade.php
})->name('admin.dashboard');

Route::get('/cari-rute', [BusController::class, 'showSearchPage'])->name('cari-rute');
Route::post('/cari-rute', [BusController::class, 'searchRoute']);
