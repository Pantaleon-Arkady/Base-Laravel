<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workout;

class PagesController extends Controller
{
    public function editWorkout(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer'
        ]);

        $workout = Workout::with('exercises')
            ->where('id', $validated['id'])
            ->where('user_id', $request->user()->id)
            ->first();

        return view('pages.edit', [
            'workout' => $workout
        ]);
    }

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
