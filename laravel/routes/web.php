<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;

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
