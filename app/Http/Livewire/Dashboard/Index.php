<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\CourseRegistration;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function getRegistrationsProperty(): LengthAwarePaginator
    {
        return CourseRegistration::query()
            ->with('course:id,name')
            ->paginate();
    }

    public function render(): View
    {
        return view('livewire.dashboard.index')
            ->layout('layouts.app');
    }
}
