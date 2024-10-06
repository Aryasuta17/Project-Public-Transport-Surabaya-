<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News; // Mengimpor model News

class WelcomeController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel news
        $news = News::all();

        // Mengirim data ke view welcome
        return view('welcome', compact('news'));
    }
}
