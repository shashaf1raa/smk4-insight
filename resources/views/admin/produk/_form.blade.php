@php
    $p = $produk ?? null;
@endphp

<div class="form-group">
    <label for="judul">Judul Karya</label>
    <input type="text" name="judul" id="judul" value="{{ old('judul', $p->judul ?? '') }}" required>
</div>

<div class="form-row">
    <div class="form-group">
        <label for="jurusan">Jurusan</label>
        <select name="jurusan" id="jurusan" required>
            @foreach (['PPLG', 'TJKT', 'TKRO', 'TPFL'] as $j)
                <option value="{{ $j }}" {{ old('jurusan', $p->jurusan ?? '') === $j ? 'selected' : '' }}>{{ $j }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="harga">Harga (Rp)</label>
        <input type="number" name="harga" id="harga" value="{{ old('harga', $p->harga ?? 0) }}" min="0" required>
    </div>
</div>

<div class="form-group">
    <label for="siswa">Nama Tim / Siswa</label>
    <input type="text" name="siswa" id="siswa" value="{{ old('siswa', $p->siswa ?? '') }}" placeholder="Misal: Tim PPLG Kelas XII">
</div>

<div class="form-group">
    <label for="deskripsi">Deskripsi</label>
    <textarea name="deskripsi" id="deskripsi" rows="4">{{ old('deskripsi', $p->deskripsi ?? '') }}</textarea>
</div>

<div class="form-group">
    <label for="foto">Foto Produk</label>
    <input type="file" name="foto" id="foto" accept="image/*">
    @if ($p && $p->foto)
        <div class="admin-current-img">
            <span>Foto saat ini:</span>
            <img src="{{ asset('images/' . $p->foto) }}" alt="{{ $p->judul }}">
        </div>
    @endif
</div>