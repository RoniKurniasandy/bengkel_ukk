<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\MekanikDashboardController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Middleware\RoleMiddleware;

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ServisController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\SparepartController;
use App\Http\Controllers\Admin\TransaksiController;

use App\Http\Controllers\Mekanik\MekanikController;
use App\Http\Controllers\User\UserController as PelangganController;


Route::get('/', fn() => view('landing'));


// Guest (belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Dashboard redirect (otomatis sesuai role)
Route::middleware('auth')->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Admin-only routes
 Route::middleware('role:admin')->prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.admin');
        Route::get('/users', [UserController::class, 'index'])->name('admin.users');
        Route::get('/servis', [ServisController::class, 'index'])->name('admin.servis');
        Route::get('/booking', [BookingController::class, 'index'])->name('admin.booking');
        Route::get('/sparepart', [SparepartController::class, 'index'])->name('admin.sparepart');
        Route::get('/transaksi', [TransaksiController::class, 'index'])->name('admin.transaksi');
    });


// Mekanik-only routes
   Route::middleware('role:mekanik')->prefix('mekanik')->group(function () {
    Route::get('/dashboard', [MekanikDashboardController::class, 'index'])->name('dashboard.mekanik');
    Route::get('/servis-dikerjakan', [MekanikController::class, 'servisAktif'])->name('mekanik.servis.aktif');
    Route::get('/servis-selesai', [MekanikController::class, 'servisSelesai'])->name('mekanik.servis.selesai');
});

Route::middleware('role:pelanggan')->prefix('pelanggan')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard.user');
    Route::get('/servis', [PelangganController::class, 'servisSaya'])->name('user.servis');
    Route::get('/riwayat', [PelangganController::class, 'riwayatServis'])->name('user.riwayat');
});

