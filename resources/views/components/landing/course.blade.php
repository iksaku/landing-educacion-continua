<?php /** @var App\Models\CourseType $type */ ?>
@props(['type'])

<div class="relative bg-gray-50 pt-16 pb-20 px-4 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">
    <div class="absolute inset-0">
        <div class="bg-white h-1/3 sm:h-2/3"></div>
    </div>
    <div class="relative max-w-7xl mx-auto">
        <h2
            id="{{ Str::slug($type->name) }}"
            class="text-3xl text-center tracking-tight font-extrabold text-gray-900 sm:text-4xl"
        >
            {{ $type->name }}
        </h2>

        <div class="mt-12 max-w-lg mx-auto grid gap-5 lg:grid-cols-3 lg:max-w-none">
            @foreach($type->courses as $course)
                <x-landing.course.item :course="$course" />
            @endforeach
        </div>
    </div>
</div>
