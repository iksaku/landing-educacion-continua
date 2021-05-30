<form
    x-data="{ isOpen: false, course_id: $wire.entangle('course_id').defer }"
    @course-register.window="isOpen = true; course_id = $event.detail.id"
    @dialog-close.window="isOpen = false"
    wire:submit.prevent="register()"
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
            wire:model.defer="registration.name"
        />

        <x-form.labeled-input
            title="Email"
            type="email"
            wire:model.defer="registration.email"
        />

        <x-form.labeled-input
            title="Age"
            type="number"
            inputmode="numeric"
            wire:model.defer="registration.age"
        />

        <x-form.labeled-input
            title="Phone"
            type="tel"
            wire:model.defer="registration.phone"
        />
    </div>

    <div class="flex justify-end">
        <button
            type="submit"
            class="bg-green-500 hover:bg-green-700 text-gray-100 font-medium px-4 py-2 rounded-md"
            wire:loading.attr="disabled"
        >
            Guardar
        </button>
    </div>
</form>
