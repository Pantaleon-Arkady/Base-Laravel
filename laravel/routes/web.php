<?php

use Illuminate\Support\Facades\Route;

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
