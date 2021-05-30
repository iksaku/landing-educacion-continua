@props(['title'])
@php($name = $attributes->wire('model')?->value() ?? $attributes->get('x-model'))

<label class="w-full sm:w-3/4 flex flex-col text-sm text-gray-700 text-left font-medium space-y-1">
    <span>
        {{ $title }}
    </span>
    <span>
        <input {{
            $attributes->merge([
                'type' => $attributes->get('type', 'text'),
                'inputmode' => $attributes->get('inputmode', 'default'),
                'class' => 'w-full bg-white text-gray-900 border border-gray-300 focus:border-green-600 focus:ring focus:ring-green focus:ring-opacity-50 rounded-md'
            ])->class([
                'border-red-500' => isset($name) && $errors->has($name)
            ])
        }}>
    </span>
    @error($name)
        <span class="text-sm text-red-600 italic">
            {{ $message }}
        </span>
    @enderror
</label>
