@extends('layouts.app')

@section('title', $berita->judul . ' - SMK Negeri 4 Bogor')

@section('content')

    @include('partials.page-header', ['title' => $berita->judul])

    <section class="section berita-detail-section">
        <div class="container berita-detail-wrap">

            {{-- META --}}
            <div class="berita-detail-meta">
                <span class="badge-pill">
                    {{ ucfirst($berita->kategori) }}
                </span>

                <span class="card-date">
                    📅 {{ $berita->tanggal->format('d F Y') }}
                </span>
            </div>

            {{-- GAMBAR UTAMA --}}
            <div class="berita-detail-img">
                <img
                    src="{{ $berita->gambar
                        ? asset('images/' . $berita->gambar)
                        : 'https://placehold.co/900x500/e2e8f0/94a3b8?text=Berita' }}"
                    alt="{{ $berita->judul }}"
                    onerror="this.src='https://placehold.co/900x500/e2e8f0/94a3b8?text=Berita'"
                >
            </div>

            {{-- ISI ARTIKEL --}}
            <article class="berita-detail-body">

                {{-- RINGKASAN --}}
                @if ($berita->ringkasan)
                    <div class="berita-detail-ringkasan">
                        <span class="ringkasan-label">Ringkasan</span>

                        <p>
                            {{ $berita->ringkasan }}
                        </p>
                    </div>
                @endif

                {{-- ISI --}}
                @if ($berita->isi)

                    <div class="berita-detail-content">

                        {!! nl2br(e($berita->isi)) !!}

                    </div>

                @else

                    <p class="berita-empty" style="text-align: left; padding: 0;">
                        Isi lengkap berita ini belum ditambahkan.
                    </p>

                @endif

            </article>

            {{-- KEMBALI --}}
            <div class="berita-detail-back">
                <a href="{{ route('berita') }}" class="link-more">
                    ← Kembali ke Berita/Artikel
                </a>
            </div>

        </div>
    </section>


    {{-- BERITA TERKAIT --}}
    @if ($beritaLain->isNotEmpty())

        <section class="section section-gray">
            <div class="container">

                <h2 class="section-title text-center">
                    Berita Terkait
                </h2>

                <div class="grid-3">

                    @foreach ($beritaLain as $item)

                        <a href="{{ route('berita.detail', $item) }}" class="card-berita">

                            <div class="card-berita-img">

                                <img
                                    src="{{ $item->gambar
                                        ? asset('images/' . $item->gambar)
                                        : 'https://placehold.co/400x220/e2e8f0/94a3b8?text=Berita' }}"
                                    alt="{{ $item->judul }}"
                                    onerror="this.src='https://placehold.co/400x220/e2e8f0/94a3b8?text=Berita'"
                                >

                                <span class="badge badge-{{ $item->kategori }}">
                                    {{ strtoupper($item->kategori) }}
                                </span>

                            </div>

                            <div class="card-berita-body">

                                <span class="card-date">
                                    📅 {{ $item->tanggal->format('d F Y') }}
                                </span>

                                <h3>
                                    {{ $item->judul }}
                                </h3>

                                <p>
                                    {{ $item->ringkasan }}
                                </p>

                                <span class="link-more">
                                    Baca Selengkapnya →
                                </span>

                            </div>

                        </a>

                    @endforeach

                </div>

            </div>
        </section>

    @endif

@endsection