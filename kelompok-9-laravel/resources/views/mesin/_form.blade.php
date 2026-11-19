@push('styles')
<style>
    h1 { margin: 0 0 16px; font-size: 24px; font-weight: bold; }
    .card { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,.1); max-width: 600px; }
    .field { margin-bottom: 14px; }
    .field label { display: block; margin-bottom: 4px; font-weight: bold; font-size: 14px; }
    .field input[type=text], .field input[type=number], .field input[type=date], .field select, .field textarea {
        width: 100%; padding: 8px 10px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;
    }
    .error { color: #dc2626; font-size: 13px; margin-top: 4px; }
    .btn { padding: 8px 14px; border: none; border-radius: 6px; cursor: pointer; text-decoration: none; font-size: 14px; color: #fff; background: #4f46e5; display: inline-block; }
    .btn-secondary { background: #6b7280; }
</style>
@endpush

@csrf

<div class="field">
    <label for="nama_mesin">Nama Mesin / Peralatan</label>
    <input type="text" id="nama_mesin" name="nama_mesin"
           value="{{ old('nama_mesin', $mesin->nama_mesin ?? '') }}">
    @error('nama_mesin') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="field">
    <label for="jenis">Jenis</label>
    <select id="jenis" name="jenis">
        @foreach (\App\Models\Mesin::JENIS as $val => $label)
            <option value="{{ $val }}"
                {{ old('jenis', $mesin->jenis ?? 'mesin_cuci') === $val ? 'selected' : '' }}>
                {{ $label }}
            </option>
        @endforeach
    </select>
    @error('jenis') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="field">
    <label for="kapasitas_kg">Kapasitas (kg)</label>
    <input type="number" id="kapasitas_kg" name="kapasitas_kg" min="0"
           value="{{ old('kapasitas_kg', $mesin->kapasitas_kg ?? '') }}">
    @error('kapasitas_kg') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="field">
    <label for="status">Status</label>
    <select id="status" name="status">
        @foreach (\App\Models\Mesin::STATUS as $val => $label)
            <option value="{{ $val }}"
                {{ old('status', $mesin->status ?? 'tersedia') === $val ? 'selected' : '' }}>
                {{ $label }}
            </option>
        @endforeach
    </select>
    @error('status') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="field">
    <label for="perawatan_terakhir">Perawatan Terakhir</label>
    <input type="date" id="perawatan_terakhir" name="perawatan_terakhir"
           value="{{ old('perawatan_terakhir', isset($mesin) ? $mesin->perawatan_terakhir?->format('Y-m-d') : '') }}">
    @error('perawatan_terakhir') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="field">
    <label for="catatan">Catatan</label>
    <textarea id="catatan" name="catatan" rows="3">{{ old('catatan', $mesin->catatan ?? '') }}</textarea>
    @error('catatan') <div class="error">{{ $message }}</div> @enderror
</div>

<button type="submit" class="btn">Simpan</button>
<a href="{{ route('mesin.index') }}" class="btn btn-secondary">Batal</a>