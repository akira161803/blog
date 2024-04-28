<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2  border border-transparent rounded-md font-semibold text-xs  uppercase tracking-widest bg-sky-500 shadow-sky-500/50 text-white hover:text-white hover:bg-sky-300 transition-colors duration-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out']) }}>
    {{ $slot }}
</button>
