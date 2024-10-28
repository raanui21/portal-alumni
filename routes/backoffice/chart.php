<?php

use App\Http\Controllers\BackOffice\ChartController;
use App\Http\Middleware\AdminAuthMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware([AdminAuthMiddleware::class])->group(function () {

    Route::resource('chart', ChartController::class);
    
});
