@extends('layouts.app')

@section('content')
    <div>
        <div>Editing {{ $workout->name }}</div>
        <form 
            x-data="workoutForm({
                workout: @js($workout->name),
                exercises: @js($workout->exercises)
            })"
            method="POST"
            action="/update-workout"
        >
            @csrf
            <input type="hidden" value="{{ $workout->id }}" name="id" />

            Workout Form Element
            <div>
                Workout:
                <input x-model="workout" name="workout" type="text" />
            </div>
            <template x-for="(exercise, index) in exercises" :key="index">
                <div>
                    <div>
                        Exercise:
                        <input 
                            x-model="exercise.name"
                            :name="`exercises[${index}][name]`"
                            type="text" 
                            placeholder="Exercise name..." 
                        />
                    </div>
                    <div>
                        Type:
                        <select 
                            x-model="exercise.type"
                            :name="`exercises[${index}][type]`"
                        >
                            <option value="bodyweight">Bodyweight Training</option>
                            <option value="weightlift">Weight Training</option>
                            <option value="cardio">Cardio</option>
                            <option value="endurance">Endurance</option>
                        </select>
                    </div>
                    <div>
                        Sets:
                        <input 
                            x-model="exercise.sets"
                            :name="`exercises[${index}][sets]`"
                            type="number"
                        />
                    </div>
                    <div x-show="exerciseTypesConfig[exercise.type].reps">
                        Reps:
                        <input 
                            x-model="exercise.repetitions"
                            :name="`exercises[${index}][reps]`"
                            type="number"
                        />
                    </div>
                    <div x-show="exerciseTypesConfig[exercise.type].weight">
                        Weight:
                        <input 
                            x-model="exercise.weight"
                            :name="`exercises[${index}][weight]`"
                            type="number"
                        />
                    </div>
                    <div x-show="exerciseTypesConfig[exercise.type].duration">
                        Duration:
                        <input 
                            x-model="exercise.duration"
                            :name="`exercises[${index}][duration]`"
                            type="number"
                        />
                    </div>
                </div>
            </template>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@endsection