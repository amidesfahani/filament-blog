<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __(config('app.name', 'Laravel')) }}</title>

    <!-- Fonts -->
    <link href="{{ asset('assets/fonts/shabnam/font-face.css') }}" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="antialiased font-farsi">
    <div class="font-sans antialiased text-gray-900">
        {{ $slot }}
    </div>

    @livewireScripts
</body>

</html>
