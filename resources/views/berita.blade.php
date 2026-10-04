@extends('layouts.app')

@section('title', 'Berita & Artikel - SMK Negeri 4 Bogor')

@section('content')

    {{-- ============ BANNER UTAMA ============ --}}
    <section class="section berita-banner-section">
        <div class="container">
            <div class="berita-banner" @if(file_exists(public_path('images/artikel-banner.jpg'))) style="background-image: url('{{ asset('images/artikel-banner.jpg') }}');" @endif>
                <div class="berita-banner-overlay"></div>
            </div>
        </div>
    </section>

    {{-- ============ FILTER KATEGORI + PENCARIAN ============ --}}
    <section class="berita-toolbar-section">
        <div class="container berita-toolbar">
            <div class="kategori-tabs">
                @php
                    $tabs = ['semua' => 'Semua', 'prestasi' => 'Prestasi', 'kegiatan' => 'Kegiatan', 'pengumuman' => 'Pengumuman'];
                @endphp
                @foreach ($tabs as $value => $label)
                    <a href="{{ route('berita', array_filter(['kategori' => $value !== 'semua' ? $value : null, 'cari' => $cari])) }}"
                       class="kategori-tab {{ $kategori === $value ? 'active' : '' }}">
                        {{ $label }}
                    </a>
                @endforeach
            </div>

            <form action="{{ route('berita') }}" method="GET" class="berita-search">
                @if ($kategori !== 'semua')
                    <input type="hidden" name="kategori" value="{{ $kategori }}">
                @endif
                <input type="text" name="cari" value="{{ $cari }}" placeholder="Cari berita...">
                <button type="submit">🔍</button>
            </form>
        </div>
    </section>

    {{-- ============ GRID BERITA ============ --}}
    <section class="section" style="padding-top: 20px;">
        <div class="container">

            @if ($beritaList->isEmpty())
                <p class="berita-empty">Belum ada berita yang cocok dengan pencarian/filter kamu.</p>
            @else
                <div class="grid-3">
                    @foreach ($beritaList as $berita)
                        <a href="{{ route('berita.detail', $berita) }}" class="card-berita">
                            <div class="card-berita-img">
                                <img src="{{ $berita->gambar ? asset('images/' . $berita->gambar) : 'https://placehold.co/400x220/e2e8f0/94a3b8?text=Berita' }}" alt="{{ $berita->judul }}" onerror="this.src='https://placehold.co/400x220/e2e8f0/94a3b8?text=Berita'">
                                <span class="badge badge-{{ $berita->kategori }}">{{ strtoupper($berita->kategori) }}</span>
                            </div>
                            <div class="card-berita-body">
                                <span class="card-date">📅 {{ $berita->tanggal->format('d F Y') }}</span>
                                <h3>{{ $berita->judul }}</h3>
                                <p>{{ $berita->ringkasan }}</p>
                                <span class="link-more">Baca Selengkapnya →</span>
                            </div>
                        </a>
                    @endforeach
                </div>

                {{-- ============ PAGINATION ============ --}}
                @if ($beritaList->lastPage() > 1)
                    <div class="pagination">
                        <a href="{{ $beritaList->previousPageUrl() ?? '#' }}" class="page-btn {{ $beritaList->onFirstPage() ? 'disabled' : '' }}">‹</a>

                        @for ($i = 1; $i <= $beritaList->lastPage(); $i++)
                            @if ($i == 1 || $i == $beritaList->lastPage() || abs($i - $beritaList->currentPage()) <= 1)
                                <a href="{{ $beritaList->url($i) }}" class="page-btn {{ $i == $beritaList->currentPage() ? 'active' : '' }}">{{ $i }}</a>
                            @elseif ($i == 2 || $i == $beritaList->lastPage() - 1)
                                <span class="page-dots">...</span>
                            @endif
                        @endfor

                        <a href="{{ $beritaList->nextPageUrl() ?? '#' }}" class="page-btn {{ !$beritaList->hasMorePages() ? 'disabled' : '' }}">›</a>
                    </div>
                @endif
            @endif

        </div>
    </section>

    {{-- ============ NEWSLETTER ============ --}}
    <section class="section">
        <div class="container">
            <div class="newsletter-box">
                <div>
                    <h2>Berlangganan Berita</h2>
                    <p>Dapatkan update informasi kegiatan, prestasi, dan pengumuman terbaru langsung di email Anda setiap minggu.</p>
                </div>
                <form class="newsletter-form" onsubmit="return false;">
                    <input type="email" placeholder="Alamat Email Anda" required>
                    <button type="submit" class="btn btn-accent">Subscribe</button>
                </form>
            </div>
        </div>
    </section>

@endsection