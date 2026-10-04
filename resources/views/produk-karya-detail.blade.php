@extends('layouts.app')

@section('title', $karya['judul'] . ' - SMK Negeri 4 Bogor')

@section('content')

    @include('partials.page-header', ['title' => $karya['judul']])

    <section class="section">
        <div class="container produk-detail-grid">
            <div class="produk-detail-foto">
                <img src="{{ asset('images/' . $karya['foto']) }}" alt="{{ $karya['judul'] }}" onerror="this.src='https://placehold.co/500x400/e2e8f0/94a3b8?text=Karya+Siswa'">
            </div>

            <div class="produk-detail-teks">
                <span class="badge-pill">{{ $karya['jurusan'] }}</span>
                <h2>{{ $karya['judul'] }}</h2>
                <p class="card-date">👤 {{ $karya['siswa'] }}</p>
                <p class="produk-detail-deskripsi">{{ $karya['deskripsi'] }}</p>

                <div class="produk-detail-harga-box">
                    <div class="produk-detail-harga">Rp {{ number_format($karya['harga'], 0, ',', '.') }}</div>
                    <p class="produk-harga-note">*Harga estimasi, bisa berbeda tergantung spesifikasi & kebutuhan. Hubungi kami untuk info lebih lanjut.</p>
                </div>

                <a href="https://wa.me/6281386178783?text={{ urlencode('Halo, saya tertarik dengan karya "' . $karya['judul'] . '" yang saya lihat di website SMKN 4 Bogor. Boleh info lebih lanjut?') }}"
                   target="_blank" class="btn btn-accent">🛒 Beli Sekarang via WhatsApp</a>

                <a href="{{ route('produk-karya') }}" class="link-more" style="display: block; margin-top: 20px;">← Kembali ke Produk & Karya Siswa</a>
            </div>
        </div>
    </section>

@endsection