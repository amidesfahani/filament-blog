@props(['active'])

@php
    // prettier-ignore
    $classes = $active ?? false
                        ? 'inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 focus:outline-none focus:border-gray-700 transition duration-150 ease-in-out text-gray-500 hover:text-gray-900'
                        : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-primary-500 hover:text-primary-900 hover:border-primary-300 focus:outline-none focus:text-primary-700 focus:border-primary-300 transition duration-150 ease-in-out';
@endphp

<a wire:navigate {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
