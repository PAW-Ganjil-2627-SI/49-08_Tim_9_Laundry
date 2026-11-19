<div class="form-group">
    <label>Nama</label>
    <input type="text" name="nama" value="{{ old('nama', $pelanggan->nama ?? '') }}">
</div>
<div class="form-group">
    <label>Alamat</label>
    <textarea name="alamat">{{ old('alamat', $pelanggan->alamat ?? '') }}</textarea>
</div>
<div class="form-group">
    <label>No. Telepon</label>
    <input type="text" name="no_telepon" value="{{ old('no_telepon', $pelanggan->no_telepon ?? '') }}">
</div>
<div class="form-group">
    <label>Catatan Khusus Pakaian</label>
    <textarea name="catatan_khusus">{{ old('catatan_khusus', $pelanggan->catatan_khusus ?? '') }}</textarea>
</div>