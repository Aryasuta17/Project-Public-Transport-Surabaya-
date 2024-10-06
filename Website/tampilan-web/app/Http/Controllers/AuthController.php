<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input form login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Mendapatkan credential (email dan password)
        $credentials = $request->only('email', 'password');

        // Check if the user is logging in with admin credentials
        if ($credentials['email'] === 'admin@admin.com' && $credentials['password'] === 'Admin1357') {
            // Automatically log in the admin
            Auth::loginUsingId(1); // Assuming the admin's ID is 1 in your users table

            // Redirect to the admin dashboard
            return redirect()->route('admin.dashboard');
        }

        // Attempt to log the user in with regular authentication
        if (Auth::attempt($credentials)) {
            // If login successful, redirect to the user home
            return redirect()->intended('user/home');
        }

        // Jika login gagal, kembali ke halaman login dengan error message
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // Menampilkan form register
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Proses register
    public function register(Request $request)
    {
        // Validasi input form register
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // Konfirmasi password harus cocok
        ]);

        // Membuat user baru di database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Enkripsi password
        ]);

        // Login otomatis setelah register
        Auth::login($user);

        // Redirect ke halaman home user
        return redirect()->route('user.home');
    }

    // Proses logout
    public function logout(Request $request)
    {
        // Logout user
        Auth::logout();

        // Invalidasi sesi saat ini
        $request->session()->invalidate();

        // Regenerasi token CSRF untuk keamanan tambahan
        $request->session()->regenerateToken();

        // Redirect ke halaman welcome setelah logout
        return redirect()->route('welcome');
    }
}
