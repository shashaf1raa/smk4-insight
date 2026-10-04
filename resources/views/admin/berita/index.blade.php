@extends('admin.layout')

@section('title', 'Kelola Berita')

@section('admin-content')
    <div class="admin-header-row">
        <div>
            <h1>Kelola Berita</h1>
            <p class="admin-subtitle">Tambah, edit, atau hapus berita yang tampil di halaman Berita/Artikel.</p>
        </div>
        <a href="{{ route('admin.berita.create') }}" class="btn btn-navy">+ Tambah Berita</a>
    </div>

    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($beritaList as $berita)
                    <tr>
                        <td>
                            <img src="{{ $berita->gambar ? asset('images/' . $berita->gambar) : 'https://placehold.co/80x60/e2e8f0/94a3b8?text=No+Img' }}" class="admin-thumb" alt="{{ $berita->judul }}">
                        </td>
                        <td>{{ $berita->judul }}</td>
                        <td><span class="badge-pill">{{ ucfirst($berita->kategori) }}</span></td>
                        <td>{{ $berita->tanggal->format('d M Y') }}</td>
                        <td class="admin-table-actions">
                            <a href="{{ route('admin.berita.edit', $berita) }}" class="btn btn-sm btn-navy">Edit</a>
                            <form method="POST" action="{{ route('admin.berita.destroy', $berita) }}" onsubmit="return confirm('Yakin mau hapus berita ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada berita. Klik "Tambah Berita" untuk mulai.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="admin-pagination">
        {{ $beritaList->links() }}
    </div>
@endsection