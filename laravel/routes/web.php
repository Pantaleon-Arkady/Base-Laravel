<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\WorkoutController;

// Workout

Route::post('/delete-workout', [WorkoutController::class, 'deleteWorkout']);
Route::post('/create-workout', [WorkoutController::class, 'createWorkout']);

// Pages

Route::post('/edit-workout', [PagesController::class, 'editWorkout']);
Route::get('/home', [PagesController::class, 'home']);
Route::get('/signup/login', [PagesController::class, 'login']);
Route::get('/signup/register', [PagesController::class, 'register']);

// User

Route::get('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);

Route::get('/signup', function() {
    return view('pages.signup');
});

Route::get('/', function () {
    return view('landing');
});

Route::get('/laravel-welcome', function() {
    return view('welcome');
});
