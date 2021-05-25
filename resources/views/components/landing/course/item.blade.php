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
        <x-dialog.modal
            event="course-information"
            x-data="{ ...courseInformationComponent(), ...{!! htmlspecialchars_decode(Radio\radio(App\Http\Components\CourseInformation::class)) !!}}"
            x-on:dialog-open="onOpen($event)"
        >
            <x-slot name="title">
                <span x-text="course?.name"></span>
            </x-slot>

            <p x-text="course?.description"></p>

            <div class="border border-green-300 rounded-md divide-y divide-green-300">
                <h3 class="font-medium px-4 py-2">
                    Horarios
                </h3>

                <template
                    x-for="[day, schedules] of Object.entries(course?.schedules ?? {})"
                    :key="day"
                    class="text-left"
                >
                    <div class="flex items-start divide-x divide-green-300">
                        <p class="w-1/3 px-4 py-2" x-text="day"></p>

                        <div class="space-x-1 px-4 py-2">
                            <template x-for="(timespan, i) in schedules" :key="i">
                                <p>
                                    <span x-text="timespan.starts_at"></span>
                                    -
                                    <span x-text="timespan.ends_at"></span>
                                    horas
                                </p>
                            </template>
                        </div>
                    </div>
                </template>
            </div>
        </x-dialog.modal>
    @endpush

    @push('scripts')
        @radioScripts

        <script>
            function courseInformationComponent() {
                return {
                    async onOpen(event) {
                        if (this.isLoading) {
                            return event.preventDefault()
                        }

                        this.isLoading = true

                        await this.openCourse(event.detail.id)

                        this.isLoading = false
                    }
                }
            }

            function courseRegistrationComponent() {
                return {

                }
            }
        </script>
    @endpush
@endonce
