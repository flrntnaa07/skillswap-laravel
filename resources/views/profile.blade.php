@extends('layouts.skillswap')

@section('content')
    <div class="px-6 py-8 max-w-5xl mx-auto w-full">

        <!-- Profile header -->
        <div class="ss-glass ss-card-hover rounded-2xl overflow-hidden ss-animate-fade-up">
            <div class="h-28 ss-gradient-bg"></div>
            <div class="px-6 pb-6">
                <div class="-mt-10 flex items-end gap-4">
                    <div class="h-20 w-20 rounded-2xl ss-gradient-bg flex items-center justify-center text-white text-3xl font-bold border-4 border-[#002B4F] shadow">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div class="pb-1 flex-1">
                        <h1 class="text-2xl font-extrabold text-white">{{ Auth::user()->name }}</h1>
                        <p class="text-cyan-200/70 text-sm">{{ Auth::user()->email }}</p>
                    </div>
                    <a href="{{ route('profile.edit') }}"
                       class="mb-1 px-5 py-2 rounded-xl font-semibold text-white ss-btn-primary">
                        Edit Profil
                    </a>
                </div>
                <p class="mt-4 text-cyan-100/80">
                    Anggota SkillSwap yang suka berbagi keahlian dan belajar hal baru dari komunitas.
                </p>
                <div class="mt-4 flex flex-wrap gap-6">
                    <div><span class="font-extrabold text-lg ss-gradient-text">{{ $ownedCount }}</span> <span class="text-cyan-200/70 text-sm">Keahlian</span></div>
                    <div><span class="font-extrabold text-lg ss-gradient-text">{{ $neededCount }}</span> <span class="text-cyan-200/70 text-sm">Skill Dicari</span></div>
                    <div><span class="font-extrabold text-lg ss-gradient-text">128</span> <span class="text-cyan-200/70 text-sm">Pengikut</span></div>
                    <div><span class="font-extrabold text-lg ss-gradient-text">42</span> <span class="text-cyan-200/70 text-sm">Diikuti</span></div>
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <div class="mt-6 flex gap-2 ss-stagger" id="ss-profile-tabs">
            <button data-profile-tab="overview" class="ss-gradient-bg text-white shadow px-5 py-2 rounded-xl text-sm font-semibold">Ringkasan</button>
            <button data-profile-tab="skills" class="text-cyan-100 hover:text-white px-5 py-2 rounded-xl text-sm font-semibold">Skill</button>
            <button data-profile-tab="activity" class="text-cyan-100 hover:text-white px-5 py-2 rounded-xl text-sm font-semibold">Aktivitas</button>
        </div>

        <!-- Panels -->
        <div class="mt-6">
            <!-- Overview -->
            <div data-profile-panel="overview" class="grid md:grid-cols-2 gap-6 ss-stagger">
                <div class="ss-glass ss-card-hover rounded-2xl p-6">
                    <h3 class="font-bold mb-3 text-white">Tentang</h3>
                    <p class="text-sm text-cyan-100/80">Saya antusias mempelajari teknologi baru dan berbagi pengetahuan desain serta pemrograman dengan anggota SkillSwap lainnya.</p>
                </div>
                <div class="ss-glass ss-card-hover rounded-2xl p-6">
                    <h3 class="font-bold mb-3 text-white">Bahasa</h3>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full bg-cyan-400/15 text-cyan-200 text-xs font-medium">Indonesia</span>
                        <span class="px-3 py-1 rounded-full bg-sky-400/15 text-sky-200 text-xs font-medium">English</span>
                        <span class="px-3 py-1 rounded-full bg-teal-400/15 text-teal-200 text-xs font-medium">Jawa</span>
                    </div>
                </div>
            </div>

            <!-- Skills -->
            <div data-profile-panel="skills" class="hidden grid md:grid-cols-2 gap-6 ss-stagger">
                <!-- Keahlian Saya -->
                <div class="md:col-span-2">
                    <h3 class="text-lg font-bold text-white mb-3">Keahlian Saya</h3>
                    @if($ownedSkills->count() > 0)
                        <div class="grid sm:grid-cols-2 gap-4">
                            @foreach ($ownedSkills as $skill)
                                <div class="ss-glass ss-card-hover rounded-2xl p-5 flex items-center gap-3">
                                    <div class="h-11 w-11 rounded-xl ss-gradient-bg flex items-center justify-center text-white font-bold">
                                        {{ substr($skill->name, 0, 1) }}
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="font-semibold truncate text-white">{{ $skill->name }}</div>
                                        <div class="text-xs text-cyan-200/70 capitalize">{{ $skill->category }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="ss-glass ss-card-hover rounded-2xl p-6 text-center text-cyan-200/60">
                            Belum ada keahlian yang ditambahkan.
                            <a href="{{ route('skills.create') }}" class="text-cyan-300 font-semibold">Tambah skill</a>.
                        </div>
                    @endif
                </div>

                <!-- Skill yang Saya Cari -->
                <div class="md:col-span-2">
                    <h3 class="text-lg font-bold text-white mb-3">Skill yang Saya Cari</h3>
                    @if($neededSkills->count() > 0)
                        <div class="grid sm:grid-cols-2 gap-4">
                            @foreach ($neededSkills as $skill)
                                <div class="ss-glass ss-card-hover rounded-2xl p-5 flex items-center gap-3">
                                    <div class="h-11 w-11 rounded-xl ss-gradient-bg flex items-center justify-center text-white font-bold">
                                        {{ substr($skill->name, 0, 1) }}
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="font-semibold truncate text-white">{{ $skill->name }}</div>
                                        <div class="text-xs text-cyan-200/70 capitalize">{{ $skill->category }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="ss-glass ss-card-hover rounded-2xl p-6 text-center text-cyan-200/60">
                            Belum ada skill yang sedang dicari.
                            <a href="{{ route('skills.create') }}" class="text-cyan-300 font-semibold">Tambah skill</a>.
                        </div>
                    @endif
                </div>
            </div>

            <!-- Activity -->
            <div data-profile-panel="activity" class="hidden ss-glass ss-card-hover rounded-2xl p-6 ss-stagger">
                <div class="space-y-4">
                    <div class="flex gap-3 items-start">
                        <div class="h-9 w-9 rounded-full bg-cyan-400/20 text-cyan-200 flex items-center justify-center shrink-0">★</div>
                        <div><div class="font-medium text-sm text-white">Menyelesaikan pertukaran skill</div><div class="text-xs text-cyan-200/60">2 hari lalu</div></div>
                    </div>
                    <div class="flex gap-3 items-start">
                        <div class="h-9 w-9 rounded-full bg-sky-400/20 text-sky-200 flex items-center justify-center shrink-0">+</div>
                        <div><div class="font-medium text-sm text-white">Menambah skill baru</div><div class="text-xs text-cyan-200/60">5 hari lalu</div></div>
                    </div>
                    <div class="flex gap-3 items-start">
                        <div class="h-9 w-9 rounded-full bg-teal-400/20 text-teal-200 flex items-center justify-center shrink-0">💬</div>
                        <div><div class="font-medium text-sm text-white">Memulai obrolan dengan Ana</div><div class="text-xs text-cyan-200/60">1 minggu lalu</div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
