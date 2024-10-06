<?php

namespace App\Http\Controllers;

use App\Models\Route; // Tambahkan ini
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function showSearchPage()
    {
        // Mengambil semua rute dari tabel routes
        $routes = Route::all();

        // Mengirim data ke tampilan
        return view('bus.search', compact('routes'));
    }

    // Metode pencarian rute bisa ditambahkan di sini
}
