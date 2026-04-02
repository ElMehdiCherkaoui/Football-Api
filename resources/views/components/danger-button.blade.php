<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center rounded-xl px-4 py-2 text-sm font-semibold text-white bg-rose-600 hover:bg-rose-500 active:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-rose-400 focus:ring-offset-2 transition']) }}>
    {{ $slot }}
</button>
