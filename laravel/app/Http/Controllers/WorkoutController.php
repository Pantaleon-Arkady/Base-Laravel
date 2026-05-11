<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\WorkoutRequest;
use App\Models\Workout;
use Illuminate\Support\Facades\Auth;

class WorkoutController extends Controller
{
    public function updateWorkout(WorkoutRequest $request)
    {
        $validated = $request->validated();

        $workout = Workout::find($validated['id']);

        if (Auth::id() !== $workout->user_id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $workout->update([
            'name' => $validated['workout']
        ]);

        $workout->exercises()->delete();

        $this->saveExercises($workout, $validated['exercises']);

        return redirect('/home');
    }

    public function deleteWorkout(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:workouts,id'
        ]);

        $workout = Workout::find($request->id);

        if (Auth::id() !== $workout->user_id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $workout->delete();

        return redirect('/home');
    }

    public function createWorkout(WorkoutRequest $request)
    {
        $validated = $request->validated();

        $workout = Workout::create([
            'name' => $validated['workout'],
            'user_id' => $request->user()->id
        ]);

        $this->saveExercises($workout, $validated['exercises']);

        return redirect()
            ->back()
            ->with('success', 'Workout saved successfully');
    }

    private function saveExercises(Workout $workout, array $exercises): void
    {
        $mappedExercises = array_map(function ($exercise) {
            return [
                'name' => $exercise['name'],
                'type' => $exercise['type'],
                'sets' => $exercise['sets'] ?? null,
                'repetitions' => $exercise['reps'] ?? null,
                'weight' => $exercise['weight'] ?? null,
                'duration' => $exercise['duration'] ?? null,
            ];
        }, $exercises);

        $workout->exercises()->createMany($mappedExercises);
    }
}
