<?php

use App\Http\Controllers\FrontOffice\CareerController;
use App\Http\Controllers\FrontOffice\HomeController;
use App\Http\Controllers\FrontOffice\ProfileController;
use App\Http\Controllers\FrontOffice\StatisticController;
use App\Http\Controllers\FrontOffice\TracerStudyController;
use App\Http\Controllers\BackOffice\ArticleController as BackOfficeArticleController;
use App\Http\Controllers\Web\ArticleController;
use App\Http\Controllers\Web\ChartController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\EditorController;
use App\Http\Controllers\Web\JobSearchController;
use App\Http\Controllers\Web\UserController;
use App\Http\Middleware\AdminAuthMiddleware;
use App\Http\Middleware\ApiAuthMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/dashboard');
    }
    return view('frontoffice.login.login');
});

Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/career', [CareerController::class, 'index'])->name('career.index');
Route::get('/career/{id}', [CareerController::class, 'show'])->name('frontoffice.career.show');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/statistic', [StatisticController::class, 'index'])->name('statistic.index');
Route::get('/tracer-study', [TracerStudyController::class, 'index'])->name('tracer-study.index');
Route::post('/tracer-study', [TracerStudyController::class, 'create'])->name('tracer-study.create');
Route::get('/article/{id}', [BackOfficeArticleController::class, 'show'])->name('frontoffice.article.show');

require __DIR__ . '/backoffice/article.php';
require __DIR__ . '/backoffice/jobs.php';
require __DIR__ . '/backoffice/chart.php';
require __DIR__ . '/backoffice/editor.php';
require __DIR__ . '/backoffice/user.php';
require __DIR__ . '/backoffice/dashboard.php';