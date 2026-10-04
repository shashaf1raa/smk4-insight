@extends('admin.layout')

@section('title', 'Detail Pesan')

@section('admin-content')
    <h1>Detail Pesan</h1>

    <div class="admin-panel">
        <p><strong>Nama:</strong> {{ $pesan->nama }}</p>
        <p><strong>Email:</strong> {{ $pesan->email }}</p>
        <p><strong>Subjek:</strong> {{ $pesan->subjek ?: '(tanpa subjek)' }}</p>
        @if ($pesan->kategori)
            <p><strong>Kategori:</strong> {{ $pesan->kategori }}</p>
        @endif
        <p><strong>Dikirim:</strong> {{ $pesan->created_at->format('d M Y, H:i') }} WIB</p>
        <hr style="margin: 18px 0; border: none; border-top: 1px solid #e2e8f0;">
        <p style="white-space: pre-line;">{{ $pesan->pesan }}</p>
    </div>

    <a href="{{ route('admin.pesan.index') }}" class="link-more" style="display: inline-block; margin-top: 18px;">← Kembali ke Pesan Masuk</a>
@endsection