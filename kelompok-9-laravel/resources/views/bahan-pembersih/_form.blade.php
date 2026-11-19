@push('styles')
<style>
    main h1 { margin: 0 0 16px; font-size: 24px; font-weight: bold; }
    .card { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,.1); max-width: 600px; }
    .field { margin-bottom: 14px; }
    .field label { display: block; margin-bottom: 4px; font-weight: bold; font-size: 14px; }
    .field input[type=text], .field input[type=number], .field select, .field textarea {
        width: 100%; padding: 8px 10px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;
    }
    .row { display: flex; gap: 12px; }
    .row .field { flex: 1; }
    .error { color: #dc2626; font-size: 13px; margin-top: 4px; }
    .btn { padding: 8px 14px; border: none; border-radius: 6px; cursor: pointer; text-decoration: none; font-size: 14px; color: #fff; background: #4f46e5; display: inline-block; }
    .btn-secondary { background: #6b7280; }
</style>
@endpush

@csrf

<div class="field">
    <label for="nama_bahan">Nama Bahan</label>
    <input type="text" id="nama_bahan" name="nama_bahan"
           value="{{ old('nama_bahan', $bahan->nama_bahan ?? '') }}">
    @error('nama_bahan') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="row">
    <div class="field">
        <label for="jenis">Jenis</label>
        <select id="jenis" name="jenis">
            @foreach (\App\Models\BahanPembersih::JENIS as $val => $label)
                <option value="{{ $val }}"
                    {{ old('jenis', $bahan->jenis ?? 'deterjen') === $val ? 'selected' : '' }}>
                    {{ $label }}
                </option>
            @endforeach
        </select>
        @error('jenis') <div class="error">{{ $message }}</div> @enderror
    </div>

    <div class="field">
        <label for="satuan">Satuan</label>
        <select id="satuan" name="satuan">
            @foreach (\App\Models\BahanPembersih::SATUAN as $val => $label)
                <option value="{{ $val }}"
                    {{ old('satuan', $bahan->satuan ?? 'liter') === $val ? 'selected' : '' }}>
                    {{ $label }}
                </option>
            @endforeach
        </select>
        @error('satuan') <div class="error">{{ $message }}</div> @enderror
    </div>
</div>

<div class="row">
    <div class="field">
        <label for="stok">Stok</label>
        <input type="number" step="0.01" min="0" id="stok" name="stok"
               value="{{ old('stok', isset($bahan) ? (float) $bahan->stok : 0) }}">
        @error('stok') <div class="error">{{ $message }}</div> @enderror
    </div>

    <div class="field">
        <label for="stok_minimum">Stok Minimum</label>
        <input type="number" step="0.01" min="0" id="stok_minimum" name="stok_minimum"
               value="{{ old('stok_minimum', isset($bahan) ? (float) $bahan->stok_minimum : 0) }}">
        @error('stok_minimum') <div class="error">{{ $message }}</div> @enderror
    </div>
</div>

<div class="field">
    <label for="harga_satuan">Harga Satuan (Rp)</label>
    <input type="number" min="0" id="harga_satuan" name="harga_satuan"
           value="{{ old('harga_satuan', $bahan->harga_satuan ?? 0) }}">
    @error('harga_satuan') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="field">
    <label for="catatan">Catatan</label>
    <textarea id="catatan" name="catatan" rows="3">{{ old('catatan', $bahan->catatan ?? '') }}</textarea>
    @error('catatan') <div class="error">{{ $message }}</div> @enderror
</div>

<button type="submit" class="btn">Simpan</button>
<a href="{{ route('bahan-pembersih.index') }}" class="btn btn-secondary">Batal</a>