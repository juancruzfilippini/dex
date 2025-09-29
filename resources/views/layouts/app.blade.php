<!-- resources/views/layouts/app.blade.php -->
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full" x-data x-bind:class="localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) ? 'dark' : ''">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Carga Tailwind + Alpine compilados por Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-slate-50 dark:bg-slate-900 text-slate-900 dark:text-slate-100">
    <div class="min-h-screen">
        @include('layouts.navigation') {{-- si aplica --}}
        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white/70 dark:bg-slate-900/70 backdrop-blur border-b border-slate-200/70 dark:border-slate-800/70">
                <div class="mx-auto max-w-7xl px-4 py-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>
</html>
