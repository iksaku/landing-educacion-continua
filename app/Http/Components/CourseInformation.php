<?php

namespace App\Http\Components;

use App\Models\Course;
use Radio\Attributes\Computed;
use Radio\Radio;

class CourseInformation
{
    use Radio;

    public ?int $courseId = null;

    public function openCourse(?int $id = null): void
    {
        $this->courseId = $id;
    }

    #[Computed('getCourse')]
    public mixed $course = null;

    public function getCourse(): ?Course
    {
        if ($this->courseId === null) return null;

        return Course::query()
            ->select(['id', 'name', 'description', 'duration', 'costs'])
            ->with('schedules')
            ->find($this->courseId);
    }
}
