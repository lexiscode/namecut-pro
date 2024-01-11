<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\ClientFormController;
use App\Http\Controllers\Frontend\VerificationController;
use App\Http\Controllers\Frontend\ChangePasswordController;
use App\Http\Controllers\Frontend\ForgotPasswordController;


Route::get('/', [HomeController::class, '__invoke'])->name('home');
Route::get('change-password', [ChangePasswordController::class, 'index'])->name('change-password');
Route::get('client-form', [ClientFormController::class, 'index'])->name('client-form');
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::get('forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot-password');
Route::get('verification', [VerificationController::class, 'index'])->name('verification');
