<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landingpage');
});

Route::get('/biodata', function () {
    return view('biodata');
});

Route::get('/pengalaman', function () {
    return view('pengalaman');
});

Route::get('/portofolio', function () {
    return view('portofolio');
});

Route::get('/contact', function () {
    return view('contact');
});
