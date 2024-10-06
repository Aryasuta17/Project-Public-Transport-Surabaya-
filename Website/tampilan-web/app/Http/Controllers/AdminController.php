<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function manageNews()
    {
        $news = News::all();
        return view('admin.manage_news', compact('news'));
    }

    public function createNews(Request $request)
    {
        // Code to create news
    }

    public function updateNews(Request $request, $id)
    {
        // Code to update news
    }

    public function deleteNews($id)
    {
        // Code to delete news
    }
}
