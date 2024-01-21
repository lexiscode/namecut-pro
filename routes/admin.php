<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminsController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\PaymentController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\RoleUserController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ClientFormController;
use App\Http\Controllers\Backend\ClientProfileController;
use App\Http\Controllers\Backend\PublishReceiptController;


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware'=> ['admin']], function(){

    Route::post('logout', [AdminController::class, 'logout'])->name('logout');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Admin Profile routes
    Route::put('profile-password-update/{id}', [ProfileController::class, 'passwordUpdate'])->name('profile-password.update');
    Route::resource('profile', ProfileController::class);

    // This route is for the AdminsController
    Route::resource('admins', AdminsController::class);

    // Clients Profile routes
    Route::put('client-profile-password-update/{id}', [ClientProfileController::class, 'passwordUpdate'])->name('client-profile-password.update');
    Route::resource('client-profile', ClientProfileController::class);

    // This route is for the ClientFormController
    Route::resource('client-entry', ClientFormController::class);

    // This route is for the PaymentController
    Route::resource('payment', PaymentController::class);

    // This route is for the PublishReceiptController
    Route::resource('publish-receipt', PublishReceiptController::class);

    // This route is for the ContactController
    Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
    Route::get('contact/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');

    // Admin User Roles
    Route::resource('role-user', RoleUserController::class);

});

