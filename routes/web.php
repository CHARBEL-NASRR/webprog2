<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/host/login', function () {
    return view('login');
});

Route::get('/host/register', function () {
    return view('signup');
});

