<div {{
    $attributes
        ->merge(['class' => 'bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg divide-y divide-gray-200 dark:divide-gray-600'])
}}>
    {{-- Header --}}
    @isset($header)
        <div class="px-4 py-5 sm:p-6">
            {{ $header }}
        </div>
    @endisset

    {{-- Content --}}
    <div class="px-4 py-5 sm:p-6">
        {{ $slot }}
    </div>

    {{-- Footer --}}
    @isset($footer)
        <div class="px-4 py-5 sm:p-6">
            {{ $footer }}
        </div>
    @endisset
</div>
