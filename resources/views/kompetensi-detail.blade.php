@extends('layouts.app')

@section('title', $kompetensi['kode'] . ' - SMK Negeri 4 Bogor')

@section('content')

    @include('partials.page-header', ['title' => $kompetensi['kode']])

    <section class="section">
        <div class="container kompetensi-detail-grid">
            <div class="kompetensi-detail-foto">
                <img src="{{ asset('images/' . $kompetensi['foto']) }}" alt="{{ $kompetensi['kode'] }}" onerror="this.src='https://placehold.co/500x400/e2e8f0/94a3b8?text={{ $kompetensi['kode'] }}'">
            </div>

            <div class="kompetensi-detail-teks">
                <span class="badge-pill">{{ $kompetensi['kode'] }}</span>
                <h2>{{ $kompetensi['nama'] }}</h2>
                <p>{{ $kompetensi['deskripsi_panjang'] }}</p>

                <a href="{{ route('program-keahlian') }}" class="link-more">← Kembali ke Program Keahlian</a>
            </div>
        </div>
    </section>

    <section class="section section-gray">
        <div class="container kompetensi-detail-grid">
            <div>
                <h3>Mata Pelajaran Utama</h3>
                <ul class="chip-list">
                    @foreach ($kompetensi['mapel'] as $mapel)
                        <li>{{ $mapel }}</li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h3>Prospek Karier Lulusan</h3>
                <ul class="chip-list">
                    @foreach ($kompetensi['prospek'] as $prospek)
                        <li>{{ $prospek }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <h2 class="section-title text-center">Jurusan Lainnya</h2>
            <div class="grid-4">
                @foreach (\App\Http\Controllers\KompetensiController::all() as $item)
                    @if ($item['slug'] !== $kompetensi['slug'])
                        <a href="{{ route('kompetensi.detail', $item['slug']) }}" class="card-kompetensi">
                            <div class="card-kompetensi-img">
                                <img src="{{ asset('images/' . $item['foto']) }}" alt="{{ $item['kode'] }}" onerror="this.src='https://placehold.co/300x220/e2e8f0/94a3b8?text={{ $item['kode'] }}'">
                            </div>
                            <div class="card-kompetensi-body">
                                <h3>{{ $item['kode'] }}</h3>
                                <p>{{ $item['deskripsi'] }}</p>
                                <span class="link-more">Lihat Detail →</span>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

@endsection