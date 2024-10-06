<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function news()
    {
        return view('admin.news');
    }

    public function buses()
    {
        return view('admin.buses');
    }

    public function profile()
    {
        return view('admin.profile');
    }
}
