@props(['value'])

<label {{ $attributes->twMerge('block font-medium text-sm text-gray-700') }}>
    {{ $value ?? $slot }}
</label>
