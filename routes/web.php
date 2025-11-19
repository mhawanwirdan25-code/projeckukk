<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\MotivasiController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\PendidikanLanjutController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\UserController;


Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.home');
    Route::get('/login', [AuthController::class, 'index']);
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/dashboard', [AuthController::class, 'showDashboard'])->name('dashboard');
    Route::get('/profil', [AuthController::class, 'profil'])->name('profil');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    // Route::get('/', [AuthController::class, 'index'])->name('home');

    //Alumni
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

    // Halaman Pekerjaan
    Route::get('/pekerjaan', [PekerjaanController::class, 'index'])->name('pekerjaan.index');
    Route::get('/pekerjaan/create', [PekerjaanController::class, 'create'])->name('pekerjaan.create');
    Route::post('/pekerjaan', [PekerjaanController::class, 'store'])->name('pekerjaan.store');
    Route::get('/pekerjaan/{id}/edit', [PekerjaanController::class, 'edit'])->name('pekerjaan.edit');
    Route::get('/siswa/{id}', [SiswaController::class, 'show'])->name('siswa.show');
    Route::put('/pekerjaan/{id}', [PekerjaanController::class, 'update'])->name('pekerjaan.update');
    Route::delete('/pekerjaan/{id}', [PekerjaanController::class, 'destroy'])->name('pekerjaan.destroy');

    //pendidikan
    Route::get('/pendidikan', [PendidikanLanjutController::class, 'index'])->name('pendidikan.index');
    Route::get('/pendidikan/create', [PendidikanLanjutController::class, 'create'])->name('pendidikan.create');
    Route::post('/pendidikan', [PendidikanLanjutController::class, 'store'])->name('pendidikan.store');
    Route::get('/pendidikan/{id}', [PendidikanLanjutController::class, 'show'])->name('pendidikan.show');
    Route::get('/pendidikan/{id}/edit', [PendidikanLanjutController::class, 'edit'])->name('pendidikan.edit');
    Route::put('/pendidikan/{id}', [PendidikanLanjutController::class, 'update'])->name('pendidikan.update');
    Route::delete('/pendidikan/{id}', [PendidikanLanjutController::class, 'destroy'])->name('pendidikan.destroy');

    //  Halaman Motivasi
    Route::get('/motivasi', [MotivasiController::class, 'index'])->name('motivasi.index');
    Route::get('/motivasi/create', [MotivasiController::class, 'create'])->name('motivasi.create');
    Route::post('/motivasi', [MotivasiController::class, 'store'])->name('motivasi.store');
    Route::get('/motivasi/{id}/edit', [MotivasiController::class, 'edit'])->name('motivasi.edit');  
    Route::put('/motivasi/{id}', [MotivasiController::class, 'update'])->name('motivasi.update'); 
    Route::delete('/motivasi/{id}', [MotivasiController::class, 'destroy'])->name('motivasi.destroy');

    //prestasi
    Route::resource('prestasi', PrestasiController::class);

});

// Halaman utama alumni
Route::get('/', [UserController::class, 'home'])->name('user.home');
Route::get('/alumni', [UserController::class, 'alumni'])->name('user.alumni');
Route::get('/pendidikan', [UserController::class, 'pendidikan'])->name('user.pendidikan');
Route::get('/prestasi', [UserController::class, 'prestasi'])->name('user.prestasi');
Route::get('/motivasi', [UserController::class, 'motivasi'])->name('user.motivasi');
    Route::get('/login', [AuthController::class, 'index']);
    Route::post('/login', [AuthController::class, 'login'])->name('login');











// Route::get('/', function () {
//     return view('welcome');
// })->name('home');





