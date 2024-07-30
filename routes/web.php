<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TracerStudyController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\UntirtaKarirController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backoffice\TracerStudyController as BackofficeTracerStudyController;
use App\Http\Controllers\backoffice\ArtikelBackofficeController;
use App\Http\Controllers\UntirtaKarirBackofficeController;

Route::get('/', function () {
    return view('/frontoffice/login.login');
});

Route::get('/frontoffice/login', [LoginController::class, 'index'])->name('login');
Route::post('/frontoffice/login', [LoginController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::get('/frontoffice/tracer-study', [TracerStudyController::class, 'index'])->name('tracer-study.index');
    Route::post('/frontoffice/tracer-study', [TracerStudyController::class, 'store'])->name('tracer-study.store');
    Route::get('/frontoffice/beranda', [BerandaController::class, 'index'])->name('frontoffice.beranda');
    Route::get('/frontoffice/artikel/{id}', [BerandaController::class, 'showArtikel'])->name('frontoffice.artikel.show'); // pastikan nama rute benar
    Route::get('/frontoffice/untirta-karir', [UntirtaKarirController::class, 'index'])->name('frontoffice.untirta-karir');
    Route::get('/untirta-karir/{id}', [UntirtaKarirController::class, 'show'])->name('frontoffice.untirta-karir.show');
    Route::post('/untirta-karir', [UntirtaKarirController::class, 'store'])->name('frontoffice.untirta-karir.store');
    Route::get('/frontoffice/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/frontoffice/statistic', [StatisticController::class, 'index']);
    Route::post('/frontoffice/logout', [LoginController::class, 'logout'])->name('logout');
});

// route untuk backoffice
Route::middleware(['auth', 'admin'])->prefix('backoffice')->group(function () {
    Route::get('tracer-study', [BackofficeTracerStudyController::class, 'index'])->name('backoffice.tracer-study.index');
    Route::get('tracer-study/data', [BackofficeTracerStudyController::class, 'data'])->name('backoffice.tracer-study.data');
});


// // route untuk backoffice
// Route::prefix('backoffice')->middleware(['auth'])->group(function () {
//     Route::prefix('users')->name('users.')->group(function () {
//         Route::get('/', [UserController::class, 'index'])->name('index');
//         Route::get('/create', [UserController::class, 'create'])->name('create');
//         Route::post('/', [UserController::class, 'store'])->name('store');
//         Route::get('/{user}', [UserController::class, 'show'])->name('show');
//         Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
//         Route::put('/{user}', [UserController::class, 'update'])->name('update');
//         Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
//     });

//     Route::prefix('tracer-study')->name('tracer-study-backoffice.')->group(function () {
//         Route::get('/', [TracerStudyBackOfficeController::class, 'index'])->name('index');
//         Route::get('/create', [TracerStudyBackOfficeController::class, 'create'])->name('create');
//         Route::post('/', [TracerStudyBackOfficeController::class, 'store'])->name('store');
//         Route::get('/{tracerStudy}', [TracerStudyBackOfficeController::class, 'show'])->name('show');
//         Route::get('/{tracerStudy}/edit', [TracerStudyBackOfficeController::class, 'edit'])->name('edit');
//         Route::put('/{tracerStudy}', [TracerStudyBackOfficeController::class, 'update'])->name('update');
//         Route::delete('/{tracerStudy}', [TracerStudyBackOfficeController::class, 'destroy'])->name('destroy');
//     });

//     Route::prefix('untirta-karir')->name('untirta-karir.')->group(function () {
//         Route::get('/', [UntirtaKarirBackofficeController::class, 'index'])->name('index');
//         Route::get('/create', [UntirtaKarirBackofficeController::class, 'create'])->name('create');
//         Route::post('/', [UntirtaKarirBackofficeController::class, 'store'])->name('store');
//         Route::get('/{job}', [UntirtaKarirBackofficeController::class, 'show'])->name('show');
//         Route::get('/{job}/edit', [UntirtaKarirBackofficeController::class, 'edit'])->name('edit');
//         Route::put('/{job}', [UntirtaKarirBackofficeController::class, 'update'])->name('update');
//         Route::delete('/{job}', [UntirtaKarirBackofficeController::class, 'destroy'])->name('destroy');
//     });

//     Route::prefix('artikel')->name('artikel.')->group(function () {
//         Route::get('/', [ArtikelBackofficeController::class, 'index'])->name('index');
//         Route::get('/create', [ArtikelBackofficeController::class, 'create'])->name('create');
//         Route::post('/', [ArtikelBackofficeController::class, 'store'])->name('store');
//         Route::get('/{artikel}', [ArtikelBackofficeController::class, 'show'])->name('show');
//         Route::get('/{artikel}/edit', [ArtikelBackofficeController::class, 'edit'])->name('edit');
//         Route::put('/{artikel}', [ArtikelBackofficeController::class, 'update'])->name('update');
//         Route::delete('/{artikel}', [ArtikelBackofficeController::class, 'destroy'])->name('destroy');
//     });
// });
