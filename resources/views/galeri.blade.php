@extends('layouts.app')

@section('title', 'Galeri Kegiatan - SMK Negeri 4 Bogor')

@section('content')

    {{-- =========================================================
       HEADER
       ========================================================= --}}
    @include('partials.page-header', [
        'title' => 'Galeri Kegiatan',
        'subtitle' => 'Dokumentasi perjalanan akademik, prestasi gemilang, dan kreativitas siswa SMK Negeri 4 Bogor dalam mempersiapkan diri menjadi tenaga profesional di industri masa depan.'
    ])


    {{-- =========================================================
       FILTER KATEGORI + PENCARIAN
       ========================================================= --}}
    <section class="berita-toolbar-section">
        <div class="container berita-toolbar">

            <div class="kategori-tabs">

                @php
                    $tabs = [
                        'semua' => 'Semua',
                        'prestasi' => 'Prestasi',
                        'kegiatan' => 'Kegiatan'
                    ];
                @endphp

                @foreach ($tabs as $value => $label)

                    <a
                        href="{{ route('galeri', array_filter([
                            'kategori' => $value !== 'semua' ? $value : null,
                            'cari' => $cari
                        ])) }}"
                        class="kategori-tab {{ $kategori === $value ? 'active' : '' }}"
                    >
                        {{ $label }}
                    </a>

                @endforeach

            </div>


            <form
                action="{{ route('galeri') }}"
                method="GET"
                class="berita-search"
            >

                @if ($kategori !== 'semua')
                    <input
                        type="hidden"
                        name="kategori"
                        value="{{ $kategori }}"
                    >
                @endif

                <input
                    type="text"
                    name="cari"
                    value="{{ $cari }}"
                    placeholder="Cari galeri..."
                >

                <button type="submit">
                    🔍
                </button>

            </form>

        </div>
    </section>



    {{-- =========================================================
       GRID GALERI
       ========================================================= --}}
    <section
        class="section"
        style="padding-top: 10px;"
    >

        <div class="container">

            @if ($galeriList->isEmpty())

                <p class="berita-empty">
                    Belum ada foto yang cocok dengan pencarian/filter kamu.
                </p>

            @else

                <div class="galeri-page-grid">

                    @foreach ($galeriList as $i => $item)

                        <div
                            class="galeri-page-item {{ $i === 0 ? 'is-big' : '' }}"
                            data-index="{{ $i }}"
                            role="button"
                            tabindex="0"
                            aria-label="Buka foto {{ $item['judul'] }}"
                        >

                            <img
                                src="{{ asset('images/' . $item['foto']) }}"
                                alt="{{ $item['judul'] }}"
                                onerror="this.src='https://placehold.co/500x400/e2e8f0/94a3b8?text=Galeri'"
                            >

                            <span class="badge badge-{{ strtolower($item['kategori']) }}">
                                {{ strtoupper($item['kategori']) }}
                            </span>

                            <div class="galeri-page-caption">
                                {{ $item['judul'] }}
                            </div>

                        </div>

                    @endforeach

                </div>

            @endif

        </div>

    </section>



    {{-- =========================================================
       STATISTIK
       ========================================================= --}}
    <section class="galeri-stats">

        <div class="container galeri-stats-grid">

            @foreach ($statistik as $s)

                <div class="galeri-stat-item">

                    <strong>
                        {{ $s['angka'] }}
                    </strong>

                    <span>
                        {{ $s['label'] }}
                    </span>

                </div>

            @endforeach

        </div>

    </section>



    {{-- =========================================================
       CTA
       ========================================================= --}}
    <section class="section section-gray">

        <div class="container text-center">

            <h2 class="section-title">
                Ingin Mengetahui Lebih Lanjut?
            </h2>

            <p class="section-subtitle">
                Saksikan lebih banyak momen dan dokumentasi kegiatan kami melalui kanal media sosial resmi SMKN 4 Bogor.
            </p>

            <div
                class="hero-actions"
                style="justify-content: center;"
            >

                <a
                    href="#"
                    class="btn btn-navy"
                >
                    ▶ YouTube SMKN 4
                </a>

                <a
                    href="#"
                    class="btn btn-outline-light"
                    style="border-color: var(--navy); color: var(--navy);"
                >
                    📷 Instagram Official
                </a>

            </div>

        </div>

    </section>



    {{-- =========================================================
       LIGHTBOX GALERI
       ========================================================= --}}
    <div
        id="lightbox-overlay"
        class="lightbox-overlay"
        aria-hidden="true"
    >

        {{-- TOMBOL CLOSE --}}
        <button
            type="button"
            id="lightbox-close"
            class="lightbox-close"
            aria-label="Tutup"
        >
            &times;
        </button>


        {{-- TOMBOL PREVIOUS --}}
        <button
            type="button"
            id="lightbox-prev"
            class="lightbox-nav lightbox-prev"
            aria-label="Foto sebelumnya"
        >
            &#10094;
        </button>


        {{-- FOTO --}}
        <div class="lightbox-content">

            <img
                id="lightbox-img"
                src=""
                alt=""
            >

            <div
                id="lightbox-caption"
                class="lightbox-caption"
            ></div>

            <div
                id="lightbox-counter"
                class="lightbox-counter"
            ></div>

        </div>


        {{-- TOMBOL NEXT --}}
        <button
            type="button"
            id="lightbox-next"
            class="lightbox-nav lightbox-next"
            aria-label="Foto berikutnya"
        >
            &#10095;
        </button>

    </div>



