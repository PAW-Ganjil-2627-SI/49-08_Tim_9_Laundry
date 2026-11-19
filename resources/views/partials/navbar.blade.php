<nav class="bg-blue-600 text-white shadow">
    <div class="max-w-6xl mx-auto px-6 flex items-center justify-between h-14">
        <a href="/" class="font-bold text-lg">Laundry</a>

        <ul class="flex gap-6 text-sm">
            <li>
                <a href="/layanan"
                   class="{{ request()->is('layanan*') ? 'font-bold underline' : 'hover:underline' }}">
                    Layanan Laundry
                </a>
            </li>
            <li>
                <a href="/mesin"
                   class="{{ request()->is('mesin*') ? 'font-bold underline' : 'hover:underline' }}">
                    Mesin & Peralatan
                </a>
            </li>
            <li>
                <a href="{{ route('pelanggan.index') }}"
                   class="{{ request()->routeIs('pelanggan.*') ? 'font-bold underline' : 'hover:underline' }}">
                    Data Pelanggan
                </a>
            </li>
            <li>
                <a href="/bahan"
                   class="{{ request()->is('bahan*') ? 'font-bold underline' : 'hover:underline' }}">
                    Bahan Pembersih
                </a>
            </li>
        </ul>
    </div>
</nav>