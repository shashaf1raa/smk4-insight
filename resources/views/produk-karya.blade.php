@extends('layouts.app')

@section('title', 'Produk & Karya Siswa - SMK Negeri 4 Bogor')

@section('content')

    @include('partials.page-header', [
        'title' => 'Produk & Karya Siswa',
        'subtitle' => 'Jelajahi berbagai karya, proyek, dan inovasi siswa SMK Negeri 4 Bogor sebagai wujud kreativitas, keterampilan, dan semangat untuk terus berkarya.'
    ])

    {{-- ============ FILTER JURUSAN ============ --}}
    <section class="berita-toolbar-section">
        <div class="container berita-toolbar">
            <div class="kategori-tabs">
                @php
                    $tabs = ['semua' => 'Semua', 'pplg' => 'PPLG', 'tjkt' => 'TJKT', 'tkro' => 'TKRO', 'tpfl' => 'TPFL'];
                @endphp
                @foreach ($tabs as $value => $label)
                    <a href="{{ route('produk-karya', $value !== 'semua' ? ['jurusan' => $value] : []) }}"
                       class="kategori-tab {{ $jurusan === $value ? 'active' : '' }}">
                        {{ $label }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============ GRID KARYA ============ --}}
    <section class="section" style="padding-top: 10px;">
        <div class="container">
            @if ($karyaList->isEmpty())
                <p class="berita-empty">Belum ada karya untuk jurusan ini.</p>
            @else
                <div class="grid-3">
                    @foreach ($karyaList as $karya)
                        <div class="card-berita card-produk">
                            <a href="{{ route('produk-karya.detail', $karya['slug']) }}" class="card-berita-img">
                                <img src="{{ asset('images/' . $karya['foto']) }}" alt="{{ $karya['judul'] }}" onerror="this.src='https://placehold.co/400x220/e2e8f0/94a3b8?text=Karya+Siswa'">
                                <span class="badge badge-kegiatan">{{ $karya['jurusan'] }}</span>
                            </a>
                            <div class="card-berita-body">
                                <span class="card-date">👤 {{ $karya['siswa'] }}</span>
                                <h3><a href="{{ route('produk-karya.detail', $karya['slug']) }}">{{ $karya['judul'] }}</a></h3>
                                <p>{{ $karya['deskripsi'] }}</p>

                                <div class="produk-harga">Rp {{ number_format($karya['harga'], 0, ',', '.') }}</div>

                                <div class="produk-actions">
                                    <a href="{{ route('produk-karya.detail', $karya['slug']) }}" class="link-more">Lihat Detail →</a>
                                    <a href="https://wa.me/6281386178783?text={{ urlencode('Halo, saya tertarik dengan karya "' . $karya['judul'] . '" yang saya lihat di website SMKN 4 Bogor. Boleh info lebih lanjut?') }}"
                                       target="_blank" class="btn btn-accent btn-sm">🛒 Beli Sekarang</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

@endsection