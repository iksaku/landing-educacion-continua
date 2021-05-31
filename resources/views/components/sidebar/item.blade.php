@props(['title', 'route'])

@php($isActive = Route::is($route))

<a {{
    $attributes->merge([
        'href' => route($route),
        'class' => 'group flex items-center px-2 py-2 text-sm font-medium rounded-md hover:bg-gray-50 dark:hover:bg-gray-900 text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-gray-100'
    ])->class([
        'bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100' => Route::is($route),
        'hover:bg-gray-50 dark:hover:bg-gray-900 text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-gray-100' => ! Route::is($route)
    ])
}}>
    <span class="mr-3 text-gray-500 dark:text-gray-100">
        {{-- Icon --}}
        {{ $slot  }}
    </span>

    {{ $title }}
</a>
