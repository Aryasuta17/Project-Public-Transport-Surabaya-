<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\BusAdminController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\FactPendapatanController;
use App\Http\Controllers\FactPelangganController;
use App\Http\Controllers\FactLogisticsController;

// Route for the welcome page
Route::get('/', [WelcomeController::class, 'index'])->name('welcome'); 

Route::get('berita/{id}', [NewsController::class, 'show'])->name('berita.show');

// Route for the search page
Route::get('/search', [BusController::class, 'search'])->name('search');

// Route to handle the search form submission and display the results
Route::get('/search-route', [BusController::class, 'searchRoute'])->name('search.route');

// Route for the services page
Route::get('/services', function () {
    return view('services');
})->name('services');

// Route for the contact page
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Authentication routes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', function() {
    Auth::logout();
    return redirect()->route('welcome');
})->name('logout');
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

// Route for the user home
Route::get('user/home', function () {
    return view('user.home');
})->name('user.home');

// Admin dashboard routes
Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

Route::get('/admin/olap-dashboard', [AdminController::class, 'olapDashboard'])->name('admin.olap-dashboard');

Route::prefix('fact-pendapatan')->group(function () {
    Route::get('/', [FactPendapatanController::class, 'index']);
    Route::get('/group/{column}', [FactPendapatanController::class, 'groupBy']);
    Route::get('/filter', [FactPendapatanController::class, 'filter']);
});

Route::prefix('fact-pelanggan')->group(function () {
    Route::get('/', [FactPelangganController::class, 'index']);
    Route::get('/group/{column}', [FactPelangganController::class, 'groupBy']);
    Route::get('/filter', [FactPelangganController::class, 'filter']);
});

Route::prefix('fact-logistics')->group(function () {
    Route::get('/', [FactLogisticsController::class, 'index']);
    Route::get('/group/{column}', [FactLogisticsController::class, 'groupBy']);
    Route::get('/filter', [FactLogisticsController::class, 'filter']);
});

// News CRUD routes under the 'admin' prefix
Route::prefix('admin')->group(function () {
    Route::get('news', [NewsController::class, 'index'])->name('admin.news.index');
    Route::get('news/create', [NewsController::class, 'create'])->name('admin.news.create');
    Route::post('news', [NewsController::class, 'store'])->name('admin.news.store');
    Route::get('news/{id}/edit', [NewsController::class, 'edit'])->name('admin.news.edit');
    Route::put('news/{id}', [NewsController::class, 'update'])->name('admin.news.update');
    Route::delete('news/{id}', [NewsController::class, 'destroy'])->name('admin.news.destroy');
});

// Bus CRUD routes under the 'admin' prefix
Route::prefix('admin')->group(function () {
    Route::get('buses', [BusAdminController::class, 'index'])->name('admin.buses.index');
    Route::get('buses/create', [BusAdminController::class, 'create'])->name('admin.buses.create');
    Route::post('buses', [BusAdminController::class, 'store'])->name('admin.buses.store');
    Route::get('buses/{id}/edit', [BusAdminController::class, 'edit'])->name('admin.buses.edit');
    Route::put('buses/{id}', [BusAdminController::class, 'update'])->name('admin.buses.update');
    Route::delete('buses/{id}', [BusAdminController::class, 'destroy'])->name('admin.buses.destroy');
});

// Schedule CRUD routes under the 'admin' prefix
Route::prefix('admin')->group(function () {
    Route::get('schedules', [ScheduleController::class, 'index'])->name('admin.schedules.index');
    Route::get('schedules/create', [ScheduleController::class, 'create'])->name('admin.schedules.create');
    Route::post('schedules', [ScheduleController::class, 'store'])->name('admin.schedules.store');
    Route::get('schedules/{id}/edit', [ScheduleController::class, 'edit'])->name('admin.schedules.edit');
    Route::put('schedules/{id}', [ScheduleController::class, 'update'])->name('admin.schedules.update');
    Route::delete('schedules/{id}', [ScheduleController::class, 'destroy'])->name('admin.schedules.destroy');
});

// Route for transaction confirmation page
Route::get('/transaction/confirm', [BusController::class, 'showTransactionConfirmation'])->name('transaction.confirm');

// Route to handle transaction storing
Route::post('/transaction/store', [BusController::class, 'storeTransaction'])->name('store.transaction');

// Route for bus details page
Route::get('/bus/details/{routeId}/{scheduleId}', [BusController::class, 'showBusDetails'])->name('bus.details');

// Route for bus detail page (specific route and schedule)
Route::get('/bus/{routeId}/{scheduleId}', [BusController::class, 'showDetails'])->name('bus.details');
