@extends('admin.layout')

@section('title', 'Kelola Produk & Karya')

@section('admin-content')
    <div class="admin-header-row">
        <div>
            <h1>Kelola Produk & Karya</h1>
            <p class="admin-subtitle">Tambah, edit, atau hapus karya siswa yang tampil di halaman Produk & Karya Siswa.</p>
        </div>
        <a href="{{ route('admin.produk.create') }}" class="btn btn-navy">+ Tambah Produk</a>
    </div>

    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Judul</th>
                    <th>Jurusan</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($produkList as $produk)
                    <tr>
                        <td>
                            <img src="{{ $produk->foto ? asset('images/' . $produk->foto) : 'https://placehold.co/80x60/e2e8f0/94a3b8?text=No+Img' }}" class="admin-thumb" alt="{{ $produk->judul }}">
                        </td>
                        <td>{{ $produk->judul }}</td>
                        <td><span class="badge-pill">{{ $produk->jurusan }}</span></td>
                        <td>Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                        <td class="admin-table-actions">
                            <a href="{{ route('admin.produk.edit', $produk) }}" class="btn btn-sm btn-navy">Edit</a>
                            <form method="POST" action="{{ route('admin.produk.destroy', $produk) }}" onsubmit="return confirm('Yakin mau hapus produk ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada produk. Klik "Tambah Produk" untuk mulai.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="admin-pagination">
        {{ $produkList->links() }}
    </div>
@endsection