@extends('layouts.app')

@section('title', 'Profil Sekolah - SMK Negeri 4 Bogor')

@section('content')

    @include('partials.page-header', ['title' => 'Profil Sekolah'])

    {{-- ============ VISI & MISI ============ --}}
    <section class="section">
        <div class="container visi-misi-grid">
            <div class="visi-box">
                <span class="badge-pill">VISI UTAMA</span>
                <span class="quote-mark">"</span>
                <p class="visi-text">"{{ $visi }}"</p>
            </div>

            <div class="misi-box">
                <h3>Misi Kami</h3>
                <ul class="misi-list">
                    @foreach ($misi as $item)
                        <li>
                            <span class="misi-check">✓</span>
                            <span>{{ $item }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    {{-- ============ SAMBUTAN KEPALA SEKOLAH (navy) ============ --}}
    <section class="sambutan-navy">
        <div class="container sambutan-navy-inner">
            <div class="sambutan-navy-foto">
                <img src="{{ asset('images/' . $kepalaSekolah['foto']) }}" alt="{{ $kepalaSekolah['nama'] }}" onerror="this.src='https://placehold.co/400x480/1e293b/94a3b8?text=Foto+Kepsek'">
            </div>
            <div class="sambutan-navy-teks">
                <span class="eyebrow">KEPEMIMPINAN SEKOLAH</span>
                <h2>Sambutan Kepala Sekolah</h2>
                <p class="quote">"{{ $kepalaSekolah['kutipan'] }}"</p>
                <strong>{{ $kepalaSekolah['nama'] }}</strong>
                <span class="sub">{{ $kepalaSekolah['jabatan'] }}</span>
            </div>
        </div>
    </section>

    {{-- ============ TAUTAN KE HALAMAN INFORMASI ============ --}}
    <section class="section">
        <div class="container">
            <div class="info-links-grid">
                <a href="{{ route('program-keahlian') }}" class="info-link-card">
                    <h3>Program Keahlian</h3>
                    <p>Lihat 4 jurusan yang tersedia beserta mata pelajaran dan prospek kariernya.</p>
                    <span class="link-more">Lihat Selengkapnya →</span>
                </a>
                <a href="{{ route('fasilitas') }}" class="info-link-card">
                    <h3>Fasilitas</h3>
                    <p>Sarana dan prasarana penunjang kegiatan belajar serta praktik siswa.</p>
                    <span class="link-more">Lihat Selengkapnya →</span>
                </a>
                <a href="{{ route('produk-karya') }}" class="info-link-card">
                    <h3>Produk & Karya Siswa</h3>
                    <p>Karya, proyek, dan inovasi terbaik dari siswa di tiap program keahlian.</p>
                    <span class="link-more">Lihat Selengkapnya →</span>
                </a>
            </div>
        </div>
    </section>

    {{-- ============ PRESTASI & PENGHARGAAN ============ --}}
    <section class="section section-gray">
        <div class="container prestasi-grid">
            <div class="prestasi-intro">
                <h2 class="section-title">Prestasi & Penghargaan</h2>
                <p>Berbagai pencapaian yang diraih berkat semangat dan kerja keras seluruh civitas akademika SMKN 4 Bogor di tingkat regional hingga nasional.</p>
                <a href="#" class="btn btn-navy">Semua Prestasi 🏆</a>
            </div>

            <div class="prestasi-list">
                @foreach ($prestasi as $item)
                    <div class="prestasi-item">
                        <div class="prestasi-item-top">
                            <span class="badge-pill">{{ $item['kategori'] }}</span>
                            <span class="prestasi-tahun">{{ $item['tahun'] }}</span>
                        </div>
                        <h4>{{ $item['judul'] }}</h4>
                        <p>{{ $item['deskripsi'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection