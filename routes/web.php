<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KosSearchController;
use App\Http\Controllers\KosController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PemilikController;

// ======================
// ROOT
// ======================
Route::get('/', function () {
    return view('welcome');
});

// ======================
// AUTH ROUTES
// ======================
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// ======================
// REGISTER
// ======================
Route::prefix('register')->group(function () {
    Route::get('/pemilik', [AuthController::class, 'showRegisterPemilik'])->name('register.pemilik');
    Route::post('/pemilik', [AuthController::class, 'registerPemilik'])->name('register.pemilik.post');

    Route::get('/pencari', [AuthController::class, 'showRegisterPencari'])->name('register.pencari');
    Route::post('/pencari', [AuthController::class, 'registerPencari'])->name('register.pencari.post');
});


// ======================
// ROLE: PEMILIK
// ======================
Route::middleware(['auth', 'role:pemilik'])->group(function () {

    Route::get('/pemilik', function () {
        return view('pemilik.landing');
    })->name('pemilik.landing');

    Route::get('/pemilik/edit-kos', function () {
        return view('pemilik.edit-kos');
    })->name('pemilik.edit-kos');

    Route::get('/pemilik/profile', [AuthController::class, 'profilePemilik'])
        ->name('pemilik.profile');

    // =======================
    // MANAGE DATA KOS (PEMILIK)
    // =======================
    
    // List kos milik pemilik
    Route::get('/pemilik/kos', [PemilikController::class, 'index'])->name('pemilik.kost');

    // Form tambah kos
    Route::get('/pemilik/kos/tambah', [PemilikController::class, 'create'])->name('pemilik.tambah-kos');

    // Submit tambah kos
    Route::post('/pemilik/kos/store', [PemilikController::class, 'store'])->name('pemilik.kos.store');

    // Edit kos
    Route::get('/pemilik/kos/{id}/edit', [PemilikController::class, 'edit'])->name('pemilik.kos.edit');

    // Update kos
    Route::put('/pemilik/kos/{id}', [PemilikController::class, 'update'])->name('pemilik.kos.update');

    // Hapus kos
    Route::delete('/pemilik/kos/{id}', [PemilikController::class, 'destroy'])->name('pemilik.kos.destroy');

});

    // PEMILIK KOS SEARCH
    Route::get('/search', [KosController::class, 'search'])->name('kos.search');
    // PEMILIK KOS FILTER
    Route::get('/search', [KosSearchController::class, 'search'])->name('search.kos');
    Route::get('/search/filter', [KosSearchController::class, 'filter'])->name('filter.kos');

    // PEMILIK ABOUT
    Route::get('/pemilik/about', function () {
        return view('pemilik.about');
    })->name('pemilik.about');

    // LOGOUT
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/'); // arahkan ke landing page
    })->name('logout');

// ======================
// ROLE: PENCARI
// ======================
Route::middleware(['auth', 'role:pencari'])->group(function () {
    // PENCARI LANDING
    Route::get('/pencari', function () {
        return view('pencari.landing');
    })->name('pencari.landing');
    // PENCARI DETAIL KOST
    Route::get('/pencari/detail_kost', function () {
        return view('pencari.detail_kost');
    })->name('pencari.detail_kost');
    // PENCARI KOST LIST
    Route::get('/kost', function () {
        return view('pencari.landing');
    })->name('pencari.kost');
    // PENCARI ABOUT
    Route::get('/pencari/about', function () {
        return view('pencari.about');
    })->name('pencari.about');
    // PENCARI FAVORIT
    Route::get('/pencari/favorit', function () {
        return view('pencari.favorit');
    })->name('pencari.favorit');
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
});

// ======================
// ROLE: ADMIN
// ======================
Route::middleware(['auth', 'role:admin'])->group(function () {

    // Dashboard utama
    Route::get('/admin', function () {
        return redirect()->route('dashboard.admin');
    });

    Route::get('/dashboard/admin', [AdminController::class, 'index'])->name('dashboard.admin');
    Route::get('/dashboard/pengguna', [AdminController::class, 'pengguna'])->name('dashboard.pengguna');
    Route::get('/dashboard/laporan', [AdminController::class, 'laporan'])->name('dashboard.laporan');
    Route::get('/dashboard/aktivitas', [AdminController::class, 'aktivitas'])->name('dashboard.aktivitas');
    Route::get('/dashboard/pengaturan', [AdminController::class, 'pengaturan'])->name('dashboard.pengaturan');

    // ======================
    // KOS MANAGEMENT (FULL)
    // ======================
    Route::get('/dashboard/kos', [AdminController::class, 'kost'])->name('dashboard.kost');

    // approve
    Route::post('/dashboard/kos/{id}/approve', [AdminController::class, 'approve'])->name('kos.approve');

    // reject
    Route::post('/dashboard/kos/{id}/reject', [AdminController::class, 'reject'])->name('kos.reject');

    // delete
    Route::delete('/dashboard/kos/{id}', [AdminController::class, 'destroy'])->name('kos.destroy');

    // Logout
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');
});
