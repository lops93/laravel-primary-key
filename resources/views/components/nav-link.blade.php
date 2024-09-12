@props(['active'])

@php
$classes = ($active ?? false)
            ? 'rounded-md px-3 py-2 text-sm font-medium bg-gray-900 text-white'
            : 'rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
