<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [LoginController::class, 'index']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/firstLogin', [LoginController::class, 'firstLogin']);
Route::post('/login', [LoginController::class, 'login']);

Route::get('/users', [UserController::class, 'GetUsersPage']);
Route::get('/updateUser/{id}', [UserController::class, 'getUpdateUserContainer']);
Route::post('/updateUser/{id}', [UserController::class, 'updateUser']);
Route::get('/deleteUser/{id}', [UserController::class, 'deleteUser']);

Route::get('/userDetails', [UserController::class, 'getUserDetails']);
