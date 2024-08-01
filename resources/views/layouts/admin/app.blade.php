<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('ant-favicon.svg') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/aos-init.js'])
</head>
<body class="--font-inter bg-gray-50 font-inter tracking-tight text-gray-900 antialiased scroll-smooth">
<div
        class="flex min-h-screen flex-col overflow-hidden supports-[overflow:clip]:overflow-clip"
        x-data="{ isLoading: true }" x-init="window.onload = () => { isLoading = false }">
    <div x-show="isLoading" class="fixed inset-0 flex items-center justify-center bg-white z-50">
        <div class="flex-col gap-4 w-full flex items-center justify-center">
            <x-application-icon class="animate-ping w-24 h-24"/>
        </div>
    </div>
    @include('layouts.guest.header')
    <main class="grow" x-show="!isLoading">
        {{ $slot }}
    </main>
    @include('layouts.guest.footer')
</div>
@stack('scripts')
</body>
</html>
