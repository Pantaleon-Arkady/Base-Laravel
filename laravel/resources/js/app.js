import 'bootstrap';
import '../css/app.css';
import Alpine from 'alpinejs'

window.Alpine = Alpine

window.workoutForm = function () {
    return {
        workout: '',

        exerciseTypesConfig: {
            bodyweight: {
                reps: true,
                weight: false,
                duration: false,
            },

            weightlift: {
                reps: true,
                weight: true,
                duration: false,
            },

            cardio: {
                reps: false,
                weight: false,
                duration: true,
            },

            endurance: {
                reps: false,
                weight: false,
                duration: true,
            }
        },

        exercises: [
            {
                name: '',
                type: 'bodyweight',
                sets: '',
                reps: '',
                weight: '',
                duration: ''
            }
        ],

        addExercise() {
            this.exercises.push({
                name: '',
                type: 'bodyweight',
                sets: '',
                reps: '',
                weight: '',
                duration: ''
            })
        },

        deleteExercise(index) {
            if (this.exercises.length === 1) return

            this.exercises.splice(index, 1)
        }
    }
}


Alpine.start()