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
        <x-dialog.modal
            event="course-information"
            x-data="{ ...courseInformationComponent(), ...{!! htmlspecialchars_decode(Radio\radio(App\Http\Components\CourseInformation::class)) !!}}"
            x-on:dialog-open="onOpen($event)"
        >
            <div class="space-y-4">
                <x-slot name="title">
                    <span x-text="course?.name"></span>
                </x-slot>

                <p class="text-gray-700 text-justify" x-text="course?.description"></p>

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

                <div class="border border-green-300 rounded-md divide-y divide-green-300">
                    <h3 class="font-medium px-4 py-2">
                        Costos
                    </h3>

                    <template
                        x-for="[subject, cost] of Object.entries(course?.costs ?? {})"
                        :key="subject"
                        class="text-left"
                    >
                        <div class="flex divide-x divide-green-300">
                            <p class="w-1/3 px-4 py-2" x-text="subject"></p>
                            <p class="px-4 py-2" x-text="subject"></p>
                        </div>
                    </template>
                </div>

                <div class="w-full flex justify-center">
                    <button
                        type="button"
                        class="bg-green-500 hover:bg-green-700 text-gray-100 font-medium px-4 py-2 rounded-md"
                        @click="$dispatch('course-register', { id: courseId })"
                    >
                        ¡Registrate!
                    </button>
                </div>
            </div>

            <form
                x-data="{ ...courseRegistrationComponent(), ...@radio(App\Http\Components\CourseRegistration::class) }"
                @course-register.window="onOpen($event)"
                @dialog-close.window="onClose($event)"
                @submit.prevent=""
                x-show="isOpen"
                x-transition:enter="transform duration-200 ease-in"
                x-transition:enter-start="translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transform duration-150 ease-out"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="translate-x-full"
                class="absolute inset-0 bg-white px-4 py-5 sm:p-6 !m-0 space-y-4"
            >
                <div class="flex items-center space-x-2">
                    <button
                        type="button"
                        @click="isOpen = false"
                    >
                        <x-heroicon-s-chevron-left class="w-8 h-8" />
                    </button>
                    <h3 class="text-lg font-medium">
                        Registro
                    </h3>
                </div>

                <div class="flex flex-col space-y-6 ml-10">
                    <x-form.labeled-input
                        title="Name"
                        x-model="name"
                    />

                    <x-form.labeled-input
                        title="Email"
                        type="email"
                        x-model="email"
                    />

                    <x-form.labeled-input
                        title="Age"
                        type="number"
                        inputmode="numeric"
                        x-model="age"
                    />

                    <x-form.labeled-input
                        title="Phone"
                        type="tel"
                        x-model="phone"
                    />
                </div>

                <div class="flex justify-end">
                    <button
                        type="submit"
                        class="bg-green-500 hover:bg-green-700 text-gray-100 font-medium px-4 py-2 rounded-md"
                        @click="submit()"
                        :disabled="isLoading"
                    >
                        Guardar
                    </button>
                </div>
            </form>
        </x-dialog.modal>
    @endpush

    @push('scripts')
        @radioScripts

        <script>
            function courseInformationComponent() {
                return {
                    async onOpen(event) {
                        if (this.isLoading) {
                            event.preventDefault()
                            return
                        }

                        this.isLoading = true

                        await this.openCourse(event.detail.id)

                        this.isLoading = false
                    }
                }
            }

            function courseRegistrationComponent() {
                return {
                    isOpen: false,
                    isLoading: false,

                    onOpen(event) {
                        this.isOpen = true
                        this.data.course_id = event?.detail.id
                    },

                    onClose() {
                        this.isOpen = false
                    },

                    async submit() {
                        if (this.isLoading) return

                        this.isLoading = true

                        await this.register()

                        this.isLoading = false
                    }
                }
            }
        </script>
    @endpush
@endonce
