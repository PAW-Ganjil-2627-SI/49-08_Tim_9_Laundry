@push('styles')
<style>
    h1 { margin: 0 0 16px; font-size: 24px; font-weight: bold; }
    .card { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,.1); max-width: 600px; }
    .field { margin-bottom: 14px; }
    .field label { display: block; margin-bottom: 4px; font-weight: bold; font-size: 14px; }
    .field input[type=text], .field input[type=number], .field select, .field textarea {
        width: 100%; padding: 8px 10px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;
    }
    .error { color: #dc2626; font-size: 13px; margin-top: 4px; }
    .btn { padding: 8px 14px; border: none; border-radius: 6px; cursor: pointer; text-decoration: none; font-size: 14px; color: #fff; background: #4f46e5; display: inline-block; }
    .btn-secondary { background: #6b7280; }
</style>
@endpush

@csrf

<div class="field">
    <label for="nama_layanan">Nama Layanan</label>
    <input type="text" id="nama_layanan" name="nama_layanan"
           value="{{ old('nama_layanan', $layanan->nama_layanan ?? '') }}">
    @error('nama_layanan') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="field">
    <label for="tarif">Tarif (Rp)</label>
    <input type="number" id="tarif" name="tarif" min="0"
           value="{{ old('tarif', $layanan->tarif ?? '') }}">
    @error('tarif') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="field">
    <label for="satuan">Satuan</label>
    <select id="satuan" name="satuan">
        @foreach (['kg' => 'Per Kg', 'pcs' => 'Per Pcs', 'm2' => 'Per m²'] as $val => $label)
            <option value="{{ $val }}"
                {{ old('satuan', $layanan->satuan ?? 'kg') === $val ? 'selected' : '' }}>
                {{ $label }}
            </option>
        @endforeach
    </select>
    @error('satuan') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="field">
    <label for="estimasi_hari">Estimasi Selesai (hari)</label>
    <input type="number" id="estimasi_hari" name="estimasi_hari" min="0" max="30"
           value="{{ old('estimasi_hari', $layanan->estimasi_hari ?? 2) }}">
    @error('estimasi_hari') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="field">
    <label for="deskripsi">Deskripsi</label>
    <textarea id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', $layanan->deskripsi ?? '') }}</textarea>
    @error('deskripsi') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="field">
    <label>
        <input type="checkbox" name="is_aktif" value="1"
               {{ old('is_aktif', $layanan->is_aktif ?? true) ? 'checked' : '' }}>
        Layanan aktif
    </label>
</div>

<button type="submit" class="btn">Simpan</button>
<a href="{{ route('layanan.index') }}" class="btn btn-secondary">Batal</a>