<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ConditionController;
use App\Http\Controllers\NotificationController;

Route::prefix('')->name('web.')->group(function () {
    Route::get('', [MainController::class, 'index'])->name('home');
    Route::prefix('auth')->name('auth.')->group(function () {
        Route::get('', [AuthController::class, 'index'])->name('index');
        Route::post('login', [AuthController::class, 'do_login'])->name('login');
        Route::post('register', [AuthController::class, 'do_register'])->name('register');
    });

    Route::get('dashboard', [MainController::class, 'dashboard'])->name('dashboard');
    Route::get('profile/history', [MainController::class, 'history'])->name('profile.history');
    Route::get('informasi-pendaftaran', [MainController::class, 'informasi'])->name('informasi-pendaftaran');
    Route::get('profile/visi-misi', [MainController::class, 'visi_misi'])->name('profile.visi-misi');
    Route::resource('news', NewsController::class);
    Route::resource('register', RegisterController::class);
    Route::get('register/{register}/confirm', [RegisterController::class, 'confirm'])->name('register.confirm');
    Route::patch('register/{register}/confirm', [RegisterController::class, 'do_confirm'])->name('register.do_confirm');
    Route::get('register/{register}/process', [RegisterController::class, 'process'])->name('register.process');
    Route::patch('register/{register}/process', [RegisterController::class, 'do_process'])->name('register.do_process');
    Route::post('register/denied/{register}', [RegisterController::class, 'denied'])->name('register.denied');
    Route::post('register/finish/{register}', [RegisterController::class, 'finish'])->name('register.finish');
    Route::resource('condition', ConditionController::class);
    Route::get('auth/logout', [AuthController::class, 'do_logout'])->name('auth.logout');
    // NOTIFICATION
    Route::get('counter', [NotificationController::class, 'counter'])->name('counter_notif');
    Route::get('notification', [NotificationController::class, 'index'])->name('notification.index');
});
