<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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
Route::middleware(['auth', 'role:pemilik'])
    ->prefix('pemilik')
    ->name('pemilik.')
    ->group(function () {

        // Landing
        Route::get('/', fn() => view('pemilik.landing'))->name('landing');

        // Profile
        Route::get('/profile', [AuthController::class, 'profilePemilik'])->name('profile');

        // CRUD Kos
        Route::prefix('kos')->name('kos.')->group(function () {

            Route::get('/', [KosController::class, 'index'])->name('index');
            Route::get('/create', [KosController::class, 'create'])->name('create');
            Route::post('/store', [KosController::class, 'store'])->name('store');

            Route::get('/{id}/edit', [KosController::class, 'edit'])->name('edit');
            Route::put('/{id}', [KosController::class, 'update'])->name('update');
            Route::delete('/{id}', [KosController::class, 'destroy'])->name('destroy');
        });

        // Search khusus pemilik
        Route::get('/kos/search', [KosSearchController::class, 'guestIndex'])->name('kos.search');
    });


// ======================
// ROLE: PENCARI
// ======================
Route::middleware(['auth', 'role:pencari'])
    ->prefix('pencari')
    ->name('pencari.')
    ->group(function () {

        Route::get('/', fn() => view('pencari.landing'))->name('landing');

        Route::get('/profile', [AuthController::class, 'profilePencari'])->name('profile');

        // Kos
        Route::prefix('kos')->name('kos.')->group(function () {
            Route::get('/', [KosController::class, 'pencariIndex'])->name('index');
            Route::get('/detail/{id}', [KosController::class, 'show'])->name('show');
            Route::post('/favorites/{kos}', [FavoriteController::class, 'toggle'])->name('favorites.toggle');
            Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');

            // Search
            Route::get('/search', [KosSearchController::class, 'pencariIndex'])->name('search');
        });

    });


// ======================
// ROLE: ADMIN
// ======================
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


// ======================
// GUEST SEARCH
// ======================
Route::get('/search', [KosSearchController::class, 'guestIndex'])->name('guest.kos.search');
