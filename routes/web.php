<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GoogleLoginController;
use App\Http\Controllers\forgetpasswordController;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('host')->group(function () {

    Route::get('/register', function () {
        return view('signup');
    })->name('signup');

    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    Route::get('/validate/{token}', [RegisterController::class, 'validateToken'])->name('validate.token');

    Route::get('/login', [RegisterController::class, 'showLoginForm'])->name('login');
    
    Route::post('login', [RegisterController::class, 'login'])->name('login.submit');

    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login.form');
    Route::post('login', [LoginController::class, 'login'])->name('login.submit');
    Route::get("login/google-callback", [GoogleLoginController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('login/google-redirect', [GoogleLoginController::class, 'handleGoogleCallback'])->name('login.google-callback');


   Route::get('forgetpassword', [forgetpasswordController::class, 'showForgetPassword'])->name('forgetpassword.form');
    Route::post('forgetpassword', [forgetpasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('resetpassword/{token}', [forgetpasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('resetpassword', [forgetpasswordController::class, 'resetPassword'])->name('password.update');

    Route::middleware('auth:api')->group(function () {
    });

});




