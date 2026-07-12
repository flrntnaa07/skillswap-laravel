<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SkillSwap - Tukar Skill, Bertumbuh Bersama</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased bg-[#00111F] text-cyan-50">

    @include('partials.ocean')

    <!-- Navbar -->
    <header class="relative z-10">
        <div class="max-w-7xl mx-auto px-6 py-5 flex items-center justify-between">
            <div class="flex items-center gap-2 font-extrabold text-xl">
                <span class="h-9 w-9 rounded-xl ss-gradient-bg flex items-center justify-center text-white">S</span>
                <span class="tracking-tight">Skill<span class="ss-gradient-text">Swap</span></span>
            </div>
            <nav class="flex items-center gap-3">
                @auth
                    <a href="{{ route('dashboard') }}"
                       class="px-5 py-2 rounded-xl text-sm font-semibold text-cyan-100 hover:bg-cyan-400/10 transition">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="px-5 py-2 rounded-xl text-sm font-semibold text-cyan-100 hover:bg-cyan-400/10 transition">
                        Masuk
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="px-5 py-2 rounded-xl text-sm font-semibold text-white ss-btn-primary shadow-lg">
                            Daftar Gratis
                        </a>
                    @endif
                @endauth
            </nav>
        </div>
    </header>

    <!-- Hero -->
    <section class="relative overflow-hidden">
        <div class="absolute inset-0 -z-10 ss-gradient-bg opacity-10"></div>

        <div class="max-w-7xl mx-auto px-6 py-20 lg:py-28 grid lg:grid-cols-2 gap-12 items-center">
            <div class="ss-animate-fade-up">
                <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-cyan-400/10 text-cyan-200 text-sm font-semibold border border-cyan-300/30">
                    <span class="h-2 w-2 rounded-full ss-gradient-bg"></span>
                    Komunitas tukar-menukar skill
                </span>
                <h1 class="mt-6 text-4xl lg:text-6xl font-extrabold leading-tight tracking-tight text-white">
                    Tukar <span class="ss-gradient-text">Skill</span>mu,<br>
                    Bertumbuh Bersama.
                </h1>
                <p class="mt-6 text-lg text-cyan-100/80 max-w-md">
                    Pelajari hal baru dari orang lain, dan ajarkan keahlianmu sebagai imbalan.
                    SkillSwap menghubungkanmu dengan komunitas yang saling berbagi.
                </p>
                <div class="mt-8 flex flex-wrap gap-4">
                    @guest
                        <a href="{{ route('register') }}"
                           class="px-7 py-3 rounded-xl text-white font-semibold ss-btn-primary shadow-lg">
                            Mulai Sekarang
                        </a>
                        <a href="{{ route('login') }}"
                           class="px-7 py-3 rounded-xl font-semibold text-cyan-100 border border-cyan-300/30 hover:bg-cyan-400/10 transition">
                            Saya sudah punya akun
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}"
                           class="px-7 py-3 rounded-xl text-white font-semibold ss-btn-primary shadow-lg">
                            Buka Dashboard
                        </a>
                        <a href="{{ route('home') }}"
                           class="px-7 py-3 rounded-xl font-semibold text-cyan-100 border border-cyan-300/30 hover:bg-cyan-400/10 transition">
                            Jelajahi Skill
                        </a>
                    @endguest
                </div>

                <div class="mt-10 flex items-center gap-8">
                    <div>
                        <div class="text-3xl font-extrabold ss-gradient-text">12rb+</div>
                        <div class="text-sm text-cyan-200/60">Anggota aktif</div>
                    </div>
                    <div class="h-10 w-px bg-cyan-300/20"></div>
                    <div>
                        <div class="text-3xl font-extrabold ss-gradient-text">4.8 ★</div>
                        <div class="text-sm text-cyan-200/60">Rating komunitas</div>
                    </div>
                    <div class="h-10 w-px bg-cyan-300/20"></div>
                    <div>
                        <div class="text-3xl font-extrabold ss-gradient-text">300+</div>
                        <div class="text-sm text-cyan-200/60">Kategori skill</div>
                    </div>
                </div>
            </div>

            <!-- Decorative card stack -->
            <div class="relative ss-animate-fade-in">
                <div class="ss-float relative mx-auto max-w-sm">
                    <div class="ss-glass rounded-3xl p-6 ss-animate-fade-up">
                        <div class="flex items-center gap-3">
                            <div class="h-12 w-12 rounded-full ss-gradient-bg flex items-center justify-center text-white font-bold">A</div>
                            <div>
                                <div class="font-semibold text-white">Ana — Desain UI</div>
                                <div class="text-xs text-cyan-200/70">Menawarkan: Figma • Minta: Laravel</div>
                            </div>
                        </div>
                        <div class="mt-4 flex flex-wrap gap-2">
                            <span class="px-3 py-1 rounded-full bg-cyan-400/15 text-cyan-200 text-xs font-medium">Design</span>
                            <span class="px-3 py-1 rounded-full bg-sky-400/15 text-sky-200 text-xs font-medium">Figma</span>
                            <span class="px-3 py-1 rounded-full bg-teal-400/15 text-teal-200 text-xs font-medium">Mentoring</span>
                        </div>
                    </div>
                </div>
                <div class="ss-float-slow absolute -bottom-6 -left-6 ss-glass rounded-2xl p-4 max-w-[220px]">
                    <div class="text-sm font-semibold text-white">Cocok untukmu!</div>
                    <div class="text-xs text-cyan-200/70 mt-1">Budi butuh skill Desain UI, dan punya Laravel. Match!</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="max-w-7xl mx-auto px-6 py-16 relative z-10">
        <div class="text-center max-w-2xl mx-auto">
            <h2 class="text-3xl font-extrabold tracking-tight text-white">Cara kerja SkillSwap</h2>
            <p class="mt-3 text-cyan-100/80">Tiga langkah mudah untuk mulai bertukar skill dengan komunitas.</p>
        </div>

        <div class="mt-12 grid md:grid-cols-3 gap-6 ss-stagger">
            <div class="ss-glass ss-card-hover rounded-2xl p-7">
                <div class="h-12 w-12 rounded-xl ss-gradient-bg flex items-center justify-center text-white text-xl font-bold">1</div>
                <h3 class="mt-5 text-lg font-bold text-white">Buat profil skill</h3>
                <p class="mt-2 text-cyan-100/80 text-sm">Daftarkan skill yang kamu kuasai dan skill yang ingin kamu pelajari.</p>
            </div>
            <div class="ss-glass ss-card-hover rounded-2xl p-7">
                <div class="h-12 w-12 rounded-xl ss-gradient-bg flex items-center justify-center text-white text-xl font-bold">2</div>
                <h3 class="mt-5 text-lg font-bold text-white">Temukan kecocokan</h3>
                <p class="mt-2 text-cyan-100/80 text-sm">Jelajahi anggota lain dan temukan pasangan tukar yang tepat.</p>
            </div>
            <div class="ss-glass ss-card-hover rounded-2xl p-7">
                <div class="h-12 w-12 rounded-xl ss-gradient-bg flex items-center justify-center text-white text-xl font-bold">3</div>
                <h3 class="mt-5 text-lg font-bold text-white">Chat & bertukar</h3>
                <p class="mt-2 text-cyan-100/80 text-sm">Diskusikan jadwal, lalu belajar satu sama lain lewat fitur chat.</p>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="max-w-7xl mx-auto px-6 pb-20 relative z-10">
        <div class="ss-gradient-bg rounded-3xl px-8 py-14 text-center text-white ss-animate-fade-up relative overflow-hidden">
            <div class="absolute inset-0 ss-light-rays opacity-60"></div>
            <h2 class="text-3xl font-extrabold relative">Siap memulai perjalanan skillmu?</h2>
            <p class="mt-3 text-white/80 max-w-xl mx-auto relative">Bergabung dengan ribuan anggota yang saling berbagi dan bertumbuh setiap hari.</p>
            <div class="mt-8 relative">
                @guest
                    <a href="{{ route('register') }}"
                       class="inline-block px-8 py-3 rounded-xl bg-white text-cyan-700 font-semibold shadow-lg hover:bg-cyan-50 transition">
                        Daftar Sekarang
                    </a>
                @else
                    <a href="{{ route('dashboard') }}"
                       class="inline-block px-8 py-3 rounded-xl bg-white text-cyan-700 font-semibold shadow-lg hover:bg-cyan-50 transition">
                        Buka Dashboard
                    </a>
                @endguest
            </div>
        </div>
    </section>

    <footer class="border-t border-cyan-300/15 relative z-10">
        <div class="max-w-7xl mx-auto px-6 py-8 text-center text-sm text-cyan-200/60">
            &copy; {{ date('Y') }} SkillSwap. Dibangun dengan Laravel &amp; Tailwind CSS.
        </div>
    </footer>

</body>
</html>
