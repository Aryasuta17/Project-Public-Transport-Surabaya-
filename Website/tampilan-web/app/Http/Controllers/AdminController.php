<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        return view('admin.pages.dashboard');
    }

    public function manageUsers() {
        return view('admin.pages.manage_users');
    }

    public function manageRoutes() {
        return view('admin.pages.manage_routes');
    }

    public function manageTransport() {
        return view('admin.pages.manage_transport');
    }

    public function settings() {
        return view('admin.pages.settings');
    }
}
