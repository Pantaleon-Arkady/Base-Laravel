@extends('layouts.app')

@section('content')

    <div class="home_main_div bg-secondary">

        @auth
            <div class="home_auth_message bg-success text-white">Welcome, {{ auth()->user()->name }}</div>

            <div>
                Workout Form Div
                <form x-data="workoutForm()" method="POST" action="/create-workout">
                    @csrf

                    Workout Form Element
                    <div>
                        Workout:
                        <input x-model="workout" name="workout" type="text" placeholder="Workout name..." />
                    </div>
                    <template x-for="(exercise, index) in exercises" :key="index">

                        <div>
                            <button @click="deleteExercise(index)">
                                Delete Exercise Field
                            </button>

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
                            <div>
                                Reps:
                                <input 
                                    x-model="exercise.reps"
                                    :name="`exercises[${index}][reps]`"
                                    type="number"
                                />
                            </div>
                            <div>
                                Weight:
                                <input 
                                    x-model="exercise.weight"
                                    :name="`exercises[${index}][weight]`"
                                    type="number"
                                />
                            </div>
                            <div>
                                Duration:
                                <input 
                                    x-model="exercise.duration"
                                    :name="`exercises[${index}][duration]`"
                                    type="number"
                                />
                            </div>
                        </div>

                    </template>

                    <button type="button" @click="addExercise()">
                        Add Exercise
                    </button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        @endauth

        @guest
            <div class="home_auth_message bg-warning">You are not logged in</div>
        @endguest

    </div> 

@endsection