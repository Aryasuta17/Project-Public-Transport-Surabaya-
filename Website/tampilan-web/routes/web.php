<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/rute-bus', function () {
    return view('rute_bus');
})->name('rute.bus');

// Rute Kereta
Route::get('/rute-kereta', function () {
    return view('rute_kereta');
})->name('rute.kereta');

// Detail Rute Bus
Route::get('/detail-rute-bus/{id}', function ($id) {
    // Logic untuk menampilkan detail rute bus berdasarkan ID
    return view('detail_rute_bus', ['id' => $id]);
})->name('detail.rute.bus');

// Detail Rute Kereta
Route::get('/detail-rute-kereta/{id}', function ($id) {
    // Logic untuk menampilkan detail rute kereta berdasarkan ID
    return view('detail_rute_kereta', ['id' => $id]);
})->name('detail.rute.kereta');

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

// Rute Bus
Route::get('/rute-bus', function () {
    return view('rute_bus');
})->name('rute.bus');

// Detail Rute Bus
Route::get('/detail-rute-bus/{id}', function ($id) {
    return view('detail_rute_bus', ['id' => $id]);
})->name('detail.rute.bus');

// Rute Kereta
Route::get('/rute-kereta', function () {
    return view('rute_kereta');
})->name('rute.kereta');

// Detail Rute Kereta
Route::get('/detail-rute-kereta/{id}', function ($id) {
    return view('detail_rute_kereta', ['id' => $id]);
})->name('detail.rute.kereta');

