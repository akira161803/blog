<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest shadow-sm  focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 bg-sky-500 shadow-sky-500/50 text-white hover:text-white hover:bg-sky-300 transition-colors duration-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
