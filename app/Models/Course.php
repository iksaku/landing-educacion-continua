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
        'cost_for_students',
        'cost_for_non_students',
    ];

    protected $casts = [
        'duration' => 'integer',
        'cost_for_students' => 'float',
        'cost_for_non_students' => 'float',
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(CourseType::class);
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(CourseSchedule::class);
    }
}
