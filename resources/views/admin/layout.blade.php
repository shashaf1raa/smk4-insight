<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - SMK Negeri 4 Bogor')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="admin-body">

    @php
        $pesanBelumDibaca = \App\Models\Pesan::where('dibaca', false)->count();
    @endphp

    <div class="admin-layout">
        <aside class="admin-sidebar">
            <div class="admin-sidebar-brand">
                @if (file_exists(public_path('images/logo.png')))
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="admin-sidebar-logo">
                @else
                    <span class="admin-sidebar-logo-fallback">🎓</span>
                @endif
                <div>
                    SMK Negeri 4
                    <span>Admin Console</span>
                </div>
            </div>

            <nav class="admin-nav">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <p>Dashboard</p>
                </a>
                <a href="{{ route('admin.berita.index') }}" class="{{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">
                    <p>Berita & Artikel</p>
                </a>
                <a href="{{ route('admin.produk.index') }}" class="{{ request()->routeIs('admin.produk.*') ? 'active' : '' }}">
                <p>Produk & Karya</p>
                </a>
                <a href="{{ route('admin.pesan.index') }}" class="{{ request()->routeIs('admin.pesan.*') ? 'active' : '' }}">
                    <p>Pesan Kontak</p>
                    @if ($pesanBelumDibaca > 0)
                        <span class="admin-nav-badge">{{ $pesanBelumDibaca }}</span>
                    @endif
                </a>
            </nav>

            <div class="admin-sidebar-profile">
                <div class="admin-sidebar-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                <div class="admin-sidebar-profile-text">
                    <strong>{{ Auth::user()->name }}</strong>
                    <span>{{ Auth::user()->email }}</span>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}" class="admin-logout-form">
                @csrf
                <button type="submit">🚪 Keluar</button>
            </form>
        </aside>

        <main class="admin-content">
            <div class="admin-topbar">
                <div>
                    <div class="admin-topbar-title">@yield('title')</div>
                </div>
                <div class="admin-topbar-right">
                    <a href="{{ route('admin.pesan.index') }}" class="admin-bell" title="Pesan belum dibaca">
                        🔔
                        @if ($pesanBelumDibaca > 0)
                            <span class="admin-bell-dot"></span>
                        @endif
                    </a>
                    <a href="{{ route('beranda') }}" target="_blank" class="admin-topbar-link">Lihat Website →</a>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @yield('admin-content')
        </main>
    </div>

</body>
</html>