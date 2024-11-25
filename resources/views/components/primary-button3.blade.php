<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center flex justify-center px-2 py-1 bg-red-600 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-cyan-500 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
