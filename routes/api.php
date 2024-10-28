<?php

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\ChartController;
use App\Http\Controllers\Api\JobSearchController;
use App\Http\Controllers\Api\SurveyController;
use App\Http\Controllers\Api\UserController;
use App\Http\Middleware\ApiAuthMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post("/users", [UserController::class, "register"]);
Route::post("/users/login", [UserController::class, "login"]);

Route::get("/jobs", [JobSearchController::class, "getAllJobs"]);
Route::get("/articles", [ArticleController::class, "getAllArticles"]);
Route::get("/statistic", [ChartController::class, "index"]);

Route::middleware(ApiAuthMiddleware::class)->group(function () {
    Route::post("/survey", [SurveyController::class,"create"]);
    Route::get("/users/current", [UserController::class, "get"]);
    Route::patch("/survey", [SurveyController::class, "update"])->name('survey.answer');
    Route::patch("/users/current", [UserController::class,"update"]);
    Route::delete("/users/logout", [UserController::class,"logout"]);
});
