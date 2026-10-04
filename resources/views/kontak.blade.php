@extends('layouts.app')

@section('title', 'Kontak - SMK Negeri 4 Bogor')

@section('content')
<style>
.kontak-layout {
    display: grid !important;
    grid-template-columns: 0.9fr 1.1fr !important;
    gap: 30px !important;
}

.kontak-info {
    background: #07195d !important;
    color: white !important;
    padding: 30px !important;
    border-radius: 20px !important;
}

.kontak-form-card {
    background: white !important;
    padding: 30px !important;
    border-radius: 20px !important;
    border: 1px solid #ddd !important;
}

.kontak-hero {
    background: #07195d !important;
    color: white !important;
    padding: 80px 0 !important;
}
</style>

{{-- ================= HERO ================= --}}
<section class="kontak-hero">
    @php
        $heroBgExists = file_exists(public_path('images/hero-bg.jpg'));
    @endphp

    @if($heroBgExists)
        <div class="kontak-hero-bg"
             style="background-image: url('{{ asset('images/hero-bg.jpg') }}');">
        </div>
    @endif

    <div class="kontak-hero-overlay"></div>

    <div class="container kontak-hero-content">
        <span class="kontak-hero-label">SMK4 INSIGHT</span>
        <h1>Hubungi Kami</h1>
        <p>
            Punya pertanyaan atau ingin mengetahui lebih lanjut tentang
            SMK Negeri 4 Bogor? Kami siap membantu.
        </p>
    </div>
</section>


{{-- ================= KONTAK UTAMA ================= --}}
<section class="section kontak-main">
    <div class="container">

        <div class="kontak-heading">
            <span>GET IN TOUCH</span>
            <h2>Mari Terhubung dengan Kami</h2>
            <p>
                Sampaikan pertanyaan, kebutuhan informasi, atau pesan Anda
                melalui kontak yang tersedia.
            </p>
        </div>

        <div class="kontak-layout">

            {{-- INFO --}}
            <div class="kontak-info">

                <div class="kontak-info-header">
                    <div class="kontak-info-icon">✦</div>
                    <div>
                        <h3>Informasi Kontak</h3>
                        <p>Kami siap membantu memberikan informasi yang Anda butuhkan.</p>
                    </div>
                </div>

                <div class="kontak-info-list">

                    <div class="kontak-info-item">
                        <div class="kontak-item-icon">📍</div>
                        <div>
                            <span>Alamat</span>
                            <strong>SMK Negeri 4 Bogor</strong>
                            <p>Jl. Raya Tajur, Kp. Buntar, Bogor Selatan</p>
                        </div>
                    </div>

                    <div class="kontak-info-item">
                        <div class="kontak-item-icon">📱</div>
                        <div>
                            <span>WhatsApp</span>
                            <strong>0813-8617-8783</strong>
                            <p>Hubungi kami untuk informasi lebih lanjut.</p>
                        </div>
                    </div>

                    <div class="kontak-info-item">
                        <div class="kontak-item-icon">◎</div>
                        <div>
                            <span>Instagram</span>
                            <strong>@smk4insight</strong>
                            <p>Ikuti informasi dan kegiatan terbaru sekolah.</p>
                        </div>
                    </div>

                </div>

                <div class="kontak-info-note">
                    <strong>Butuh informasi sekolah?</strong>
                    <p>
                        Silakan kirim pesan melalui form di samping.
                        Kami akan menerima dan menindaklanjuti pesan Anda.
                    </p>
                </div>

            </div>


            {{-- FORM --}}
            <div class="kontak-form-card">

                <div class="kontak-form-header">
                    <span>KIRIM PESAN</span>
                    <h3>Sampaikan Pesan Anda</h3>
                    <p>
                        Isi formulir berikut dengan informasi yang sesuai.
                    </p>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-error">
                        <ul style="margin:0; padding-left:18px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('kontak.store') }}">
                    @csrf

                    <div class="form-row">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input
                                type="text"
                                name="nama"
                                id="nama"
                                value="{{ old('nama') }}"
                                placeholder="Masukkan nama Anda"
                                required
                            >
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input
                                type="email"
                                name="email"
                                id="email"
                                value="{{ old('email') }}"
                                placeholder="nama@email.com"
                                required
                            >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="subjek">Subjek</label>

                        <select name="subjek" id="subjek" required>
                            <option value="">Pilih subjek pesan</option>

                            <option value="Informasi PPDB"
                                {{ old('subjek') == 'Informasi PPDB' ? 'selected' : '' }}>
                                Informasi PPDB
                            </option>

                            <option value="Kurikulum & Program Keahlian"
                                {{ old('subjek') == 'Kurikulum & Program Keahlian' ? 'selected' : '' }}>
                                Kurikulum & Program Keahlian
                            </option>

                            <option value="Kerjasama Industri"
                                {{ old('subjek') == 'Kerjasama Industri' ? 'selected' : '' }}>
                                Kerjasama Industri
                            </option>

                            <option value="Pertanyaan Umum"
                                {{ old('subjek') == 'Pertanyaan Umum' ? 'selected' : '' }}>
                                Pertanyaan Umum
                            </option>

                            <option value="Lainnya"
                                {{ old('subjek') == 'Lainnya' ? 'selected' : '' }}>
                                Lainnya
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pesan">Pesan</label>

                        <textarea
                            name="pesan"
                            id="pesan"
                            rows="5"
                            placeholder="Tuliskan pesan Anda di sini..."
                            required
                        >{{ old('pesan') }}</textarea>
                    </div>

                    <button type="submit" class="kontak-submit">
                        Kirim Pesan
                        <span>→</span>
                    </button>

                </form>
            </div>

        </div>
    </div>
</section>


{{-- ================= MAP ================= --}}
<section class="kontak-location">
    <div class="container">

        <div class="kontak-location-heading">
            <span>OUR LOCATION</span>
            <h2>Lokasi Kami</h2>
            <p>
                Temukan lokasi SMK Negeri 4 Bogor melalui peta berikut.
            </p>
        </div>

        <div class="kontak-map-card">

            <div class="kontak-map-info">
                <strong>SMK Negeri 4 Bogor</strong>
                <span>Jl. Raya Tajur, Kp. Buntar, Bogor Selatan</span>

                <a
                    href="https://maps.google.com/?q=SMK+Negeri+4+Bogor"
                    target="_blank"
                    rel="noopener"
                >
                    Buka di Google Maps →
                </a>
            </div>

            <iframe
                src="https://maps.google.com/maps?q=SMK%20Negeri%204%20Bogor&t=&z=15&ie=UTF8&iwloc=&output=embed"
                width="100%"
                height="430"
                style="border:0;"
                allowfullscreen=""
                loading="lazy">
            </iframe>

        </div>

    </div>
</section>

@endsection