<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? config('app.name', 'SkillSwap') }}</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Tailwind (already configured) + Alpine via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- SkillSwap animations & interactions -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased bg-[#00111F] text-cyan-50">

    @include('partials.ocean')

    <div class="min-h-screen lg:flex relative z-10">

        <!-- Mobile sidebar overlay -->
        <div id="ss-sidebar-overlay"
             class="fixed inset-0 z-30 bg-slate-900/40 hidden lg:hidden"></div>

        <!-- Sidebar (App shell) -->
        <aside id="ss-sidebar"
               class="fixed inset-y-0 left-0 z-40 w-64 -translate-x-full lg:translate-x-0
                      transition-transform duration-300 ease-in-out
                      bg-gradient-to-b from-[#050B18] to-[#0A1628] text-white/80
                      border-r border-cyan-400/20 backdrop-blur-md shadow-[0_0_45px_rgba(0,0,0,0.55)] flex flex-col">
            <div class="px-6 py-6 flex items-center gap-3">
                <div class="h-10 w-10 rounded-xl bg-white/10 flex items-center justify-center text-xl font-bold">S</div>
                <span class="text-xl font-bold tracking-tight text-white">SkillSwap</span>
                <button id="ss-close-sidebar" class="lg:hidden ml-auto text-white/70 hover:text-white">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <nav class="flex-1 px-4 space-y-1 mt-2">
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl border-l-2 border-transparent transition
                          {{ request()->routeIs('dashboard') ? 'bg-white/5 border-cyan-400 text-cyan-200 shadow-[inset_2px_0_10px_rgba(34,211,238,0.12)]' : 'text-white/80 hover:text-cyan-300 hover:bg-white/5' }}">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Dashboard
                </a>

                <a href="{{ route('home') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl border-l-2 border-transparent transition
                          {{ request()->routeIs('home') ? 'bg-white/5 border-cyan-400 text-cyan-200 shadow-[inset_2px_0_10px_rgba(34,211,238,0.12)]' : 'text-white/80 hover:text-cyan-300 hover:bg-white/5' }}">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    Jelajahi Skill
                </a>

                <a href="{{ route('chat') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl border-l-2 border-transparent transition
                          {{ request()->routeIs('chat') ? 'bg-white/5 border-cyan-400 text-cyan-200 shadow-[inset_2px_0_10px_rgba(34,211,238,0.12)]' : 'text-white/80 hover:text-cyan-300 hover:bg-white/5' }}">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.86 9.86 0 01-4-.8L3 20l1.3-3.9A7.96 7.96 0 013 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    Chat
                </a>

                <a href="{{ route('profile') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl border-l-2 border-transparent transition
                          {{ request()->routeIs('profile*') ? 'bg-white/5 border-cyan-400 text-cyan-200 shadow-[inset_2px_0_10px_rgba(34,211,238,0.12)]' : 'text-white/80 hover:text-cyan-300 hover:bg-white/5' }}">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    Profil
                </a>

                <a href="{{ route('skills.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl border-l-2 border-transparent transition
                          {{ request()->routeIs('skills.*') ? 'bg-white/5 border-cyan-400 text-cyan-200 shadow-[inset_2px_0_10px_rgba(34,211,238,0.12)]' : 'text-white/80 hover:text-cyan-300 hover:bg-white/5' }}">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                    Kelola Skill
                </a>
            </nav>

            <div class="p-4 border-t border-cyan-400/15">
                <div class="flex items-center gap-3 px-2">
                    <div class="h-9 w-9 rounded-full bg-white/10 flex items-center justify-center font-semibold text-white">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div class="leading-tight">
                        <div class="text-sm font-semibold text-white">{{ Auth::user()->name }}</div>
                        <div class="text-xs text-white/60">{{ Auth::user()->email }}</div>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}" class="mt-3">
                    @csrf
                    <button type="submit"
                            class="w-full flex items-center justify-center gap-2 px-4 py-2 rounded-xl border border-cyan-400/20 bg-white/5 hover:bg-white/10 transition text-sm font-medium text-white/80 hover:text-cyan-300">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        Keluar
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main column -->
        <div class="flex-1 lg:ml-64 flex flex-col min-h-screen">

            <!-- Mobile topbar -->
            <header class="lg:hidden sticky top-0 z-20 ss-glass border-b border-cyan-300/30 px-4 py-3 flex items-center gap-3">
                <button id="ss-menu-btn" class="text-cyan-100">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
                <div class="flex items-center gap-2 font-bold text-white">
                    <span class="h-7 w-7 rounded-lg ss-gradient-bg flex items-center justify-center text-white">S</span>
                    SkillSwap
                </div>
            </header>

            <main class="flex-1">
                @yield('content')
            </main>
        </div>
    </div>

</body>
</html>
