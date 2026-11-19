@extends('layouts.app')

@section('title', 'Mesin & Peralatan')

@push('styles')
<style>
    h1 { margin: 0 0 16px; font-size: 24px; font-weight: bold; }
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
    .st-tersedia  { background: #d1fae5; color: #065f46; }
    .st-digunakan { background: #dbeafe; color: #1e40af; }
    .st-perawatan { background: #fef3c7; color: #92400e; }
    .st-rusak     { background: #fee2e2; color: #991b1b; }
</style>
@endpush

@section('content')
    <h1>Mesin & Peralatan</h1>

    @if (session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <div class="stats">
        <div class="stat"><b>{{ $total }}</b> Total mesin/peralatan</div>
        <div class="stat"><b>{{ $tersedia }}</b> Tersedia</div>
        <div class="stat"><b>{{ $bermasalah }}</b> Perawatan / rusak</div>
    </div>

    <div class="toolbar">
        <form action="{{ route('mesin.index') }}" method="GET">
            <input type="text" name="q" value="{{ $q }}" placeholder="Cari nama mesin...">
            <select name="status">
                <option value="">Semua status</option>
                @foreach (\App\Models\Mesin::STATUS as $val => $label)
                    <option value="{{ $val }}" {{ $status === $val ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn">Cari</button>
            @if ($q || $status)
                <a href="{{ route('mesin.index') }}" class="btn btn-secondary">Reset</a>
            @endif
        </form>
        <a href="{{ route('mesin.create') }}" class="btn">+ Tambah Mesin</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Jenis</th>
                <th>Kapasitas</th>
                <th>Status</th>
                <th>Perawatan Terakhir</th>
                <th>Catatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mesin as $m)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $m->nama_mesin }}</td>
                    <td>{{ \App\Models\Mesin::JENIS[$m->jenis] ?? $m->jenis }}</td>
                    <td>{{ $m->kapasitas_kg ? $m->kapasitas_kg . ' kg' : '-' }}</td>
                    <td>
                        <span class="badge st-{{ $m->status }}">
                            {{ \App\Models\Mesin::STATUS[$m->status] ?? $m->status }}
                        </span>
                    </td>
                    <td>{{ $m->perawatan_terakhir?->format('d M Y') ?? '-' }}</td>
                    <td>{{ $m->catatan ?? '-' }}</td>
                    <td>
                        <div class="aksi">
                            <a href="{{ route('mesin.edit', $m) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('mesin.destroy', $m) }}" method="POST"
                                  onsubmit="return confirm('Yakin hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="empty">
                        {{ ($q || $status) ? 'Tidak ada data yang cocok.' : 'Belum ada data mesin & peralatan.' }}
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection