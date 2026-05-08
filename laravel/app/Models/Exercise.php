<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = [
        'workout_id',
        'name',
        'type',
        'sets',
        'repetitions',
        'weight',
        'duration'
    ];

    public function workout()
    {
        return $this->belongsTo(Workout::class);
    }
}
