@extends('layouts.skillswap')

@section('content')
    <div class="px-6 py-8 max-w-2xl mx-auto w-full">
        <div class="ss-animate-fade-up flex items-center gap-3">
            <div class="h-16 w-16 rounded-2xl ss-gradient-bg flex items-center justify-center text-white font-bold text-2xl">
                {{ substr($skill->name, 0, 1) }}
            </div>
            <div>
                <h1 class="text-2xl lg:text-3xl font-extrabold text-white">{{ $skill->name }}</h1>
                <div class="flex flex-wrap gap-2 mt-1">
                    <span class="inline-block px-2.5 py-0.5 rounded-full bg-cyan-400/20 text-cyan-200 text-xs font-semibold capitalize">{{ $skill->category }}</span>
                    @if($skill->skill_type === 'owned')
                        <span class="inline-block px-2.5 py-0.5 rounded-full bg-teal-400/20 text-teal-200 text-xs font-semibold">Skill Dimiliki</span>
                    @elseif($skill->skill_type === 'needed')
                        <span class="inline-block px-2.5 py-0.5 rounded-full bg-sky-400/20 text-sky-200 text-xs font-semibold">Skill Dibutuhkan</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="mt-6 ss-glass ss-card-hover rounded-2xl p-6">
            <h2 class="text-sm font-semibold text-cyan-200/70">Deskripsi</h2>
            <p class="mt-2 text-cyan-100/90 leading-relaxed">{{ $skill->description }}</p>
        </div>

        <div class="mt-6 flex gap-3">
            <a href="{{ route('skills.edit', $skill) }}" class="px-5 py-2 rounded-xl text-cyan-200 border border-cyan-300/30 hover:bg-white/5 transition font-semibold">Edit</a>
            <a href="{{ route('skills.index') }}" class="px-5 py-2 rounded-xl text-white ss-btn-primary font-semibold">Kembali</a>
        </div>
    </div>
@endsection
