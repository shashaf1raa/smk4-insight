@extends('layouts.app')

@section('title', 'Login Admin - SMK Negeri 4 Bogor')

@section('content')
<section class="section login-section">
    <div class="container login-container">
        <div class="login-box">
            <h2 class="text-center">Login Admin</h2>
            <p class="text-center login-subtitle">Masuk untuk mengelola konten website SMK Negeri 4 Bogor.</p>

            @if ($errors->any())
                <div class="alert alert-error">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.submit') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <label class="checkbox-inline">
                    <input type="checkbox" name="remember"> Ingat saya
                </label>

                <button type="submit" class="btn btn-navy" style="width: 100%; margin-top: 14px;">Masuk</button>
            </form>
        </div>
    </div>
</section>
@endsection