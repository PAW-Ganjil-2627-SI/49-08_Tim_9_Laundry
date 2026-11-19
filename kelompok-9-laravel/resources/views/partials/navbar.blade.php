@php
    $menu = [
        ['label' => 'Layanan Laundry',   'route' => 'layanan.index',         'match' => 'layanan.*'],
        ['label' => 'Mesin & Peralatan', 'route' => 'mesin.index',           'match' => 'mesin.*'],
        ['label' => 'Data Pelanggan',    'route' => 'pelanggan.index',       'match' => 'pelanggan.*'],
        ['label' => 'Bahan Pembersih',   'route' => 'bahan-pembersih.index', 'match' => 'bahan-pembersih.*'],
    ];
@endphp

<nav class="bg-blue-600 text-white shadow">
    <div class="max-w-6xl mx-auto px-6 flex items-center justify-between h-14">
        <a href="/" class="font-bold text-lg">Laundry</a>

        <ul class="flex gap-6 text-sm">
            @foreach ($menu as $m)
                <li>
                    @if (Route::has($m['route']))
                        <a href="{{ route($m['route']) }}"
                           class="{{ request()->routeIs($m['match']) ? 'font-bold underline' : 'hover:underline' }}">
                            {{ $m['label'] }}
                        </a>
                    @else
                        <span class="opacity-50 cursor-not-allowed" title="Belum tersedia">{{ $m['label'] }}</span>
                    @endif
                </li>
            @endforeach
        </ul>

        @auth
            <div class="flex items-center gap-3 text-sm">
                <span>{{ auth()->user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-white text-blue-600 px-3 py-1 rounded hover:bg-gray-100">
                        Logout
                    </button>
                </form>
            </div>
        @endauth
    </div>
</nav>