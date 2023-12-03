<?php

use App\Http\Controllers\Admin\AlternatifController;
use App\Http\Controllers\Admin\AlternatifKriteriaController;
use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HasilController;
use App\Http\Controllers\Admin\KriteriaController;
use App\Http\Controllers\Admin\MatrikPerbandinganKriteriaController;
use App\Http\Controllers\Admin\MatrikPerbandinganSubKriteriaController;
use App\Http\Controllers\Admin\NilaiController;
use App\Http\Controllers\Admin\PengaturanController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SubKriteriaController;
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
Route::resource('sub-kriteria', SubKriteriaController::class)->except('show');
Route::get('/sub-kriteria/getByKriteria', [SubKriteriaController::class, 'getByKriteriaId'])->name('sub-kriteria.getByKriteriaId');

// perbandingan kriteria
Route::get('/perbandingan-kriteria', [MatrikPerbandinganKriteriaController::class, 'index'])->name('perbandingan-kriteria.index');
Route::post('/perbandingan-kriteria', [MatrikPerbandinganKriteriaController::class, 'hitung'])->name('perbandingan-kriteria.hitung');
Route::get('/normalisasi-kriteria', [MatrikPerbandinganKriteriaController::class, 'normalisasi'])->name('normalisasi-kriteria');


// perbandingan sub kriteria
Route::get('/perbandingan-sub-kriteria', [MatrikPerbandinganSubKriteriaController::class, 'index'])->name('perbandingan-sub-kriteria.index');
Route::get('/perbandingan-sub-kriteria/{uuid}/detail', [MatrikPerbandinganSubKriteriaController::class, 'detail'])->name('perbandingan-sub-kriteria.detail');
Route::post('/perbandingan-sub-kriteria/{kriteria_uuid}', [MatrikPerbandinganSubKriteriaController::class, 'hitung'])->name('perbandingan-sub-kriteria.hitung');
Route::get('/normalisasi-sub-kriteria/{uuid}', [MatrikPerbandinganSubKriteriaController::class, 'normalisasi'])->name('normalisasi-sub-kriteria');

Route::get('alternatif-kriteria', [AlternatifKriteriaController::class, 'index'])->name('alternatif-kriteria.index');

Route::get('alternatif-kriteria/create', [AlternatifKriteriaController::class, 'create'])->name('alternatif-kriteria.create');
Route::post('alternatif-kriteria/create', [AlternatifKriteriaController::class, 'store'])->name('alternatif-kriteria.store');

Route::get('alternatif-kriteria/{alternatif_uuid}/edit', [AlternatifKriteriaController::class, 'edit'])->name('alternatif-kriteria.edit');
Route::patch('alternatif-kriteria/{alternatif_uuid}/edit', [AlternatifKriteriaController::class, 'update'])->name('alternatif-kriteria.update');

Route::get('hasil', [HasilController::class, 'index'])->name('hasil.index');
Route::get('hasil-pdf', [HasilController::class, 'export'])->name('hasil.export');
Route::get('pengaturan', [PengaturanController::class, 'index'])->name('pengaturan.index');
Route::post('pengaturan', [PengaturanController::class, 'update'])->name('pengaturan.update');

Route::get('/alternatif-json', [AlternatifController::class, 'getJson'])->name('alternatif.getJson');
Route::get('/kriteria-json', [KriteriaController::class, 'getJson'])->name('kriteria.getJson');
