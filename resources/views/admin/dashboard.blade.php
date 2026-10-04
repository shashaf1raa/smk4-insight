@extends('admin.layout')

@section('title', 'Dashboard')

@section('admin-content')

<style>
    /* =========================================
       DASHBOARD - CLEAN & FORMAL
       ========================================= */

    .dash {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
    }

    /* HEADER */
    .dash-header {
        margin-bottom: 32px;
    }

    .dash-header h1 {
        margin: 0 0 7px;
        color: #07195d;
        font-size: 28px;
        font-weight: 750;
        line-height: 1.2;
    }

    .dash-header p {
        margin: 0;
        color: #64748b;
        font-size: 14px;
    }

    /* STATISTIK */
    .dash-stats {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 18px;
        margin-bottom: 34px;
    }

    .dash-stat {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 24px 26px;
        min-height: 105px;
        box-sizing: border-box;

        display: flex;
        flex-direction: column;
        justify-content: center;

        box-shadow: 0 2px 8px rgba(15, 23, 42, 0.04);
    }

    .dash-stat-number {
        color: #07195d;
        font-size: 30px;
        font-weight: 750;
        line-height: 1;
        margin-bottom: 9px;
    }

    .dash-stat-label {
        color: #64748b;
        font-size: 13px;
    }

    /* SECTION TITLE */
    .dash-section {
        margin-bottom: 14px;
    }

    .dash-section h2 {
        margin: 0;
        color: #0f172a;
        font-size: 17px;
        font-weight: 700;
    }

    /* QUICK ACTIONS */
    .dash-actions {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 18px;
    }

    .dash-card {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 25px 26px;

        min-height: 180px;
        box-sizing: border-box;

        display: flex;
        flex-direction: column;

        box-shadow: 0 2px 8px rgba(15, 23, 42, 0.04);
    }

    .dash-card h3 {
        margin: 0 0 10px;
        color: #07195d;
        font-size: 16px;
        font-weight: 700;
    }

    .dash-card p {
        margin: 0;
        color: #64748b;
        font-size: 13.5px;
        line-height: 1.7;
        max-width: 520px;
    }

    .dash-card-footer {
        margin-top: auto;
        padding-top: 22px;
    }

    .dash-btn {
        display: inline-block;
        padding: 9px 16px;

        background: #07195d;
        color: #fff !important;

        border-radius: 7px;
        text-decoration: none;

        font-size: 13px;
        font-weight: 600;

        transition: background 0.15s ease;
    }

    .dash-btn:hover {
        background: #0b247d;
    }

    /* RESPONSIVE */
    @media (max-width: 850px) {

        .dash-stats {
            grid-template-columns: 1fr;
        }

        .dash-actions {
            grid-template-columns: 1fr;
        }

    }

    @media (max-width: 600px) {

        .dash {
            max-width: 100%;
        }

        .dash-header h1 {
            font-size: 24px;
        }

        .dash-stat {
            padding: 20px;
        }

        .dash-card {
            padding: 22px;
        }

    }
</style>


<div class="dash">

    {{-- HEADER --}}
    <div class="dash-header">
        <h1>Dashboard</h1>
        <p>Ringkasan konten website SMK Negeri 4 Bogor.</p>
    </div>


    {{-- STATISTIK --}}
    <div class="dash-stats">

        <div class="dash-stat">
            <span class="dash-stat-number">
                {{ $totalBerita }}
            </span>

            <span class="dash-stat-label">
                Total Berita
            </span>
        </div>


        <div class="dash-stat">
            <span class="dash-stat-number">
                {{ $totalPesan }}
            </span>

            <span class="dash-stat-label">
                Total Pesan Masuk
            </span>
        </div>


        <div class="dash-stat">
            <span class="dash-stat-number">
                {{ $pesanBelumDibaca }}
            </span>

            <span class="dash-stat-label">
                Pesan Belum Dibaca
            </span>
        </div>

    </div>


    {{-- AKSES CEPAT --}}
    <div class="dash-section">
        <h2>Akses Cepat</h2>
    </div>


    <div class="dash-actions">

        <div class="dash-card">

            <h3>Berita & Artikel</h3>

            <p>
                Kelola berita dan artikel yang ditampilkan
                pada website SMK Negeri 4 Bogor.
            </p>

            <div class="dash-card-footer">
                <a
                    href="{{ route('admin.berita.index') }}"
                    class="dash-btn"
                >
                    Kelola Berita →
                </a>
            </div>

        </div>


        <div class="dash-card">

            <h3>Pesan Kontak</h3>

            <p>
                Lihat dan kelola pesan yang dikirimkan
                oleh pengunjung melalui halaman kontak.
            </p>

            <div class="dash-card-footer">
                <a
                    href="{{ route('admin.pesan.index') }}"
                    class="dash-btn"
                >
                    Lihat Pesan →
                </a>
            </div>

        </div>

    </div>

</div>

@endsection