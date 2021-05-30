<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CourseInformation extends Component
{
    public ?Course $course = null;

    public function show(int $id): void
    {
        $this->course = Course::query()
            ->select(['id', 'name', 'description', 'duration', 'costs'])
            ->with('schedules')
            ->find($id);
    }

    public function render(): View
    {
        return view('livewire.course-information');
    }
}
