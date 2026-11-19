@extends('layouts.app')

@section('title', 'Layanan & Tarif')

@push('styles')
<style>
    h1 { margin: 0 0 16px; font-size: 24px; font-weight: bold; }
    .stats { display: flex; gap: 12px; margin-bottom: 16px; flex-wrap: wrap; }
    .stat { background: #fff; padding: 12px 18px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,.1); }
    .stat b { display: block; font-size: 22px; }
    .toolbar { display: flex; gap: 8px; margin-bottom: 16px; flex-wrap: wrap; }
    .toolbar form { display: flex; gap: 8px; flex: 1; }
    .toolbar input[type=text] { flex: 1; padding: 8px 10px; border: 1px solid #ccc; border-radius: 6px; }
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
    .badge-on { background: #d1fae5; color: #065f46; }
    .badge-off { background: #e5e7eb; color: #374151; }
</style>
@endpush

@section('content')
    <h1>Layanan & Tarif</h1>

    @if (session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <div class="stats">
        <div class="stat"><b>{{ $total }}</b> Total layanan</div>
        <div class="stat"><b>{{ $aktif }}</b> Layanan aktif</div>
        <div class="stat"><b>Rp {{ number_format($termurah, 0, ',', '.') }}</b> Tarif termurah</div>
    </div>

    <div class="toolbar">
        <form action="{{ route('layanan.index') }}" method="GET">
            <input type="text" name="q" value="{{ $q }}" placeholder="Cari nama layanan...">
            <button type="submit" class="btn">Cari</button>
            @if ($q)
                <a href="{{ route('layanan.index') }}" class="btn btn-secondary">Reset</a>
            @endif
        </form>
        <a href="{{ route('layanan.create') }}" class="btn">+ Tambah Layanan</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Layanan</th>
                <th>Tarif</th>
                <th>Estimasi</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($layanan as $l)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $l->nama_layanan }}</td>
                    <td>Rp {{ number_format($l->tarif, 0, ',', '.') }} / {{ $l->satuan }}</td>
                    <td>{{ $l->estimasi_hari }} hari</td>
                    <td>{{ $l->deskripsi ?? '-' }}</td>
                    <td>
                        <span class="badge {{ $l->is_aktif ? 'badge-on' : 'badge-off' }}">
                            {{ $l->is_aktif ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </td>
                    <td>
                        <div class="aksi">
                            <a href="{{ route('layanan.edit', $l) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('layanan.destroy', $l) }}" method="POST"
                                  onsubmit="return confirm('Yakin hapus layanan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="empty">
                        {{ $q ? 'Tidak ada layanan yang cocok dengan pencarian.' : 'Belum ada data layanan.' }}
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection