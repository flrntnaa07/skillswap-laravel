@extends('layouts.skillswap')

@section('content')
    <div class="px-6 py-8 max-w-7xl mx-auto w-full">
        <div class="ss-animate-fade-up flex flex-center items-center justify-between">
            <h1 class="text-2xl lg:text-3xl font-extrabold text-white">Daftar Skill</h1>
            <a href="{{ route('skills.create') }}" class="px-5 py-2 rounded-xl text-white ss-btn-primary font-semibold">+ Tambah Skill</a>
        </div>

        @if (session('success'))
            <div class="mt-4 ss-glass rounded-xl px-4 py-3 text-cyan-100 border border-cyan-300/30">{{ session('success') }}</div>
        @endif

        <!-- Section 1: Skill yang Bisa Dipelajari -->
        <div class="mt-8">
            <h2 class="text-xl font-extrabold text-white mb-4 flex items-center gap-2">
                <span class="h-2 w-2 rounded-full bg-teal-400"></span>
                Skill yang Bisa Dipelajari
            </h2>
            @if($ownedSkills->count() > 0)
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 ss-stagger">
                    @foreach ($ownedSkills as $skill)
                        <div class="ss-glass ss-card-hover rounded-2xl p-6">
                            <div class="flex items-center gap-3">
                                <div class="h-12 w-12 rounded-xl ss-gradient-bg flex items-center justify-center text-white font-bold text-lg">
                                    {{ substr($skill->name, 0, 1) }}
                                </div>
                                <div class="min-w-0">
                                    <div class="font-bold truncate text-white">{{ $skill->name }}</div>
                                    <span class="inline-block mt-1 px-2.5 py-0.5 rounded-full bg-teal-400/20 text-teal-200 text-xs font-semibold capitalize">{{ $skill->category }}</span>
                                </div>
                            </div>
                            <p class="mt-4 text-sm text-cyan-100/80">{{ $skill->description }}</p>
                            <div class="mt-5 flex gap-3">
                                <a href="{{ route('skills.edit', $skill) }}" class="btn btn-warning btn-sm rounded-lg">Edit</a>
                                <form method="POST" action="{{ route('skills.destroy', $skill) }}" onsubmit="return confirm('Hapus skill ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm rounded-lg">Hapus</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="ss-glass ss-card-hover rounded-2xl p-8 text-center text-cyan-200/60">
                    <div class="text-4xl mb-2">🐡</div>
                    Belum ada skill yang dimiliki.
                </div>
            @endif
        </div>

        <!-- Section 2: Skill yang Sedang Dicari -->
        <div class="mt-10">
            <h2 class="text-xl font-extrabold text-white mb-4 flex items-center gap-2">
                <span class="h-2 w-2 rounded-full bg-sky-400"></span>
                Skill yang Sedang Dicari
            </h2>
            @if($neededSkills->count() > 0)
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 ss-stagger">
                    @foreach ($neededSkills as $skill)
                        <div class="ss-glass ss-card-hover rounded-2xl p-6">
                            <div class="flex items-center gap-3">
                                <div class="h-12 w-12 rounded-xl ss-gradient-bg flex items-center justify-center text-white font-bold text-lg">
                                    {{ substr($skill->name, 0, 1) }}
                                </div>
                                <div class="min-w-0">
                                    <div class="font-bold truncate text-white">{{ $skill->name }}</div>
                                    <span class="inline-block mt-1 px-2.5 py-0.5 rounded-full bg-sky-400/20 text-sky-200 text-xs font-semibold capitalize">{{ $skill->category }}</span>
                                </div>
                            </div>
                            <p class="mt-4 text-sm text-cyan-100/80">{{ $skill->description }}</p>
                            <div class="mt-5 flex gap-3">
                                <a href="{{ route('skills.edit', $skill) }}" class="btn btn-warning btn-sm rounded-lg">Edit</a>
                                <form method="POST" action="{{ route('skills.destroy', $skill) }}" onsubmit="return confirm('Hapus skill ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm rounded-lg">Hapus</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="ss-glass ss-card-hover rounded-2xl p-8 text-center text-cyan-200/60">
                    <div class="text-4xl mb-2">🔍</div>
                    Belum ada skill yang dicari.
                </div>
            @endif
        </div>
    </div>
@endsection
