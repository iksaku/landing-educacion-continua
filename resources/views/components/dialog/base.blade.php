@props(['event'])

<div
    x-cloak
    x-data="{ ...dialogComponent(), ...{{ $attributes->get('x-data', '{}') }} }"
    x-show="isOpen"
    {{ "@{$event}" }}.window="open($event)"
    class="fixed z-30 inset-0 overflow-hidden"
    aria-labelledby="dialog-title"
    aria-modal="true"
    role="dialog"
    {{ $attributes->except(['class']) }}
>
    <div {{ $attributes->only(['class'])->merge(['class' => 'absolute inset-0 overflow-hidden']) }}>
        {{-- Background overlay --}}
        <div
            @click="close()"
            x-show="isOpen"
            x-transition:enter="transition-opacity duration-300 ease-out"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity duration-300 ease-in"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-0 bg-gray-500 bg-opacity-75"
            aria-hidden="true"
        ></div>

        {{ $slot }}
    </div>
</div>

@once
    @push('scripts')
        <script>
            function dialogComponent() {
                return {
                    isOpen: false,
                    isLoading: false,

                    dispatch(event, detail) {
                        const dispatched = new CustomEvent(event, {
                            bubbles: true,
                            detail
                        })

                        this.$el.dispatchEvent(dispatched)

                        return dispatched
                    },

                    open(event) {
                        const dispatched = this.dispatch('dialog-open', event?.detail)

                        if (dispatched.defaultPrevented) return

                        this.isOpen = true
                    },

                    close(event) {
                        const dispatched = this.dispatch('dialog-close', event?.detail)

                        if (dispatched.defaultPrevented) return

                        this.isOpen = false
                    },
                }
            }
        </script>
    @endpush
@endonce
