<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/a85d4c66d6.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css','resources/css/styles.css', 'resources/css/reset.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
    {{--    @include('layouts.navigation')--}}
    @include('layouts.nav')

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white shadow lg:ml-60 text-left mb-6">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main class="lg:ml-60">
        {{ $slot }}
    </main>
</div>
@livewireScripts
</body>
</html>
