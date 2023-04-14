<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn bg-orange-500 hover:bg-orange-600 text-white whitespace-nowrap']) }}>
    {{ $slot }}
</button>
