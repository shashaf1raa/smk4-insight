<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SMK Negeri 4 Bogor')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('styles')
</head>
<body>

    {{-- ============ NAVBAR ============ --}}
    <header class="navbar">
        <div class="container navbar-inner">
            <a href="{{ route('beranda') }}" class="navbar-brand">
                @if (file_exists(public_path('images/logo.png')))
                    <img src="{{ asset('images/logo.png') }}" alt="Logo SMKN 4 Bogor" class="navbar-logo">
                @endif
                SMKN 4 BOGOR
            </a>

            <nav class="navbar-menu">
                <a href="{{ route('beranda') }}" class="{{ request()->routeIs('beranda') ? 'active' : '' }}">Beranda</a>
                <a href="{{ route('profil') }}" class="{{ request()->routeIs('profil') ? 'active' : '' }}">Profil Sekolah</a>

                @php
                    $infoActive = request()->routeIs('program-keahlian', 'kompetensi.detail', 'fasilitas', 'produk-karya', 'produk-karya.detail');
                @endphp
                <div class="dropdown">
                    <a href="#" class="{{ $infoActive ? 'active' : '' }}">Informasi</a>
                    <div class="dropdown-menu">
                        <a href="{{ route('program-keahlian') }}">Program Keahlian</a>
                        <a href="{{ route('fasilitas') }}">Fasilitas</a>
                        <a href="{{ route('produk-karya') }}">Produk & Karya Siswa</a>
                    </div>
                </div>

                <a href="{{ route('berita') }}" class="{{ request()->routeIs('berita', 'berita.detail') ? 'active' : '' }}">Berita/Artikel</a>
                <a href="{{ route('galeri') }}" class="{{ request()->routeIs('galeri') ? 'active' : '' }}">Galeri</a>
                <a href="{{ route('kontak') }}" class="{{ request()->routeIs('kontak') ? 'active' : '' }}">Kontak</a>
            </nav>

            @auth
                <a href="{{ route('admin.dashboard') }}" class="btn btn-navy btn-sm">Dashboard Admin</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-navy btn-sm">Login Admin</a>
            @endauth
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    {{-- ============ FOOTER ============ --}}
    <footer class="footer">
        <div class="container footer-inner footer-inner-4col">
            <div class="footer-col">
                <div class="footer-logo">🎓 SMK Negeri 4 Bogor</div>
                <p>Membangun generasi unggul yang siap kerja di era industri modern dengan integritas tinggi.</p>
            </div>
            <div class="footer-col">
                <h4>Kontak</h4>
                <p>Jl. Raya Tajur, Bogor</p>
                <p>(0251) 123456</p>
                <p>info@smkn4bogor.sch.id</p>
            </div>
            <div class="footer-col">
                <h4>Quick Links</h4>
                <p><a href="#">PPDB Online</a></p>
                <p><a href="#">Portal Alumni</a></p>
                <p><a href="#">Lowongan Kerja</a></p>
                <p><a href="#">Pusat Bantuan</a></p>
            </div>
            <div class="footer-col">
                <h4>Informasi</h4>
                <p>SMK Negeri 4 Bogor adalah pusat keunggulan pendidikan kejuruan yang berfokus pada teknologi dan manajemen.</p>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container footer-bottom-inner">
                <span>© {{ date('Y') }} SMK Negeri 4 Bogor. Academic & Industrial Excellence.</span>
                <div class="footer-links">
                    <a href="#">Kebijakan Privasi</a>
                    <a href="#">Syarat & Ketentuan</a>
                </div>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>