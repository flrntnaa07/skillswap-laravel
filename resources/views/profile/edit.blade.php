@extends('layouts.skillswap')

@section('content')
    <div class="px-6 py-8 max-w-4xl mx-auto w-full relative">

        <!-- Cute sea decorations -->
        <div class="absolute top-4 right-8 opacity-20 ss-float-slow pointer-events-none hidden lg:block">
            <svg viewBox="0 0 44 60" fill="none" class="w-16 h-20 text-cyan-300">
                <path d="M5 22C5 8 39 8 39 22c0 5-3 8-8 9 0 0-2 14 1 26M19 31c0 0-2 16 1 27M25 31c0 0 2 15-1 27M31 31c0 0 3 13 0 25" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"/>
                <path d="M5 22C5 8 39 8 39 22 31 28 13 28 5 22Z" fill="currentColor" opacity="0.35"/>
            </svg>
        </div>
        <div class="absolute bottom-12 left-4 opacity-15 ss-float pointer-events-none hidden lg:block">
            <svg viewBox="0 0 60 60" fill="currentColor" class="w-12 h-12 text-yellow-300">
                <path d="M30 4l7 14 16 2-12 11 3 16-14-8-14 8 3-16-12-11 16-2Z"/>
            </svg>
        </div>

        <!-- Profile Header -->
        <div class="ss-animate-fade-up mb-8">
            <div class="ss-glass ss-glow rounded-2xl p-6 flex flex-col sm:flex-row items-center gap-6 relative overflow-hidden">
                <!-- Bubble decorations around avatar -->
                <div class="absolute -top-3 -left-3 w-8 h-8 rounded-full bg-cyan-400/20 border border-cyan-300/30 animate-pulse"></div>
                <div class="absolute -bottom-2 -right-2 w-6 h-6 rounded-full bg-sky-400/20 border border-sky-300/30 animate-pulse" style="animation-delay: 0.5s;"></div>
                <div class="absolute top-1/2 -right-4 w-4 h-4 rounded-full bg-teal-400/20 border border-teal-300/30 animate-pulse" style="animation-delay: 1s;"></div>

                <!-- Cute sea avatar -->
                <div class="relative ss-float">
                    <div class="h-24 w-24 rounded-full ss-gradient-bg flex items-center justify-center text-white text-4xl font-bold border-4 border-cyan-300/50 shadow-[0_0_30px_rgba(34,211,238,0.4)] relative z-10">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div class="absolute inset-0 rounded-full border-2 border-cyan-400/30 animate-ping" style="animation-duration: 2s;"></div>
                </div>

                <div class="text-center sm:text-left flex-1">
                    <h1 class="text-2xl lg:text-3xl font-extrabold text-white">{{ Auth::user()->name }}</h1>
                    <p class="text-cyan-200/70 text-sm mt-1">{{ Auth::user()->email }}</p>
                    <p class="text-cyan-100/60 text-xs mt-2">Edit profil dan keamanan akun kamu</p>
                </div>
            </div>
        </div>

        <!-- Profile Information Card -->
        <div class="ss-animate-fade-up mb-6" style="animation-delay: 0.1s;">
            <div class="ss-glass rounded-2xl p-6 sm:p-8 relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-cyan-400 via-sky-400 to-teal-400 opacity-60"></div>

                <div class="flex items-center gap-3 mb-6">
                    <div class="h-10 w-10 rounded-xl bg-cyan-400/20 flex items-center justify-center text-cyan-200">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold text-white">Profile Information</h2>
                        <p class="text-xs text-cyan-200/60">Update nama dan email akun kamu</p>
                    </div>
                </div>

                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>

        <!-- Update Password Card -->
        <div class="ss-animate-fade-up mb-6" style="animation-delay: 0.2s;">
            <div class="ss-glass rounded-2xl p-6 sm:p-8 relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-teal-400 via-cyan-400 to-sky-400 opacity-60"></div>

                <div class="flex items-center gap-3 mb-6">
                    <div class="h-10 w-10 rounded-xl bg-teal-400/20 flex items-center justify-center text-teal-200">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold text-white">Update Password</h2>
                        <p class="text-xs text-cyan-200/60">Pastikan akun kamu menggunakan password yang kuat</p>
                    </div>
                </div>

                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>

        <!-- Delete Account Card -->
        <div class="ss-animate-fade-up" style="animation-delay: 0.3s;">
            <div class="rounded-2xl p-6 sm:p-8 relative overflow-hidden border border-rose-400/30 bg-gradient-to-br from-rose-950/40 via-[#0A1628]/80 to-[#00111F]/90 backdrop-blur-xl">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-rose-500 via-orange-400 to-rose-400 opacity-70"></div>

                <div class="flex items-center gap-3 mb-6">
                    <div class="h-10 w-10 rounded-xl bg-rose-500/20 flex items-center justify-center text-rose-300">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold text-white">Delete Account</h2>
                        <p class="text-xs text-cyan-200/60">Hapus akun permanently</p>
                    </div>
                </div>

                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>

    </div>
@endsection
