<?php
use App\Http\Controllers\BackOffice\EditorController;
use Illuminate\Support\Facades\Route;

Route::post('ckeditor/upload', [EditorController::class, 'upload'])->name('ckeditor.upload');
