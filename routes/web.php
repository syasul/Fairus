<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('client.home');
});

Route::get('/detail', function () {
    return view('client.detail');
});

Route::get('/login-admin', function () {
    return view('admin.login');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/Master-Fasilitas', function () {
    return view('admin.masterFasilitas');
});

Route::get('/Master-Foto-Pembayaran', function () {
    return view('admin.masterFotoPembayaran');
});

Route::get('/Master-Penghargaan', function () {
    return view('admin.masterPenghargaan');
});

Route::get('/Master-Perumahan', function () {
    return view('admin.masterPerumahan');
});

Route::get('/Master-Rumah', function () {
    return view('admin.masterRumah');
});

Route::resource('/master-user', UserController::class);

Route::get('/pesan', function () {
    return view('admin.Pesan');
});
