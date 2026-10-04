@extends('layouts.app')

@section('title', 'Fasilitas - SMK Negeri 4 Bogor')

@section('content')

    @include('partials.page-header', [
        'title' => 'Fasilitas',
        'subtitle' => 'Sarana penunjang yang tersedia untuk mendukung kegiatan belajar dan praktik siswa sehari-hari.'
    ])

    <section class="section">
        <div class="container">

            <div class="fasilitas-container">
                @foreach ($fasilitas as $item)
                    <div class="card-feature">
                        <h3>{{ $item['nama'] }}</h3>
                        <p>{{ $item['deskripsi'] }}</p>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

@endsection
