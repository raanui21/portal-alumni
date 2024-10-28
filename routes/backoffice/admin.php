<?php

use App\Http\Controllers\BackOffice\ArticleController;
use App\Http\Controllers\BackOffice\ChartController;
use App\Http\Controllers\BackOffice\EditorController;
use App\Http\Controllers\BackOffice\JobSearchController;
use App\Http\Controllers\BackOffice\UserController;
use App\Http\Middleware\AdminAuthMiddleware;

use Illuminate\Support\Facades\Route;

Route::post('ckeditor/upload', [EditorController::class, 'upload'])->name('ckeditor.upload');

Route::post('/user/login', [UserController::class, 'login'])->name('user.login');

Route::middleware([AdminAuthMiddleware::class])->group(function () {
    Route::get('/user', [UserController::class, 'current'])->name('user.current');

    Route::delete('/user/logout', [UserController::class, 'logout'])->name('user.logout');

    Route::resource('article', ArticleController::class);

    Route::resource('jobs', JobSearchController::class);

    Route::resource('chart', ChartController::class);
});
