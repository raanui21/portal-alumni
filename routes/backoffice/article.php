<?php

use App\Http\Controllers\BackOffice\ArticleController;
use App\Http\Middleware\AdminAuthMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware([AdminAuthMiddleware::class])->group(function () {

Route::resource('article', ArticleController::class);

});