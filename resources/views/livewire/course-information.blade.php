<?php /* @var $course App\Models\Course */ ?>

<x-dialog.modal
    event="course-information"
    x-on:dialog-open="$wire.show($event.detail.id)"
    x-on:successful-registration.window="close()"
>
    <div class="absolute inset-0 bg-white hidden items-center justify-center" wire:loading.flex wire:target="show">
        <x-heroicon-o-refresh class="h-8 w-8 animate-spin" />
    </div>

    <div class="contents" wire:loading.remove wire:target="show">
        @if($course === null)
            <x-slot name="title">
                Algo salió mal...
            </x-slot>

            No encontramos el curso que buscabas.
        @else
            <x-slot name="title">
                {{ $course->name }}
            </x-slot>

            <div class="space-y-4">
                <p class="text-gray-700 text-justify">
                    {{ $course->description }}
                </p>

                @if(count($course->schedules) > 0)
                    <div class="border border-green-300 rounded-md divide-y divide-green-300">
                        <h3 class="font-medium px-4 py-2">
                            Horarios
                        </h3>

                        @foreach(collect($this->course->schedules)->groupBy('day') as $day => $schedules)
                            <div class="flex items-start text-left divide-x divide-green-300">
                                <p class="w-1/3 px-4 py-2">
                                    {{ $day }}
                                </p>

                                <div class="space-x-1 px-4 py-2">
                                    @foreach($schedules as $i => $timespan)
                                        <p>
                                            {{ $timespan->starts_at }} - {{ $timespan->ends_at }} horas
                                        </p>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                @if(count($course->costs) > 0)
                    <div class="border border-green-300 rounded-md divide-y divide-green-300">
                        <h3 class="font-medium px-4 py-2">
                            Costos
                        </h3>

                        @foreach($course->costs as $subject => $cost)
                            <div class="flex text-left divide-x divide-green-300">
                                <p class="w-1/3 px-4 py-2">
                                    {{ $subject }}
                                </p>
                                <p class="px-4 py-2">
                                    {{ $cost }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                @endif

                <div class="w-full flex justify-center">
                    <button
                        type="button"
                        class="bg-green-500 hover:bg-green-700 text-gray-100 font-medium px-4 py-2 rounded-md"
                        @click="$dispatch('course-register', { id: {{ $course->id }} })"
                    >
                        ¡Registrate!
                    </button>
                </div>
            </div>

            <livewire:course-registration />
        @endif
    </div>
</x-dialog.modal>
