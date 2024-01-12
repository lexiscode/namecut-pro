<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\RegisterController;
use App\Http\Controllers\Frontend\Auth\LoginController;
use App\Http\Controllers\Frontend\ClientFormController;
use App\Http\Controllers\Frontend\VerificationController;
use App\Http\Controllers\Frontend\ChangePasswordController;
use App\Http\Controllers\Frontend\ForgotPasswordController;
use App\Http\Controllers\Backend\AdminPasswordResetController;
use App\Http\Controllers\Frontend\Auth\PasswordResetController;


Route::get('/', [HomeController::class, '__invoke'])->name('home');
Route::get('verification', [VerificationController::class, 'index'])->name('verification');


Route::get('client-form', [ClientFormController::class, 'index'])->name('client-form.index');
Route::post('client-form', [ClientFormController::class, 'store'])->name('client-form');

Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('contact', [ContactController::class, 'store'])->name('contact');


// WEBPAGE AUTHENTICATION ROUTES for users
Route::get('register', [RegisterController::class, 'index'])->name('register.index');
Route::post('register', [RegisterController::class, 'store'])->name('register');

Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('forgot-password', [PasswordResetController::class, 'index'])->name('forgot-password');
Route::post('forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('forgot-password.send');

Route::get('reset-password/{token}', [PasswordResetController::class, 'resetPassword'])->name('reset-password');
Route::post('reset-password', [PasswordResetController::class, 'handleResetPassword'])->name('reset-password.send');


// These are routes that has some ties with the admin but are in the frontend page
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){

    Route::get('login', [AdminController::class, 'index'])->name('login.index');
    Route::post('login', [AdminController::class, 'login'])->name('login');

    // Forgot/Reset password
    Route::get('forgot-password', [AdminPasswordResetController::class, 'create'])->name('forgot-password');
    Route::post('forgot-password', [AdminPasswordResetController::class, 'sendResetLink'])->name('forgot-password.send');

    Route::get('reset-password/{token}', [AdminPasswordResetController::class, 'resetPassword'])->name('reset-password');
    Route::post('reset-password', [AdminPasswordResetController::class, 'handleResetPassword'])->name('reset-password.send');

});
