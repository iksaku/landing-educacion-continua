@props(['event', 'title', 'closeable' => false])

<x-dialog.base
    :event="$event"
    class="flex items-end sm:items-center justify-center p-4 sm:p-6"
    {{ $attributes }}
>
    <x-card
        x-show="isOpen"
        x-transition:enter="transition-all transform duration-300 ease-out"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="transition-all transform duration-200 ease-in"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        class="relative z-10 w-full sm:max-w-lg !rounded-md"
    >
        <div x-show="isLoading" class="flex items-center justify-center">
            <x-heroicon-o-refresh class="h-8 w-8 animate-spin" />
        </div>
        <div x-show="!isLoading" class="contents">
            @if($closeable)
                <div class="block absolute top-0 right-0 pt-4 pr-4">
                    <button
                        @click="close()"
                        type="button"
                        class="rounded-md text-gray-400 hover:text-gray-500 dark:text-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        <span class="sr-only">Close</span>
                        <x-heroicon-o-x class="w-6 h-6" />
                    </button>
                </div>
            @endif

            <div class="space-y-5 sm:space-y-6">
                <div class="space-y-3 sm:space-y-5">
                    @isset($icon)
                        <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                            {{ $icon }}
                        </div>
                    @endisset

                    <div class="text-center space-y-2">
                        <h3 class="text-lg leading-6 font-medium" id="dialog-title">
                            {{ $title }}
                        </h3>
                        <p class="text-sm text-gray-500 dark:text-gray-300">
                            {{ $slot }}
                        </p>
                    </div>
                </div>

                @isset($actions)
                    <div class="sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense space-y-3 sm:space-y-0">
                        {{ $actions }}
                    </div>
                @endisset
            </div>
        </div>
    </x-card>
</x-dialog.base>
