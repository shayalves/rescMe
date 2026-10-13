<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-sans text-regular-text antialiased">
    <header class="sticky top-0 z-50 bg-primary shadow">
        <nav class="mx-auto flex max-w-6xl flex-wrap items-center justify-between gap-2 px-6 py-4">
            <a href="{{ route('home') }}" class="flex items-center">
                <img src="{{ Vite::asset('resources/images/rescme-logo.png') }}" alt="RescMe" class="h-10 w-auto">
            </a>
            <ul class="flex flex-wrap items-center gap-6 text-sm font-medium text-menu-text">
                <li><a href="{{ route('home') }}" class="hover:underline">Home</a></li>
                <li><a href="#about" class="hover:underline">About us</a></li>
                <li><a href="#faq" class="hover:underline">FAQ</a></li>
                <li><a href="#contact" class="hover:underline">Contact Us</a></li>
                <li><a href="#terms" class="hover:underline">Terms</a></li>
            </ul>
        </nav>
    </header>

    <main>@yield('content')</main>
</body>
</html>
