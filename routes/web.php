<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::middleware(['authMiddleware'])->group(function () {
    Route::get('/', [HomeController::class, 'homeView'])->name('home');

    Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');

    //profile
    Route::get('profile/{id}', [ProfileController::class, 'view'])->name('profile.view');
    Route::get('profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('profile/{id}/update', [ProfileController::class, 'update'])->name('profile.update');

});

Route::middleware(['guest'])->group(function () {
    Route::get('login', [AuthController::class, 'loginView'])->name('login.view');
    Route::post('login', [AuthController::class, 'login'])->name('login.auth');
    Route::get('register', [AuthController::class, 'registerView'])->name(name: 'register.view');
    Route::post('register', [AuthController::class, 'register'])->name('register.store');
});

