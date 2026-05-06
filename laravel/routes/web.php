<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PagesController;

// Pages

Route::get('/signup/login', [PagesController::class, 'login']);
Route::get('/signup/register', [PagesController::class, 'register']);

// User

Route::get('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);

Route::get('/signup', function() {
    return view('pages.signup');
});

Route::get('/home', function () {
    return view('pages.home');
});

Route::get('/', function () {
    return view('landing');
});

Route::get('/laravel-welcome', function() {
    return view('welcome');
});
