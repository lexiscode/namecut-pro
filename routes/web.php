<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\ClientFormController;
use App\Http\Controllers\Backend\AdminPasswordResetController;
use App\Http\Controllers\Frontend\VerificationController;
use App\Http\Controllers\Frontend\ChangePasswordController;
use App\Http\Controllers\Frontend\ForgotPasswordController;


Route::get('/', [HomeController::class, '__invoke'])->name('home');
Route::get('change-password', [ChangePasswordController::class, 'index'])->name('change-password');
Route::get('client-form', [ClientFormController::class, 'index'])->name('client-form');
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::get('forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot-password');
Route::get('verification', [VerificationController::class, 'index'])->name('verification');


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){

    Route::get('login', [AdminController::class, 'index'])->name('login.index');
    Route::post('login', [AdminController::class, 'login'])->name('login');

    // Forgot/Reset password
    Route::get('forgot-password', [AdminPasswordResetController::class, 'create'])->name('forgot-password');
    Route::post('forgot-password', [AdminPasswordResetController::class, 'sendResetLink'])->name('forgot-password.send');

    Route::get('reset-password/{token}', [AdminPasswordResetController::class, 'resetPassword'])->name('reset-password');
    Route::post('reset-password', [AdminPasswordResetController::class, 'handleResetPassword'])->name('reset-password.send');
});
