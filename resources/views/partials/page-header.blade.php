{{-- Partial reusable: breadcrumb + judul halaman di atas foto latar --}}
@php
    $bgExists = file_exists(public_path('images/hero-bg.jpg'));
@endphp
<section class="page-header" @if($bgExists) style="background-image: url('{{ asset('images/hero-bg.jpg') }}');" @endif>
    <div class="page-header-overlay"></div>
    <div class="container page-header-content">
        <div class="breadcrumb">
            <a href="{{ route('beranda') }}">Beranda</a>
            <span class="sep">›</span>
            <span>{{ $title }}</span>
        </div>
        <h1>{{ $title }}</h1>
        @isset($subtitle)
            <p class="page-header-subtitle">{{ $subtitle }}</p>
        @endisset
    </div>
</section>