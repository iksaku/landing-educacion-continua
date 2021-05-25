<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'duration',
        'costs',
    ];

    protected $casts = [
        'duration' => 'integer',
        'costs' => 'json',
    ];

    protected $visible = [
        'name',
        'description',
        'duration',
        'costs',
        'schedules',
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(CourseType::class);
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(CourseSchedule::class);
    }

    public function registrations(): HasMany
    {
        return $this->hasMany(CourseRegistration::class);
    }

    public function toArray()
    {
        $data = parent::toArray();

        if (count($data['schedules'] ?? []) > 0) {
            $schedules = collect($data['schedules'])
                ->groupBy('day')
                ->toArray();

            $data['schedules'] = $schedules;
        }

        return $data;
    }
}
