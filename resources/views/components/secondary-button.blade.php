<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-white/5 border border-cyan-300/30 rounded-md font-semibold text-xs text-cyan-100 uppercase tracking-widest shadow-sm hover:bg-white/10 hover:border-cyan-300/50 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:ring-offset-2 focus:ring-offset-[#00111F] disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
