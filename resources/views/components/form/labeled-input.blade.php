@props(['title'])

<label class="w-full sm:w-3/4 flex flex-col text-sm text-gray-700 text-left font-medium space-y-1">
    <span>
        {{ $title }}
    </span>
    <span>
        <input
            x-model="data.{{ $attributes->get('x-model') }}"
            type="{{ $attributes->get('type', 'text') }}"
            inputmode="{{ $attributes->get('inputmode', 'default') }}"
            class="w-full bg-white text-gray-900 border border-gray-300 focus:border-green-600 focus:ring focus:ring-green focus:ring-opacity-50 rounded-md"
            :class="{
                'border-red-500 dark:border-500': $radio.errors.has('{{ $attributes->get('x-model') }}')
            }"
        >
    </span>
    <template x-if="$radio.errors.has('{{ $attributes->get('x-model') }}')">
        <span
            class="text-sm text-red-600 italic"
            x-text="$radio.errors.get('{{ $attributes->get('x-model') }}')[0]"
        ></span>
    </template>
</label>
