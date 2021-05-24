<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CourseSchedule extends Model
{
    protected $fillable = [
        'day',
        'starts_at',
        'ends_at',
    ];

    protected $casts = [
        'day' => 'integer',
    ];

    public function getWeekDayAttribute(): string
    {
        return match($this->day) {
            Carbon::SUNDAY => 'Domingo',
            Carbon::MONDAY => 'Lunes',
            Carbon::TUESDAY => 'Martes',
            Carbon::WEDNESDAY => 'Miércoles',
            Carbon::THURSDAY => 'Jueves',
            Carbon::FRIDAY => 'Viernes',
            Carbon::SATURDAY => 'Sábado'
        };
    }
}
