<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\FotoPembelianController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PenghargaanController;
use App\Http\Controllers\PerumahanController;
use App\Http\Controllers\RumahController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('/', HomeController::class);
Route::get('/detail/{id_perumahan}', [HomeController::class, 'show'])->name('detail');

// Route for showing the dashboard
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');

// Protect routes using middleware 'auth'
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::put('/dashboard/{section}', [DashboardController::class, 'update'])->name('update.section');
    Route::resource('/master-fasilitas', FasilitasController::class);
    Route::resource('/master-foto-pembelian', FotoPembelianController::class);
    Route::resource('/master-penghargaan', PenghargaanController::class);
    Route::resource('/master-perumahan', PerumahanController::class);
    Route::resource('/master-rumah', RumahController::class);
    Route::resource('/message', MessageController::class);
    Route::resource('/master-user', UserController::class);
});
