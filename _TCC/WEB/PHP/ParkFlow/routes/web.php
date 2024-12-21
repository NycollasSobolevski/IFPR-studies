<?php

use Illuminate\Support\Facades\Route;

use Routes\RouteParams;

use App\Http\Controllers\LoginController;

Route::get('/', function () {
    checkLoginOrRedirect();
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index']);
