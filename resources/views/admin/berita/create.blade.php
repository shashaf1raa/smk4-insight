@extends('admin.layout')

@section('title', 'Tambah Berita')

@section('admin-content')
    <h1>Tambah Berita</h1>

    @if ($errors->any())
        <div class="alert alert-error">
            <ul style="margin: 0; padding-left: 18px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.berita.store') }}" enctype="multipart/form-data" class="admin-form">
        @csrf
        @include('admin.berita._form')

        <button type="submit" class="btn btn-navy">Simpan Berita</button>
        <a href="{{ route('admin.berita.index') }}" class="btn btn-outline-light" style="border-color: var(--navy); color: var(--navy);">Batal</a>
    </form>
@endsection