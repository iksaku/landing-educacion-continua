<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\CourseRegistration;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Index extends Component
{
    public function getRegistrationsProperty(): LengthAwarePaginator
    {
        return CourseRegistration::query()
            ->with('course:name')
            ->paginate();
    }

    public function render(): View
    {
        return view('livewire.dashboard.index')
            ->layout('components.templates.dashboard');
    }
}
