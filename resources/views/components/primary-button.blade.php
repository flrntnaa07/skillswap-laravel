<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gradient-to-r from-cyan-400 via-sky-400 to-teal-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest shadow-[0_8px_24px_-6px_rgba(34,211,238,0.6)] hover:from-cyan-300 hover:to-teal-300 hover:shadow-[0_10px_28px_-6px_rgba(34,211,238,0.75)] focus:bg-cyan-300 active:bg-cyan-500 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:ring-offset-2 focus:ring-offset-[#00111F] transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
