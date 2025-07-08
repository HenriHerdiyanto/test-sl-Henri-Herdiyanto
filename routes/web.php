<?php

use App\Http\Controllers\DivisiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'role:superadmin'])->group(function () {
    // Dashboard superadmin
    Route::get('/dashboard/superadmin', [HomeController::class, 'superadminHome'])->name('superadmin.home');
    Route::post('/AddPegawai', [UserController::class, 'AddPegawai'])->name('AddPegawai');
    Route::put('/pegawai/update/{id}', [UserController::class, 'updatePegawai'])->name('UpdatePegawai');
    Route::delete('/pegawai/delete/{id}', [UserController::class, 'destroy'])->name('DeletePegawai');

    // divisi
    Route::get('/divisi', [DivisiController::class, 'index'])->name('divisi.index');
    Route::post('/divisi', [DivisiController::class, 'store'])->name('divisi.store');
    Route::put('/divisi/{id}', [DivisiController::class, 'update'])->name('divisi.update');
    Route::delete('/divisi/{id}', [DivisiController::class, 'destroy'])->name('divisi.destroy');
});

Route::middleware(['auth', 'role:manager'])->group(function () {
    // Dashboard manager
    Route::get('/dashboard/manager', [HomeController::class, 'managerHome'])->name('manager.home');
    Route::post('/AddPegawai', [UserController::class, 'AddPegawai'])->name('AddPegawai');
    Route::put('/pegawai/update/{id}', [UserController::class, 'updatePegawai'])->name('UpdatePegawai');
    Route::delete('/pegawai/delete/{id}', [UserController::class, 'destroy'])->name('DeletePegawai');
});

Route::middleware(['auth', 'role:staff'])->group(function () {
    // Dashboard Staff
    Route::get('/dashboard/staff', [HomeController::class, 'staffHome'])->name('staff.home');
    // update Data
    Route::put('/staff/update', [UserController::class, 'update'])->name('staff.update');
});
