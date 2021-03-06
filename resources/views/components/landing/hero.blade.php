<div class="relative bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto">
        <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
            <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                <polygon points="50,0 100,0 50,100 0,100" />
            </svg>

            <div x-data="{ isOpen: false }">
                <div class="relative pt-6 px-4 sm:px-6 lg:px-8">
                    <nav class="relative flex items-center justify-between sm:h-10 lg:justify-start" aria-label="Global">
                        <div class="flex items-center flex-grow flex-shrink-0 lg:flex-grow-0">
                            <div class="flex items-center justify-between w-full md:w-auto">
                                <a href="{{ route('index') }}">
                                    <span class="sr-only">Educación Continua</span>
                                    <img class="w-auto h-8 sm:h-10" src="{{ asset('img/logo.jpg') }}">
                                </a>
                                <div class="-mr-2 flex items-center md:hidden">
                                    <button
                                        type="button"
                                        class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                                        :aria-expanded="isOpen"
                                        @click="isOpen = true"
                                    >
                                        <span class="sr-only">Abrir menú principal</span>
                                        <x-heroicon-o-menu class="w-6 h-6" />
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="hidden md:block md:ml-10 md:pr-4 md:space-x-8">
                            <a href="#diplomados" class="font-medium text-gray-500 hover:text-gray-900">
                                Diplomados
                            </a>

                            <a href="#educacion-tecnica" class="font-medium text-gray-500 hover:text-gray-900">
                                Educación Técnica
                            </a>
                        </div>
                    </nav>
                </div>

                <div
                    x-cloak
                    x-show="isOpen"
                    x-transition:enter="duration-150 ease-out"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="duration-100 ease-in"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    @click.away="isOpen = false"
                    class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden"
                >
                    <div class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden">
                        <div class="px-5 pt-4 flex items-center justify-between">
                            <div>
                                <img class="w-auto h-8" src="{{ asset('img/logo.jpg') }}" alt="Educación Continua">
                            </div>
                            <div class="-mr-2">
                                <button
                                    type="button"
                                    class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                                    @click="isOpen = false"
                                >
                                    <span class="sr-only">Cerrar menú principal</span>
                                    <x-heroicon-o-x class="w-6 h-6" />
                                </button>
                            </div>
                        </div>
                        <div class="px-2 pt-2 pb-3 space-y-1">
                            <a href="#diplomados" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">
                                Diplomados
                            </a>

                            <a href="#educacion-tecnica" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">
                                Educación Técnica
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                <div class="sm:text-center lg:text-left">
                    <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                        <span class="block xl:inline">El siguiente paso</span>
                        <span class="block text-green-600 xl:inline">para tu educación</span>
                    </h1>

                    <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                        Los cursos y talleres del programa de Educación Continua proveen
                        el medio que necesitas para expandir tu carrera académica.
                    </p>
                </div>
            </main>
        </div>
    </div>

    <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
        <img
            class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full"
            src="https://source.unsplash.com/g1Kr4Ozfoac?auto=format&fit=crop&w=2850&q=80"
            alt=""
        >
    </div>
</div>
