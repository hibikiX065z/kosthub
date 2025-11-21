<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KosSearchController;
use App\Http\Controllers\KostController;
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
    Route::get('/pemilik', function () {
            return view('pemilik.landing');
        })->middleware('role:pemilik');
    Route::get('/pemilik/profile', [AuthController::class, 'profilePemilik'])
        ->name('pemilik.profile');
    Route::post('/logout', function() {
            Auth::logout();
            return redirect('/'); // arahkan ke landing page
            })->name('logout');

    Route::get('/kos/create', [KosController::class, 'create'])->name('kos.create');
    Route::post('/kos', [KosController::class, 'store'])->name('kos.store');
    Route::delete('/kos/{kos}', [KosController::class, 'destroy'])->name('kos.destroy');
    // UPDATE KOS
Route::put('/kos/{kos}', [KostController::class, 'update'])->name('kos.update');
});

// ======================
// ROLE: PENCARI
// ======================
Route::middleware(['auth', 'role:pencari'])->group(function () {
    Route::get('/pencari', function () {
        return view('pencari.kost');
        })->middleware('role:pencari');
    Route::get('/pencari/profile', [AuthController::class, 'profilePencari'])
        ->name('pencari.profile');
    Route::post('/logout', function() {
            Auth::logout();
            return redirect('/'); // arahkan ke landing page
            })->name('logout');
        
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::post('/favorites/{id}', [FavoriteController::class, 'store'])->name('favorites.store');
    Route::delete('/favorites/{id}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');
    Route::post('/logout', function() {
            Auth::logout();
            return redirect('/'); // arahkan ke landing page
            })->name('logout');
});

// ======================
// ROLE: ADMIN
// ======================
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard/admin', [AdminController::class, 'index'])->name('dashboard.admin');
     Route::post('/logout', function() {
            Auth::logout();
            return redirect('/'); // arahkan ke landing page
            })->name('logout');
});

Route::get('/search', [KosController::class, 'search'])->name('kos.search');

Route::get('/search', [KosSearchController::class, 'search'])->name('search.kos');
Route::get('/search/filter', [KosSearchController::class, 'filter'])->name('filter.kos');


// Halaman form tambah kos
Route::get('/pemilik/kos/tambah', [PemilikController::class, 'create'])->name('pemilik.kos.create');

// Proses tambah kos
Route::post('/pemilik/kos/store', [PemilikController::class, 'store'])->name('pemilik.kos.store');


Route::get('/pemilik/kos/tambah', function () {
    return view('pemilik.tambah-kos');
})->name('pemilik.kos.tambah');

Route::post('/pemilik/kos/store', [PemilikController::class, 'store'])->name('pemilik.kos.store');

Route::get('/search/filter', [KosSearchController::class, 'filter'])->name('filter.kos');