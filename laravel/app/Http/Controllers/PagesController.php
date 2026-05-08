<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workout;

class PagesController extends Controller
{
    public function home(Request $request)
    {
        $workouts = Workout::with('exercises')
            ->where('user_id', $request->user()->id)
            ->latest()
            ->get();

        return view('pages.home', [
            'workouts' => $workouts
        ]);
    }

    public function login()
    { return view('pages.signup', ['mode' => 'login']); }

    public function register()
    { return view('pages.signup', ['mode' => 'register']); }
}
