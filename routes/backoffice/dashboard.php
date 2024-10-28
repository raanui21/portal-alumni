<?php

use App\Http\Controllers\BackOffice\DashboardController;
use App\Http\Middleware\AdminAuthMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware([AdminAuthMiddleware::class])->group(function () {
    Route::resource('dashboard', DashboardController::class);
});
