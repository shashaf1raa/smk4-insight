@extends('layouts.app')

@section('title', 'Beranda - SMK Negeri 4 Bogor')

@section('content')

    {{-- ============ HERO SECTION ============ --}}
    @php
        $heroBgExists = file_exists(public_path('images/hero-bg.jpg'));
    @endphp
    <section class="hero" @if($heroBgExists) style="background-image: url('{{ asset('images/hero-bg.jpg') }}');" @endif>
        <div class="hero-overlay"></div>
        <div class="container hero-content">
            <h1>Membangun Masa Depan Berkualitas di <span class="text-accent">SMKN 4 BOGOR</span></h1>
            <p class="hero-desc">Mewujudkan generasi unggul, berkarakter, dan kompeten di bidang teknologi dan kejuruan. Siap kerja, santun, mandiri, dan kreatif.</p>

            <div class="hero-actions">
                <a href="{{ route('profil') }}" class="btn btn-accent">Tentang Kami →</a>
                <a href="{{ route('profil') }}" class="btn btn-outline-light">Profil Sekolah</a>
            </div>

            <div class="hero-stats">
                <div class="stat-card">
                    <span class="stat-icon">👥</span>
                    <div>
                        <strong>{{ number_format($statistik['siswa'], 0, ',', '.') }}</strong>
                        <span>Siswa Siswi</span>
                    </div>
                </div>
                <div class="stat-card">
                    <span class="stat-icon">🎖️</span>
                    <div>
                        <strong>{{ $statistik['tenaga_pendidik'] }}</strong>
                        <span>Tenaga Pendidik</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============ SAMBUTAN KEPALA SEKOLAH ============ --}}
    <section class="section sambutan">
        <div class="container sambutan-inner">
            <div class="sambutan-foto">
                <img src="{{ asset('images/' . $kepalaSekolah['foto']) }}" alt="{{ $kepalaSekolah['nama'] }}" onerror="this.src='https://placehold.co/400x500/e2e8f0/94a3b8?text=Foto+Kepsek'">
                <div class="sambutan-caption">
                    <strong>{{ $kepalaSekolah['nama'] }}</strong>
                    <span>KEPALA SEKOLAH</span>
                </div>
            </div>

            <div class="sambutan-teks">
                <span class="quote-mark">"</span>
                <h2>Inovasi Tanpa Batas untuk Indonesia Maju</h2>
                <p class="quote">"{{ $kepalaSekolah['kutipan'] }}"</p>
                <p>Pendidikan kejuruan di SMKN 4 Bogor bukan sekadar transfer pengetahuan, melainkan pembentukan karakter dan kompetensi yang nyata. Dengan fasilitas modern yang kami miliki, setiap siswa didorong untuk bereksperimen, berinovasi, dan menghasilkan karya yang diakui oleh dunia industri.</p>
                <p>Terima kasih atas kepercayaan masyarakat kepada kami. Mari bersama-sama mencetak lulusan yang cerdas, terampil, dan berdaya saing global.</p>
            </div>
        </div>
    </section>

    {{-- ============ KEUNGGULAN ============ --}}
<section class="section section-gray">
    <div class="container">

        <h2 class="section-title text-center">
            Mengapa SMKN 4 Bogor?
        </h2>

        <p class="section-subtitle text-center">
            Keunggulan yang mendukung kualitas pembelajaran dan pengembangan kompetensi siswa
        </p>

        <div class="grid-3">

            @foreach ($keunggulan as $item)

                <div class="card-feature">

                    @if (!empty($item['icon']))
                        <div class="card-feature-icon">
                            {{ $item['icon'] }}
                        </div>
                    @endif

                    <h3>{{ $item['judul'] }}</h3>

                    <p>{{ $item['deskripsi'] }}</p>

                </div>

            @endforeach

        </div>

    </div>
</section>



        </div>
    </section>

    {{-- ============ BERITA & PENGUMUMAN ============ --}}
    <section class="section">
        <div class="container">
            <div class="section-header-row">
                <div>
                    <h2 class="section-title">Berita & Pengumuman</h2>
                    <p class="section-subtitle">Ikuti perkembangan terbaru kegiatan dan prestasi kami.</p>
                </div>
                <a href="{{ route('berita') }}" class="link-more">Lihat Semua Berita ↗</a>
            </div>

            <div class="grid-3">
                @foreach ($beritaList as $berita)
                    <div class="card-berita">
                        <div class="card-berita-img">
                            <img src="{{ asset('images/' . $berita['gambar']) }}" alt="{{ $berita['judul'] }}" onerror="this.src='https://placehold.co/400x220/e2e8f0/94a3b8?text=Berita'">
                            <span class="badge">{{ $berita['kategori'] }}</span>
                        </div>
                        <div class="card-berita-body">
                            <span class="card-date">📅 {{ $berita['tanggal'] }}</span>
                            <h3>{{ $berita['judul'] }}</h3>
                            @if ($berita['ringkasan'])
                                <p>{{ $berita['ringkasan'] }}</p>
                            @endif
                            <a href="#" class="link-more">Baca Selengkapnya</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============ GALERI KEGIATAN ============ --}}
    <section class="section">
        <div class="container">
            <h2 class="section-title text-center">Galeri Kegiatan</h2>

            <div class="grid-3 galeri-grid">
                @foreach ($galeriList as $gambar)
                    <div class="galeri-item">
                        <img src="{{ asset('images/' . $gambar) }}" alt="Galeri kegiatan" onerror="this.src='https://placehold.co/400x300/e2e8f0/94a3b8?text=Galeri'">
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============ CTA ============ --}}
    <section class="cta">
        <div class="container text-center">
            <h2>Siap Bergabung Bersama Kami?</h2>
            <p>Jadilah bagian dari institusi pendidikan vokasi terbaik di Bogor dan raih masa depan gemilangmu hari ini.</p>
            <div class="hero-actions">
                <a href="#" class="btn btn-accent">Daftar Sekarang</a>
                <a href="{{ route('kontak') }}" class="btn btn-outline-light">Hubungi Admission</a>
            </div>
        </div>
    </section>

@endsection