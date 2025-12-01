<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KosSearchController;
use App\Http\Controllers\KosController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PemilikController;

// ===== ROOT =====
Route::get('/', function () {
    return view('welcome');
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
    // PEMILIK LANDING
    Route::get('/pemilik', function () {
        return view('pemilik.landing');
    })->middleware('role:pemilik');
    // PEMILIK PROFILE
    Route::get('/pemilik/profile', [AuthController::class, 'profilePemilik'])
        ->name('pemilik.profile');

    // PEMILIK KOS TAMBAH VIEW
    Route::get('/pemilik/kos/tambah', function () {
        return view('pemilik.tambah-kos');
    })->name('pemilik.kos.tambah');
    // Halaman form tambah kos
    Route::get('/pemilik/kos/tambah', [PemilikController::class, 'create'])->name('pemilik.kos.create');
    // Proses tambah kos
    Route::post('/pemilik/kos/store', [PemilikController::class, 'store'])->name('pemilik.kos.store');

    // PEMILIK KOS BUAT, EDIT, DELETE, UPDATE
    Route::get('/kos/create', [KosController::class, 'create'])->name('kos.create');
    Route::post('/kos', [KosController::class, 'store'])->name('kos.store');
    Route::delete('/kos/{kos}', [KosController::class, 'destroy'])->name('kos.destroy');
    Route::put('/kos/{kos}', [KosController::class, 'update'])->name('kos.update');

    // PEMILIK KOS SEARCH
    Route::get('/search', [KosController::class, 'search'])->name('kos.search');
    // PEMILIK KOS FILTER
    Route::get('/search', [KosSearchController::class, 'search'])->name('search.kos');
    Route::get('/search/filter', [KosSearchController::class, 'filter'])->name('filter.kos');

    // LOGOUT
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/'); // arahkan ke landing page
    })->name('logout');
});

// ======================
// ROLE: PENCARI
// ======================
Route::middleware(['auth', 'role:pencari'])->group(function () {
    // PENCARI LANDING
    Route::get('/pencari', function () {
        return view('pencari.landing');
    })->middleware('role:pencari');
    // PENCARI KOST DETAIL
    Route::get('/pencari/kost/{id}', function ($id) {
        return view('pencari.detail_kost', ['id' => $id]);
    })->name('pencari.detail_kost');
    });
    // PENCARI KOST LIST
    Route::get('/kost', function () {
        return view('pencari.landing');
    });
    // PENCARI PROFILE
    Route::get('/pencari/profile', [AuthController::class, 'profilePencari'])
        ->name('pencari.profile');
    // LOGOUT
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/'); // arahkan ke landing page
    })->name('logout');

    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::post('/favorites/{id}', [FavoriteController::class, 'store'])->name('favorites.store');
    Route::delete('/favorites/{id}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');

// ======================
// ROLE: ADMIN
// ======================
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Redirect otomatis /admin -> /dashboard/admin
    Route::get('/admin', function () {
        return redirect()->route('dashboard.admin');
    });
    // Dashboard Admin
    Route::get('/dashboard/admin', [AdminController::class, 'index'])->name('dashboard.admin');
    // Data Pengguna
    Route::get('/dashboard/pengguna', [AdminController::class, 'pengguna'])->name('dashboard.pengguna');
    // Data Kost
    Route::get('/dashboard/kost', [AdminController::class, 'kost'])->name('dashboard.kost');
    // Data Laporan
    Route::get('/dashboard/laporan', [AdminController::class, 'laporan'])->name('dashboard.laporan');
    // Data Aktivitas
    Route::get('/dashboard/aktivitas', [AdminController::class, 'aktivitas'])->name('dashboard.aktivitas');
    // Pengaturan Admin
    Route::get('/dashboard/pengaturan', [AdminController::class, 'pengaturan'])->name('dashboard.pengaturan');
    // Logout
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');
});