@endsection


{{-- =============================================================
   JAVASCRIPT GALERI

   Sengaja diletakkan langsung setelah @endsection.
   Tidak menggunakan @push supaya tetap berjalan walaupun
   layouts.app tidak memiliki @stack('scripts').
   ============================================================= --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    /* =========================================================
       AMBIL ELEMENT
       ========================================================= */

    const galleryItems =
        document.querySelectorAll('.galeri-page-item');

    const overlay =
        document.getElementById('lightbox-overlay');

    const lightboxImg =
        document.getElementById('lightbox-img');

    const lightboxCaption =
        document.getElementById('lightbox-caption');

    const lightboxCounter =
        document.getElementById('lightbox-counter');

    const closeButton =
        document.getElementById('lightbox-close');

    const prevButton =
        document.getElementById('lightbox-prev');

    const nextButton =
        document.getElementById('lightbox-next');


    /* =========================================================
       CEK ELEMENT
       ========================================================= */

    if (
        !galleryItems.length ||
        !overlay ||
        !lightboxImg ||
        !closeButton ||
        !prevButton ||
        !nextButton
    ) {
        return;
    }


    /* =========================================================
       DATA FOTO
       ========================================================= */

    const galeriData = [];


    galleryItems.forEach(function (item) {

        const img =
            item.querySelector('img');

        const caption =
            item.querySelector('.galeri-page-caption');


        if (!img) {
            return;
        }


        galeriData.push({

            src: img.getAttribute('src'),

            alt: img.getAttribute('alt') || '',

            caption: caption
                ? caption.textContent.trim()
                : ''

        });

    });


    let galeriIndex = 0;



    /* =========================================================
       BUKA LIGHTBOX
       ========================================================= */

    function bukaLightbox(index) {

        if (!galeriData.length) {
            return;
        }


        galeriIndex = index;


        tampilkanFoto();


        overlay.classList.add('active');

        overlay.setAttribute(
            'aria-hidden',
            'false'
        );


        document.body.style.overflow = 'hidden';

    }



    /* =========================================================
       TAMPILKAN FOTO
       ========================================================= */

    function tampilkanFoto() {

        const data =
            galeriData[galeriIndex];


        if (!data) {
            return;
        }


        lightboxImg.src =
            data.src;


        lightboxImg.alt =
            data.alt;


        lightboxCaption.textContent =
            data.caption;


        lightboxCounter.textContent =
            (galeriIndex + 1) +
            ' / ' +
            galeriData.length;

    }



    /* =========================================================
       FOTO SEBELUMNYA
       ========================================================= */

    function fotoSebelumnya(event) {

        if (event) {
            event.stopPropagation();
        }


        if (!galeriData.length) {
            return;
        }


        galeriIndex--;


        if (galeriIndex < 0) {

            galeriIndex =
                galeriData.length - 1;

        }


        tampilkanFoto();

    }



    /* =========================================================
       FOTO BERIKUTNYA
       ========================================================= */

    function fotoBerikutnya(event) {

        if (event) {
            event.stopPropagation();
        }


        if (!galeriData.length) {
            return;
        }


        galeriIndex++;


        if (
            galeriIndex >=
            galeriData.length
        ) {

            galeriIndex = 0;

        }


        tampilkanFoto();

    }



    /* =========================================================
       TUTUP LIGHTBOX
       ========================================================= */

    function tutupLightbox(event) {

        if (event) {
            event.stopPropagation();
        }


        overlay.classList.remove('active');

        overlay.setAttribute(
            'aria-hidden',
            'true'
        );


        document.body.style.overflow = '';


        lightboxImg.src = '';

    }



    /* =========================================================
       PASANG KLIK KE SEMUA FOTO
       ========================================================= */

    galleryItems.forEach(function (item, index) {


        item.addEventListener(
            'click',
            function (event) {

                event.preventDefault();

                event.stopPropagation();

                bukaLightbox(index);

            }
        );


        /* =====================================================
           KEYBOARD ENTER / SPACE
           ===================================================== */

        item.addEventListener(
            'keydown',
            function (event) {

                if (
                    event.key === 'Enter' ||
                    event.key === ' '
                ) {

                    event.preventDefault();

                    bukaLightbox(index);

                }

            }
        );

    });



    /* =========================================================
       TOMBOL CLOSE
       ========================================================= */

    closeButton.addEventListener(
        'click',
        tutupLightbox
    );



    /* =========================================================
       TOMBOL PREVIOUS
       ========================================================= */

    prevButton.addEventListener(
        'click',
        fotoSebelumnya
    );



    /* =========================================================
       TOMBOL NEXT
       ========================================================= */

    nextButton.addEventListener(
        'click',
        fotoBerikutnya
    );



    /* =========================================================
       KLIK BACKGROUND GELAP
       ========================================================= */

    overlay.addEventListener(
        'click',
        function (event) {

            if (
                event.target === overlay
            ) {

                tutupLightbox();

            }

        }
    );



    /* =========================================================
       KEYBOARD
       ========================================================= */

    document.addEventListener(
        'keydown',
        function (event) {

            if (
                !overlay.classList.contains('active')
            ) {
                return;
            }


            if (event.key === 'Escape') {

                tutupLightbox();

            }


            if (event.key === 'ArrowLeft') {

                fotoSebelumnya();

            }


            if (event.key === 'ArrowRight') {

                fotoBerikutnya();

            }

        }
    );



    /* =========================================================
       SWIPE UNTUK HP
       ========================================================= */

    let touchStartX = 0;

    let touchEndX = 0;


    overlay.addEventListener(
        'touchstart',
        function (event) {

            touchStartX =
                event.changedTouches[0].screenX;

        },
        {
            passive: true
        }
    );


    overlay.addEventListener(
        'touchend',
        function (event) {

            touchEndX =
                event.changedTouches[0].screenX;


            const jarak =
                touchEndX - touchStartX;


            if (
                Math.abs(jarak) < 50
            ) {
                return;
            }


            if (jarak < 0) {

                fotoBerikutnya();

            } else {

                fotoSebelumnya();

            }

        },
        {
            passive: true
        }
    );

});

</script>