<?php

use App\Http\Controllers\Admin\AlternatifController;
use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KriteriaController;
use App\Http\Controllers\Admin\NilaiController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/change-password', [ChangePasswordController::class, 'index'])->name('change-password.index');
Route::post('/change-password', [ChangePasswordController::class, 'update'])->name('change-password.update');

Route::resource('users', UserController::class)->except('show');
Route::resource('kriteria', KriteriaController::class)->except('show');
Route::resource('alternatif', AlternatifController::class)->except('show');
Route::resource('nilai', NilaiController::class)->except('show');
