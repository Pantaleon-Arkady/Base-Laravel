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
        },

        deleteExercise(index) {
            if (this.exercises.length === 1) return

            this.exercises.splice(index, 1)
        }
    }
}


Alpine.start()