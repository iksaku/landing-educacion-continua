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
            <p class="text-gray-500 text-justify">
                {{ $course->description }}
            </p>
        </div>

        <div class="flex justify-center">
            <button
                type="button"
                class="bg-green-500 hover:bg-green-700 text-gray-100 font-medium px-4 py-2 rounded-md"
                x-data
                @click="$dispatch('course-information', { id: {{ $course->id }} })"
            >
                Más Información
            </button>
        </div>
    </div>
</div>

@once
    @push('dialogs')
        <livewire:course-information />

        <x-dialog.modal event="successful-registration">
            <x-slot name="icon">
                <x-heroicon-s-check-circle class="w-12 h-12 text-green-400" />
            </x-slot>

            <x-slot name="title">
                ¡Gracias por registrarte!
            </x-slot>

            Próximamente nos contactaremos contigo con más información sobre el curso.
        </x-dialog.modal>
    @endpush
@endonce
