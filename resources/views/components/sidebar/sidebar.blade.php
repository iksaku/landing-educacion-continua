{{-- Sidenav --}}
<div
    x-data="{ isOpen: false }"
    x-init="$refs.sidebar.classList.remove('-translate-x-full')"
    @open-sidenav.window="isOpen = $event.detail"
>
    <template x-if="isOpen">
        <div
            @click="isOpen = false"
            x-transition:enter="transition duration-300 ease-linear"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition duration-300 ease-linear"
            x-transition:leave-start="opacity-10"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-40"
        >
            <div class="lg:hidden fixed inset-0 bg-gray-600 opacity-75"></div>
        </div>
    </template>

    <div
        x-ref="sidebar"
        class="h-screen fixed inset-0 z-50 lg:static lg:z-auto w-full max-w-xs lg:w-64 lg:max-w-none flex transform duration-300 ease-in-out -translate-x-full lg:transform-none"
        :class="{
            'translate-x-0': isOpen,
            '-translate-x-full': !isOpen
        }"
    >
        <!-- Sidebar Content -->
        <div class="relative w-full bg-gray-50 dark:bg-gray-800 flex-grow flex flex-col border-r border-gray-200 dark:border-black">
            <div class="lg:hidden absolute top-0 right-0 -mr-12 pt-2">
                <button
                    class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    @click="isOpen = !isOpen"
                    x-show="isOpen"
                    x-transition:enter="transition duration-300 ease-linear"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition duration-300 ease-linear"
                    x-transition:leave-start="opacity-10"
                    x-transition:leave-end="opacity-0"
                >
                    <span class="sr-only">Close sidebar</span>
                    <x-heroicon-o-x class="h-6 w-6 text-white" />
                </button>
            </div>

            <div class="flex-shrink-0 flex items-center px-4">
                <img class="w-auto h-8" src="{{ asset('img/logo.jpg') }}" alt="Educación Continua">
            </div>
            <div class="mt-5 flex-1 h-0 overflow-y-auto">
                <nav class="px-2 space-y-1">
                    <x-sidebar.item title="Inicio" route="dashboard.index">
                        <x-heroicon-o-home class="h-6 w-6" />
                    </x-sidebar.item>
                </nav>
            </div>
        </div>

        <div
            @click="isOpen = false"
            x-show="isOpen"
            x-transition:enter="transition duration-300 ease-linear"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition duration-300 ease-linear"
            x-transition:leave-start="opacity-10"
            x-transition:leave-end="opacity-0"
            class="lg:hidden flex-shrink-0 w-14"
            aria-hidden="true"
        >
            {{-- Dummy element to force sidebar to shrink to fit close icon --}}
        </div>
    </div>
</div>
