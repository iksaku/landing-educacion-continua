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

    protected $visible = [
        'day',
        'starts_at',
        'ends_at',
    ];

    public function getDayAttribute(int $value): string
    {
        return match($value) {
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
