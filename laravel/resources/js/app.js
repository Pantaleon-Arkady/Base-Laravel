import 'bootstrap';
import '../css/app.css';
import Alpine from 'alpinejs'

window.Alpine = Alpine

window.workoutForm = function () {
    return {
        workout: '',
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
        }
    }
}


Alpine.start()