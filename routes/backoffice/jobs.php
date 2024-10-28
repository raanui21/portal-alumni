<?php


use App\Http\Controllers\BackOffice\JobSearchController;
use App\Http\Middleware\AdminAuthMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware([AdminAuthMiddleware::class])->group(function () {

    Route::resource('jobs', JobSearchController::class);
    
});
