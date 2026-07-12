<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gradient-to-r from-rose-600 via-orange-500 to-rose-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest shadow-[0_8px_24px_-6px_rgba(251,113,133,0.5)] hover:from-rose-500 hover:to-orange-400 hover:shadow-[0_10px_28px_-6px_rgba(251,113,133,0.65)] focus:bg-rose-500 active:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-rose-400 focus:ring-offset-2 focus:ring-offset-[#00111F] transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
