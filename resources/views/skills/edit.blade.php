@extends('layouts.skillswap')

@section('content')
    <div class="px-6 py-8 max-w-2xl mx-auto w-full">
        <h1 class="text-2xl lg:text-3xl font-extrabold text-white">Edit Skill</h1>

        <form method="POST" action="{{ route('skills.update', $skill) }}" class="mt-6 ss-glass ss-card-hover rounded-2xl p-6 space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block font-medium text-sm text-white">Nama Skill</label>
                <input id="name" name="name" type="text" required
                       class="mt-1 w-full rounded-md border border-cyan-300/30 bg-white/5 px-3 py-2 text-white placeholder-cyan-200/40 focus:ring-2 focus:ring-cyan-300 focus:border-cyan-300 outline-none"
                       value="{{ old('name', $skill->name) }}">
                @error('name') <p class="mt-1 text-sm text-rose-300">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="category" class="block font-medium text-sm text-white">Kategori</label>
                <input id="category" name="category" type="text" required
                       class="mt-1 w-full rounded-md border border-cyan-300/30 bg-white/5 px-3 py-2 text-white placeholder-cyan-200/40 focus:ring-2 focus:ring-cyan-300 focus:border-cyan-300 outline-none"
                       value="{{ old('category', $skill->category) }}">
                @error('category') <p class="mt-1 text-sm text-rose-300">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block font-medium text-sm text-white mb-2">Jenis Skill</label>
                <div class="flex flex-col sm:flex-row gap-3">
                    <label class="flex items-center gap-3 ss-glass rounded-xl px-4 py-3 cursor-pointer border border-cyan-300/30 hover:border-cyan-300/60 transition has-[:checked]:border-cyan-300 has-[:checked]:bg-cyan-400/10">
                        <input type="radio" name="skill_type" value="owned" required {{ old('skill_type', $skill->skill_type) == 'owned' ? 'checked' : '' }} class="accent-cyan-400">
                        <div>
                            <div class="text-white font-semibold text-sm">Skill yang Saya Miliki</div>
                            <div class="text-cyan-200/60 text-xs">Saya bisa mengajarkan skill ini</div>
                        </div>
                    </label>
                    <label class="flex items-center gap-3 ss-glass rounded-xl px-4 py-3 cursor-pointer border border-cyan-300/30 hover:border-cyan-300/60 transition has-[:checked]:border-cyan-300 has-[:checked]:bg-cyan-400/10">
                        <input type="radio" name="skill_type" value="needed" required {{ old('skill_type', $skill->skill_type) == 'needed' ? 'checked' : '' }} class="accent-cyan-400">
                        <div>
                            <div class="text-white font-semibold text-sm">Skill yang Saya Butuhkan</div>
                            <div class="text-cyan-200/60 text-xs">Saya ingin mempelajari skill ini</div>
                        </div>
                    </label>
                </div>
                @error('skill_type') <p class="mt-1 text-sm text-rose-300">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="description" class="block font-medium text-sm text-white">Deskripsi</label>
                <textarea id="description" name="description" rows="4" required
                          class="mt-1 w-full rounded-md border border-cyan-300/30 bg-white/5 px-3 py-2 text-white placeholder-cyan-200/40 focus:ring-2 focus:ring-cyan-300 focus:border-cyan-300 outline-none">{{ old('description', $skill->description) }}</textarea>
                @error('description') <p class="mt-1 text-sm text-rose-300">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center justify-end gap-3">
                <a href="{{ route('skills.index') }}" class="text-sm text-cyan-200/80 hover:text-cyan-100">Batal</a>
                <button type="submit" class="px-5 py-2 rounded-xl text-white ss-btn-primary font-semibold">Perbarui</button>
            </div>
        </form>
    </div>
@endsection
