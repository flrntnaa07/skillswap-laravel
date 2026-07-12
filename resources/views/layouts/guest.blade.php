<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- SkillSwap ocean theme -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans text-gray-900 antialiased bg-[#00111F]">
        @include('partials.ocean')

        <div class="relative z-10 min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">

            <!-- Brand -->
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-cyan-300 ss-glow rounded-2xl" />
                </a>
            </div>

            <!-- Decorative sea creatures beside the card -->
            <div class="absolute left-6 top-1/3 text-cyan-300/70 ss-float hidden sm:block">
                <svg viewBox="0 0 70 36" fill="currentColor" class="w-16 h-8 drop-shadow-[0_0_6px_rgba(56,189,248,0.6)]"><path d="M4 18C16 4 40 4 54 18 40 32 16 32 4 18Zm50 0 16-11v22Z"/><circle cx="20" cy="15" r="2.2" fill="#00111F"/></svg>
            </div>
            <div class="absolute right-6 top-1/4 text-cyan-200/70 ss-float-slow hidden sm:block">
                <svg viewBox="0 0 44 60" fill="none" class="w-10 h-14 drop-shadow-[0_0_8px_rgba(103,232,249,0.6)]"><path d="M5 22C5 8 39 8 39 22c0 5-3 8-8 9 0 0-2 14 1 26M19 31c0 0-2 16 1 27M25 31c0 0 2 15-1 27M31 31c0 0 3 13 0 25" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"/><path d="M5 22C5 8 39 8 39 22 31 28 13 28 5 22Z" fill="currentColor" opacity="0.4"/></svg>
            </div>
            <div class="absolute right-10 bottom-24 text-fuchsia-300/50 ss-float hidden sm:block">
                <svg viewBox="0 0 90 80" fill="currentColor" class="w-16 h-14 drop-shadow-[0_0_8px_rgba(251,113,133,0.5)]"><path d="M45 80c-6-18-4-30-14-40 4 10 2 18-4 24 8-14 4-28-6-38 10 8 16 4 20-8 4 12 10 16 20 8-10 10-14 24-6 38-6-6-12-14-4-24-10 10-8 22-14 40Z"/></svg>
            </div>

            <!-- Glass auth card -->
            <div class="relative w-full sm:max-w-md mt-6 px-6 py-8 ss-glass-light overflow-hidden sm:rounded-2xl">
                <!-- glow / light behind form -->
                <div class="absolute inset-0 ss-light-rays opacity-50 pointer-events-none"></div>
                <div class="absolute -inset-2 -z-10 rounded-3xl bg-cyan-400/20 blur-2xl"></div>

                <div class="relative">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
