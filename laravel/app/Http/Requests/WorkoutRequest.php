<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class WorkoutRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => $this->isMethod('put') || $this->isMethod('patch')
                ? 'required|exists:workouts,id'
                : 'nullable',

            'workout' => 'required|string|min:3|max:50',

            'exercises' => 'required|array|min:1',

            'exercises.*.name' => 'required|string|min:2|max:100',
            'exercises.*.type' => 'required|string|in:bodyweight,weightlift,cardio,endurance',

            'exercises.*.sets' => 'nullable|integer|min:1',
            'exercises.*.reps' => 'nullable|integer|min:1',
            'exercises.*.weight' => 'nullable|numeric|min:0',
            'exercises.*.duration' => 'nullable|integer|min:0',
        ];
    }
}