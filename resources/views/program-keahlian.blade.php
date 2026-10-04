@extends('layouts.app')

@section('title', 'Program Keahlian - SMK Negeri 4 Bogor')

@section('content')

    @include('partials.page-header', [
        'title' => 'Program Keahlian',
        'subtitle' => 'Pilih jalur masa depanmu melalui program keahlian yang relevan dengan kebutuhan industri global.'
    ])

    <section class="section">
        <div class="container">
            <div class="grid-4">
                @foreach ($kompetensi as $item)
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
                @endforeach
            </div>
        </div>
    </section>

@endsection