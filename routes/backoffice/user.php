<?php


use App\Http\Controllers\BackOffice\UserController;
use App\Http\Middleware\AdminAuthMiddleware;
use Illuminate\Support\Facades\Route;

Route::post('/user/login', [UserController::class, 'login'])->name('user.login');

Route::get('/user', [UserController::class, 'current'])->name('user.current');
Route::delete('/user/logout', [UserController::class, 'logout'])->name('user.logout');

Route::middleware([AdminAuthMiddleware::class])->group(function () {


    
});
