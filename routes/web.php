<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MotorcycleController;
use App\Http\Controllers\TestRideController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MotorcycleController as AdminMotorcycleController;
use App\Http\Controllers\Admin\TestRideRequestController as AdminTestRideRequestController;
use App\Http\Controllers\Admin\BrandController as AdminBrandController;

// ── Publieke pagina's ────────────────────────────────────────────────────────
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/soorten', [PageController::class, 'soorten'])->name('soorten');
Route::get('/merken', [PageController::class, 'merken'])->name('merken');
Route::get('/onderhoud', [PageController::class, 'onderhoud'])->name('onderhoud');

// ── Motorcatalogus (publiek) ─────────────────────────────────────────────────
Route::get('/motors', [MotorcycleController::class, 'index'])->name('motors.index');
Route::get('/motors/{motorcycle}', [MotorcycleController::class, 'show'])->name('motors.show');

// ── Auth ────────────────────────────────────────────────────────────────────
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});

Route::post('/logout', [LoginController::class, 'destroy'])->name('logout')->middleware('auth');

// ── Ingelogde gebruiker ──────────────────────────────────────────────────────
Route::middleware('auth')->group(function () {
    Route::post('/motors/{motorcycle}/testrit', [TestRideController::class, 'store'])->name('testrides.store');
    Route::get('/mijn-aanvragen', [TestRideController::class, 'index'])->name('testrides.index');
});

// ── Admin ────────────────────────────────────────────────────────────────────
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('motorcycles', AdminMotorcycleController::class)->except(['show']);
    Route::resource('brands', AdminBrandController::class)->except(['show']);

    Route::get('testrit-aanvragen', [AdminTestRideRequestController::class, 'index'])->name('testrequests.index');
    Route::patch('testrit-aanvragen/{testRideRequest}', [AdminTestRideRequestController::class, 'update'])->name('testrequests.update');
});
