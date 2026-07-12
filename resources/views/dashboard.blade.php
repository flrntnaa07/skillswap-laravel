@extends('layouts.skillswap')

@section('content')
    <div class="px-6 py-8 max-w-7xl mx-auto w-full">

        <!-- Greeting -->
        <div class="ss-animate-fade-up">
            <h1 class="text-2xl lg:text-3xl font-extrabold tracking-tight text-white">
                Halo, {{ Auth::user()->name }} 👋
            </h1>
            <p class="mt-1 text-cyan-200/70">Selamat datang kembali di dashboard SkillSwap kamu.</p>
        </div>

        <!-- Stats -->
        <div class="mt-8 grid sm:grid-cols-2 lg:grid-cols-4 gap-5 ss-stagger">
            <div class="ss-glass ss-card-hover rounded-2xl p-6">
                <div class="text-sm text-cyan-200/70">Total Skill Dimiliki</div>
                <div class="mt-2 text-3xl font-extrabold ss-gradient-text">{{ $ownedCount }}</div>
            </div>
            <div class="ss-glass ss-card-hover rounded-2xl p-6">
                <div class="text-sm text-cyan-200/70">Total Skill Dibutuhkan</div>
                <div class="mt-2 text-3xl font-extrabold ss-gradient-text">{{ $neededCount }}</div>
            </div>
            <div class="ss-glass ss-card-hover rounded-2xl p-6">
                <div class="text-sm text-cyan-200/70">Total Skill Platform</div>
                <div class="mt-2 text-3xl font-extrabold ss-gradient-text">{{ $totalCount }}</div>
            </div>
            <div class="ss-glass ss-card-hover rounded-2xl p-6">
                <div class="text-sm text-cyan-200/70">Permintaan tukar</div>
                <div class="mt-2 text-3xl font-extrabold ss-gradient-text">3</div>
            </div>
        </div>

        <div class="mt-8 grid lg:grid-cols-3 gap-6">

            <!-- Recent skills -->
            <div class="lg:col-span-2 ss-glass ss-card-hover rounded-2xl p-6 ss-animate-fade-up">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-bold text-white">Skill terbaru</h2>
                    <a href="{{ route('skills.create') }}" class="text-sm font-semibold text-cyan-300 hover:text-cyan-200">+ Tambah</a>
                </div>

                @forelse ($skills as $skill)
                    <div class="flex items-center gap-3 py-3 border-b border-cyan-300/15 last:border-0">
                        <div class="h-10 w-10 rounded-xl ss-gradient-bg flex items-center justify-center text-white font-bold">
                            {{ substr($skill->name, 0, 1) }}
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="font-semibold truncate text-white">{{ $skill->name }}</div>
                            <div class="text-xs text-cyan-200/70">{{ $skill->category }}</div>
                        </div>
                        @if($skill->skill_type === 'owned')
                            <span class="px-2 py-0.5 rounded-full bg-teal-400/20 text-teal-200 text-xs font-semibold">Dimiliki</span>
                        @elseif($skill->skill_type === 'needed')
                            <span class="px-2 py-0.5 rounded-full bg-sky-400/20 text-sky-200 text-xs font-semibold">Dibutuhkan</span>
                        @endif
                    </div>
                @empty
                    <div class="text-center py-10 text-cyan-200/60">
                        <div class="text-4xl mb-2">🐠</div>
                        Kamu belum punya skill.
                        <a href="{{ route('skills.create') }}" class="text-cyan-300 font-semibold">Tambah sekarang</a>.
                    </div>
                @endforelse
            </div>

            <!-- Quick actions -->
            <div class="ss-glass ss-card-hover rounded-2xl p-6 ss-animate-fade-up">
                <h2 class="text-lg font-bold mb-4 text-white">Aksi cepat</h2>
                <div class="space-y-3">
                    <a href="{{ route('skills.create') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl border border-cyan-300/20 hover:bg-cyan-400/10 transition text-white">
                        <span class="h-9 w-9 rounded-lg bg-cyan-400/20 text-cyan-200 flex items-center justify-center">+</span>
                        Tambah skill baru
                    </a>
                    <a href="{{ route('home') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl border border-cyan-300/20 hover:bg-cyan-400/10 transition text-white">
                        <span class="h-9 w-9 rounded-lg bg-sky-400/20 text-sky-200 flex items-center justify-center">🔍</span>
                        Jelajahi skill lain
                    </a>
                    <a href="{{ route('chat') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl border border-cyan-300/20 hover:bg-cyan-400/10 transition text-white">
                        <span class="h-9 w-9 rounded-lg bg-teal-400/20 text-teal-200 flex items-center justify-center">💬</span>
                        Buka obrolan
                    </a>
                    <a href="{{ route('profile.edit') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl border border-cyan-300/20 hover:bg-cyan-400/10 transition text-white">
                        <span class="h-9 w-9 rounded-lg bg-cyan-400/20 text-cyan-200 flex items-center justify-center">⚙️</span>
                        Edit profil
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
