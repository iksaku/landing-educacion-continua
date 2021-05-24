<?php /** @var App\Models\Course $course */ ?>
@props(['course'])

<div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
    <div class="flex-shrink-0">
        <img
            class="h-48 w-full object-cover"
            src="https://source.unsplash.com/{{ $course->image }}?auto=format&fit=crop&w=1679&q=80"
            alt=""
        >
    </div>
    <div class="flex-1 bg-white p-6 flex flex-col justify-between space-y-6">
        <div class="flex-1 space-y-3">
            <p class="text-xl font-semibold text-gray-900">
                {{ $course->name }}
            </p>
            <p class="text-base text-gray-500">
                {{ $course->description }}
            </p>
        </div>

        <div class="flex flex-col items-center space-y-3">
            <button
                type="button"
                class="text-blue-500 hover:text-blue-700"
                @click="$dispatch('course-information', { id: {{ $course->id }} })"
            >
                Más información
            </button>

            <button
                type="button"
                class="bg-green-500 hover:bg-green-700 text-gray-100 font-medium px-4 py-2 rounded-md"
                @click="$dispatch('register-to-course', { id: {{ $course->id }} })"
            >
                Registrate
            </button>
        </div>
    </div>
</div>
