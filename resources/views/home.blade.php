@extends('layouts.skillswap')

@section('content')
    <div class="px-6 py-8 max-w-7xl mx-auto w-full">

        <!-- Header + search -->
        <div class="ss-animate-fade-up flex flex-col lg:flex-row lg:items-end lg:justify-between gap-4">
            <div>
                <h1 class="text-2xl lg:text-3xl font-extrabold tracking-tight text-white">Jelajahi Skill</h1>
                <p class="mt-1 text-cyan-200/70">Temukan anggota yang ingin bertukar keahlian denganmu.</p>
            </div>
            <div class="relative w-full lg:w-80">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 h-5 w-5 text-cyan-300/70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input id="ss-skill-search" type="text" placeholder="Cari skill atau kategori..."
                       class="w-full pl-10 pr-4 py-3 rounded-xl border border-cyan-300/30 bg-white/5 text-white placeholder-cyan-200/50 focus:ring-2 focus:ring-cyan-300 focus:border-cyan-300 outline-none">
            </div>
        </div>

        <!-- Category filters -->
        <div class="mt-6 flex flex-wrap gap-2 ss-stagger" id="ss-categories">
            <button data-category="all" class="ss-gradient-bg text-white shadow px-4 py-2 rounded-full text-sm font-medium">Semua</button>
            <button data-category="design" class="bg-cyan-400/10 text-cyan-100 px-4 py-2 rounded-full text-sm font-medium hover:bg-cyan-400/20">Design</button>
            <button data-category="programming" class="bg-cyan-400/10 text-cyan-100 px-4 py-2 rounded-full text-sm font-medium hover:bg-cyan-400/20">Programming</button>
            <button data-category="language" class="bg-cyan-400/10 text-cyan-100 px-4 py-2 rounded-full text-sm font-medium hover:bg-cyan-400/20">Language</button>
            <button data-category="music" class="bg-cyan-400/10 text-cyan-100 px-4 py-2 rounded-full text-sm font-medium hover:bg-cyan-400/20">Music</button>
            <button data-category="business" class="bg-cyan-400/10 text-cyan-100 px-4 py-2 rounded-full text-sm font-medium hover:bg-cyan-400/20">Business</button>
        </div>

        <!-- Skill grid -->
        <div class="mt-8 grid sm:grid-cols-2 lg:grid-cols-3 gap-6 ss-stagger">
            @forelse ($skills as $skill)
                <div data-skill-card
                     data-skill-name="{{ strtolower($skill->name) }}"
                     data-skill-category="{{ strtolower($skill->category) }}"
                     class="ss-glass ss-card-hover rounded-2xl p-6 group">
                    <div class="flex items-center gap-3">
                        <div class="h-12 w-12 rounded-xl ss-gradient-bg flex items-center justify-center text-white font-bold text-lg">
                            {{ substr($skill->name, 0, 1) }}
                        </div>
                        <div class="min-w-0">
                            <div class="font-bold truncate text-white">{{ $skill->name }}</div>
                            <span class="inline-block mt-1 px-2.5 py-0.5 rounded-full bg-cyan-400/20 text-cyan-200 text-xs font-semibold capitalize">
                                {{ $skill->category }}
                            </span>
                        </div>
                    </div>
                    <p class="mt-4 text-sm text-cyan-100/80 line-clamp-3">{{ $skill->description }}</p>
                    <div class="mt-5 flex items-center justify-between">
                        <div class="flex -space-x-2">
                            <div class="h-8 w-8 rounded-full bg-cyan-300/40 border-2 border-[#002B4F]"></div>
                            <div class="h-8 w-8 rounded-full bg-sky-300/40 border-2 border-[#002B4F]"></div>
                            <div class="h-8 w-8 rounded-full bg-teal-300/40 border-2 border-[#002B4F]"></div>
                        </div>
                        <a href="{{ route('chat') }}"
                           class="px-4 py-2 rounded-xl text-white text-sm font-semibold ss-btn-primary">
                            Tukar
                        </a>
                    </div>
                </div>
            @empty
                <div class="sm:col-span-2 lg:col-span-3 text-center py-16 text-cyan-200/60">
                    <div class="text-5xl mb-3">🐟</div>
                    Belum ada skill yang tersedia.
                    <a href="{{ route('skills.create') }}" class="text-cyan-300 font-semibold">Tambah skill pertamamu</a>.
                </div>
            @endforelse
        </div>
    </div>
@endsection
