@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border border-cyan-300/30 bg-white/5 text-white placeholder-cyan-200/40 focus:border-cyan-300 focus:ring-2 focus:ring-cyan-300 rounded-md shadow-sm']) }}>
