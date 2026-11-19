@extends('layouts.app')

@section('title', 'Bahan Pembersih')

@push('styles')
<style>
    main h1 { margin: 0 0 16px; font-size: 24px; font-weight: bold; }
    .stats { display: flex; gap: 12px; margin-bottom: 16px; flex-wrap: wrap; }
    .stat { background: #fff; padding: 12px 18px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,.1); }
    .stat b { display: block; font-size: 22px; }
    .toolbar { display: flex; gap: 8px; margin-bottom: 16px; flex-wrap: wrap; }
    .toolbar form { display: flex; gap: 8px; flex: 1; }
    .toolbar input[type=text], .toolbar select { padding: 8px 10px; border: 1px solid #ccc; border-radius: 6px; }
    .toolbar input[type=text] { flex: 1; }
    .btn { padding: 8px 14px; border: none; border-radius: 6px; cursor: pointer; text-decoration: none; font-size: 14px; color: #fff; background: #4f46e5; display: inline-block; }
    .btn-warning { background: #f59e0b; }
    .btn-danger { background: #dc2626; }
    .btn-secondary { background: #6b7280; }
    .alert { background: #d1fae5; color: #065f46; padding: 10px 14px; border-radius: 6px; margin-bottom: 16px; }
    table { width: 100%; border-collapse: collapse; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,.1); }
    th, td { padding: 10px 12px; text-align: left; border-bottom: 1px solid #eee; vertical-align: top; }
    th { background: #eef0f6; }
    .aksi { display: flex; gap: 6px; }
    .empty { text-align: center; color: #888; padding: 24px; }
    .badge { padding: 2px 8px; border-radius: 999px; font-size: 12px; }
    .st-aman { background: #d1fae5; color: #065f46; }
    .st-menipis { background: #fef3c7; color: #92400e; }
    .st-habis { background: #fee2e2; color: #991b1b; }
</style>
@endpush

@section('content')
    <h1>Bahan Pembersih</h1>

    @if (session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <div class="stats">
        <div class="stat"><b>{{ $total }}</b> Total bahan</div>
        <div class="stat"><b>{{ $menipis }}</b> Stok menipis</div>
        <div class="stat"><b>{{ $habis }}</b> Stok habis</div>
    </div>

    <div class="toolbar">
        <form action="{{ route('bahan-pembersih.index') }}" method="GET">
            <input type="text" name="q" value="{{ $q }}" placeholder="Cari nama bahan...">
            <select name="jenis">
                <option value="">Semua jenis</option>
                @foreach (\App\Models\BahanPembersih::JENIS as $val => $label)
                    <option value="{{ $val }}" {{ $jenis === $val ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn">Cari</button>
            @if ($q || $jenis)
                <a href="{{ route('bahan-pembersih.index') }}" class="btn btn-secondary">Reset</a>
            @endif
        </form>
        <a href="{{ route('bahan-pembersih.create') }}" class="btn">+ Tambah Bahan</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Bahan</th>
                <th>Jenis</th>
                <th>Stok</th>
                <th>Stok Min.</th>
                <th>Harga Satuan</th>
                <th>Status</th>
                <th>Catatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($bahan as $b)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $b->nama_bahan }}</td>
                    <td>{{ \App\Models\BahanPembersih::JENIS[$b->jenis] ?? $b->jenis }}</td>
                    <td>{{ (float) $b->stok }} {{ $b->satuan }}</td>
                    <td>{{ (float) $b->stok_minimum }} {{ $b->satuan }}</td>
                    <td>Rp {{ number_format($b->harga_satuan, 0, ',', '.') }}</td>
                    <td>
                        @if ($b->stok <= 0)
                            <span class="badge st-habis">Habis</span>
                        @elseif ($b->is_menipis)
                            <span class="badge st-menipis">Menipis</span>
                        @else
                            <span class="badge st-aman">Aman</span>
                        @endif
                    </td>
                    <td>{{ $b->catatan ?? '-' }}</td>
                    <td>
                        <div class="aksi">
                            <a href="{{ route('bahan-pembersih.edit', $b) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('bahan-pembersih.destroy', $b) }}" method="POST"
                                  onsubmit="return confirm('Yakin hapus bahan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="empty">
                        {{ ($q || $jenis) ? 'Tidak ada data yang cocok.' : 'Belum ada data bahan pembersih.' }}
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection