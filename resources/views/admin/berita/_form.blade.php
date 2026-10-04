@php
    $b = $berita ?? null;
@endphp

<div class="form-group">
    <label for="judul">Judul Berita</label>
    <input type="text" name="judul" id="judul" value="{{ old('judul', $b->judul ?? '') }}" required>
</div>

<div class="form-row">
    <div class="form-group">
        <label for="kategori">Kategori</label>
        <select name="kategori" id="kategori" required>
            @foreach (['kegiatan' => 'Kegiatan', 'prestasi' => 'Prestasi', 'pengumuman' => 'Pengumuman'] as $value => $label)
                <option value="{{ $value }}" {{ old('kategori', $b->kategori ?? '') === $value ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="tanggal">Tanggal</label>
        <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', $b && $b->tanggal ? $b->tanggal->format('Y-m-d') : '') }}" required>
    </div>
</div>

<div class="form-group">
    <label for="ringkasan">Ringkasan Singkat</label>
    <textarea name="ringkasan" id="ringkasan" rows="2">{{ old('ringkasan', $b->ringkasan ?? '') }}</textarea>
</div>

<div class="form-group">
    <label for="isi">Isi Berita Lengkap (opsional)</label>
    <textarea name="isi" id="isi" rows="6">{{ old('isi', $b->isi ?? '') }}</textarea>
</div>

<div class="form-group">
    <label for="gambar">Foto Berita</label>
    <input type="file" name="gambar" id="gambar" accept="image/*">
    @if ($b && $b->gambar)
        <div class="admin-current-img">
            <span>Foto saat ini:</span>
            <img src="{{ asset('images/' . $b->gambar) }}" alt="{{ $b->judul }}">
        </div>
    @endif
</div>