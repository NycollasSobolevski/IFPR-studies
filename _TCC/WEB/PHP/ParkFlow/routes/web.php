<?php

use Illuminate\Support\Facades\Route;

use Routes\RouteParams;

Route::get('/', function () {
    checkLoginOrRedirect();
    return view('welcome');
});

Route::get('/login', function () {

    

    return view('login');
});