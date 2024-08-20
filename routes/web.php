<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\FotoPembayaranController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PenghargaanController;
use App\Http\Controllers\PerumahanController;
use App\Http\Controllers\RumahController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('client.home');
});

Route::get('/detail', function () {
    return view('client.detail');
});

Route::resource('/dashboard', DashboardController::class);
Route::put('/dashboard/{section}', [DashboardController::class, 'update'])->name('update.section');

Route::resource('/master-fasilitas', FasilitasController::class);

Route::resource('/master-foto-pembayaran', FotoPembayaranController::class);

Route::resource('/master-penghargaan', PenghargaanController::class);

Route::resource('/master-perumahan', PerumahanController::class);

Route::resource('/master-rumah', RumahController::class);

Route::resource('/message', MessageController::class);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');

Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::resource('/master-user', UserController::class);
