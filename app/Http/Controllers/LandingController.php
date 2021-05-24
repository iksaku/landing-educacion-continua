<?php

namespace App\Http\Controllers;

use App\Models\CourseType;
use Illuminate\Contracts\View\View;

class LandingController extends Controller
{
    public function __invoke(): View
    {
        return view('landing', [
            'course_types' => CourseType::query()
                ->with('courses')
                ->get(),
        ]);
    }
}
