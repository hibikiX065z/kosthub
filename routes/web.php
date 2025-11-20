<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KosController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AdminController;

// ===== ROOT =====
Route::get('/', function () {
    return view('pencari.landing');
});

Route::get('/kost', function () {
    return view('pencari.kost');
});



// ======================
// AUTH ROUTES
// ======================
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// ======================
// REGISTER (tanpa middleware auth!)
// ======================
Route::get('/register-pemilik', [AuthController::class, 'showRegisterPemilik'])->name('register.pemilik');
Route::post('/register-pemilik', [AuthController::class, 'registerPemilik'])->name('register.pemilik.post');

Route::get('/register-pencari', [AuthController::class, 'showRegisterPencari'])->name('register.pencari');
Route::post('/register-pencari', [AuthController::class, 'registerPencari'])->name('register.pencari.post');

// ======================
// ROLE: PEMILIK
// ======================
Route::middleware(['auth', 'role:pemilik'])->group(function () {
    Route::get('/kos/create', [KosController::class, 'create'])->name('kos.create');
    Route::post('/kos', [KosController::class, 'store'])->name('kos.store');
    Route::delete('/kos/{kos}', [KosController::class, 'destroy'])->name('kos.destroy');
});

// ======================
// ROLE: PENCARI
// ======================
Route::middleware(['auth', 'role:pencari'])->group(function () {
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::post('/favorites/{id}', [FavoriteController::class, 'store'])->name('favorites.store');
    Route::delete('/favorites/{id}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');
});

// ======================
// ROLE: ADMIN
// ======================

    Route::get('/dashboard/admin', [AdminController::class, 'index'])->name('dashboard.admin');


  