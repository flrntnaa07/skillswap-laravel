@extends('layouts.skillswap')

@section('content')
    <div class="px-4 py-6 max-w-7xl mx-auto w-full h-full">
        <div class="ss-glass ss-card-hover rounded-2xl overflow-hidden flex flex-col h-[calc(100vh-7rem)]">

            <div class="grid grid-cols-1 md:grid-cols-[320px_1fr] flex-1 min-h-0">

                <!-- Conversation list -->
                <div class="border-r border-cyan-300/15 flex flex-col min-h-0">
                    <div class="px-5 py-4 border-b border-cyan-300/15">
                        <h2 class="font-bold text-lg text-white">Obrolan</h2>
                        <p class="text-xs text-cyan-200/60">Diskusikan pertukaran skillmu</p>
                    </div>
                    <div class="overflow-y-auto ss-scroll flex-1">
                        @php
                            $people = [
                                ['id' => 'ana', 'name' => 'Ana Pratiwi', 'initial' => 'A', 'status' => 'Online', 'cat' => 'Desain UI'],
                                ['id' => 'budi', 'name' => 'Budi Santoso', 'initial' => 'B', 'status' => 'Online', 'cat' => 'Laravel'],
                                ['id' => 'citra', 'name' => 'Citra Dewi', 'initial' => 'C', 'status' => 'Terakhir dilihat 2j', 'cat' => 'Piano'],
                                ['id' => 'dodi', 'name' => 'Dodi Pranata', 'initial' => 'D', 'status' => 'Online', 'cat' => 'Public Speaking'],
                            ];
                        @endphp

                        @foreach ($people as $p)
                            <button data-chat-id="{{ $p['id'] }}"
                                    data-name="{{ $p['name'] }}"
                                    data-initial="{{ $p['initial'] }}"
                                    data-status="{{ $p['status'] }}"
                                    class="w-full text-left px-4 py-3 flex items-center gap-3 border-b border-cyan-300/10 hover:bg-cyan-400/10 transition
                                           {{ $loop->first ? 'bg-cyan-400/10 border-cyan-300/30' : '' }}">
                                <div class="relative">
                                    <div class="h-11 w-11 rounded-full ss-gradient-bg flex items-center justify-center text-white font-semibold">
                                        {{ $p['initial'] }}
                                    </div>
                                    @if ($p['status'] === 'Online')
                                        <span class="absolute bottom-0 right-0 h-3 w-3 rounded-full bg-emerald-400 border-2 border-[#002B4F]"></span>
                                    @endif
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="font-semibold truncate text-white">{{ $p['name'] }}</div>
                                    <div class="text-xs text-cyan-200/60 truncate">Menawarkan: {{ $p['cat'] }}</div>
                                </div>
                            </button>
                        @endforeach
                    </div>
                </div>

                <!-- Chat window -->
                <div class="flex flex-col min-h-0">
                    <div class="px-5 py-4 border-b border-cyan-300/15 flex items-center gap-3">
                        <div id="ss-chat-avatar" class="h-10 w-10 rounded-full ss-gradient-bg flex items-center justify-center text-white font-semibold">A</div>
                        <div>
                            <div id="ss-chat-name" class="font-bold text-white">Ana Pratiwi</div>
                            <div id="ss-chat-status" class="text-xs text-emerald-300">Online</div>
                        </div>
                    </div>

                    <div id="ss-chat-messages" class="flex-1 overflow-y-auto ss-scroll px-5 py-4 space-y-3 bg-cyan-900/10">
                        @foreach ($people as $p)
                            <div data-chat-window="{{ $p['id'] }}" class="{{ $loop->first ? '' : 'hidden' }}">
                                <div class="flex justify-start mb-3">
                                    <div class="max-w-[75%] rounded-2xl rounded-bl-sm bg-cyan-400/10 border border-cyan-300/20 px-4 py-2 text-cyan-50 text-sm shadow-sm">
                                        Halo! Aku punya skill <b>{{ $p['cat'] }}</b>. Tertarik tukar?
                                    </div>
                                </div>
                                <div class="flex justify-end mb-3">
                                    <div class="max-w-[75%] rounded-2xl rounded-br-sm ss-gradient-bg px-4 py-2 text-white text-sm shadow">
                                        Hai! Seru nih, aku mau belajar {{ $p['cat'] }}.
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Composer -->
                    <form id="ss-chat-form" class="px-4 py-3 border-t border-cyan-300/15 flex items-center gap-3">
                        <input id="ss-chat-input" type="text" placeholder="Tulis pesan..."
                               class="flex-1 px-4 py-3 rounded-xl border border-cyan-300/30 bg-white/5 text-white placeholder-cyan-200/50 focus:ring-2 focus:ring-cyan-300 focus:border-cyan-300 outline-none">
                        <button type="submit"
                                class="h-11 w-11 rounded-xl text-white ss-btn-primary flex items-center justify-center shrink-0">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
