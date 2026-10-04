@extends('admin.layout')

@section('title', 'Pesan Kontak')

@section('admin-content')
    <div class="admin-header-row">
        <div>
            <h1>Pesan Kontak</h1>
            <p class="admin-subtitle">Kelola pesan masuk dari pengunjung website.</p>
        </div>
        <div class="admin-stat-pills">
            <span class="stat-pill stat-pill-unread">● {{ $totalUnread }} Belum Dibaca</span>
            <span class="stat-pill stat-pill-total">● {{ $totalPesan }} Total</span>
        </div>
    </div>

    <div class="admin-filter-tabs">
        <a href="{{ route('admin.pesan.index') }}" class="filter-tab {{ $status === 'semua' ? 'active' : '' }}">Semua</a>
        <a href="{{ route('admin.pesan.index', ['status' => 'unread']) }}" class="filter-tab {{ $status === 'unread' ? 'active' : '' }}">Belum Dibaca</a>
        <a href="{{ route('admin.pesan.index', ['status' => 'read']) }}" class="filter-tab {{ $status === 'read' ? 'active' : '' }}">Sudah Dibaca</a>
    </div>

    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Pengirim</th>
                    <th>Subjek</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pesanList as $pesan)
                    <tr>
                        <td>
                            <div class="admin-sender">
                                <div class="admin-sender-avatar">{{ strtoupper(substr($pesan->nama, 0, 2)) }}</div>
                                <div>
                                    <strong>{{ $pesan->nama }}</strong>
                                    <span>{{ $pesan->email }}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="admin-subjek">{{ $pesan->subjek ?: '(tanpa subjek)' }}</div>
                            @if ($pesan->kategori)
                                <span class="badge-pill" style="margin: 4px 0; display: inline-block;">{{ $pesan->kategori }}</span>
                            @endif
                            <div class="admin-preview">{{ \Illuminate\Support\Str::limit($pesan->pesan, 60) }}</div>
                        </td>
                        <td>{{ $pesan->created_at->format('d M Y') }}<br><span class="admin-time">{{ $pesan->created_at->format('H:i') }}</span></td>
                        <td>
                            @if ($pesan->dibaca)
                                <span class="status-badge status-read">Read</span>
                            @else
                                <span class="status-badge status-unread">Unread</span>
                            @endif
                        </td>
                        <td class="admin-table-actions">
                            <a href="{{ route('admin.pesan.show', $pesan) }}" class="btn btn-sm btn-navy">Baca</a>
                            <form method="POST" action="{{ route('admin.pesan.destroy', $pesan) }}" onsubmit="return confirm('Yakin mau hapus pesan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada pesan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="admin-pagination">
        {{ $pesanList->links() }}
    </div>
@endsection