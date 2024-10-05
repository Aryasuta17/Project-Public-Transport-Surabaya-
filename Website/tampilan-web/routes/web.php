<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BusController;
use App\Http\Controllers\TrainController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini Anda dapat mendaftarkan route web untuk aplikasi Anda. Route
| ini dimuat oleh RouteServiceProvider dalam grup yang berisi "web"
| middleware group. Mari kita buat sesuatu yang hebat!
|
*/

// Beranda
Route::get('/', function () {
    return view('home');
})->name('home');

// Berita
Route::get('/berita', function () {
    return view('berita');
})->name('berita');

// Pilihan Transportasi
Route::get('/pilihan-transportasi', function () {
    return view('pilihan_transportasi');
})->name('pilihan.transportasi');

// Rute Bus
Route::get('/rute-bus', [BusController::class, 'index'])->name('rute.bus');

// Detail Rute Bus
Route::get('/detail-rute-bus/{id}', [BusController::class, 'show'])->name('detail.rute.bus');

// Rute Kereta
Route::get('/rute-kereta', [TrainController::class, 'ruteKereta'])->name('rute.kereta');
Route::get('/detail-rute-kereta/{start}/{end}', [TrainController::class, 'detailRuteKereta'])->name('detail.rute.kereta');

// Diskusi
Route::get('/diskusi', function () {
    return view('diskusi');
})->name('diskusi');

// Kontak Kami
Route::get('/contact-us', function () {
    return view('contact_us');
})->name('contact.us');

// Login
Route::get('/login', function () {
    return view('login');
})->name('login');

// Register
Route::get('/register', function () {
    return view('register');
})->name('register');

// Logout (Jika diperlukan)
Route::post('/logout', function () {
    // Logic untuk logout pengguna
    return redirect()->route('home');
})->name('logout');

// --------------------
// Admin Routes
// --------------------

// Route untuk dashboard admin
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Route untuk halaman manage users
Route::get('/admin/users', [AdminController::class, 'manageUsers'])->name('admin.manage.users');

// Route untuk halaman manage routes
Route::get('/admin/routes', [AdminController::class, 'manageRoutes'])->name('admin.manage.routes');

// Route untuk halaman manage transport
Route::get('/admin/transport', [AdminController::class, 'manageTransport'])->name('admin.manage.transport');

// Route untuk halaman settings
Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');

Route::post('/logout', function () {
    Auth::logout();  // Logs out the user
    return redirect()->route('home');  // Redirects to home after logout
})->name('logout');