<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        // ==========================================================
        // DATA DUMMY. Nama file foto pakai pola galeri-page-1.jpg dst
        // supaya nggak bentrok sama galeri-1.jpg..galeri-6.jpg yang
        // dipakai di Beranda (itu foto pilihan aja, ini foto lengkap).
        // ==========================================================
        $allGaleri = [
            ['kategori' => 'Kegiatan', 'foto' => 'galeri-page-1.jpg', 'judul' => 'Upacara Bendera Hari Senin SMKN 4 BOGOR'],
            ['kategori' => 'Kegiatan', 'foto' => 'galeri-page-2.jpg', 'judul' => 'Kunjungan Industri'],
            ['kategori' => 'Kegiatan', 'foto' => 'galeri-page-3.jpg', 'judul' => 'KR4BAT MENGAJI & TAFSIR'],
            ['kategori' => 'Kegiatan', 'foto' => 'galeri-page-4.jpg', 'judul' => ' Qurban 2026'],
            ['kategori' => 'Kegiatan', 'foto' => 'galeri-page-5.jpg', 'judul' => 'Tes Psikotes'],
            ['kategori' => 'Prestasi', 'foto' => 'galeri-page-6.jpg', 'judul' => 'Prestasi KR4BAT KOMPOS di Bogor Innovation Awards 2026'],
            ['kategori' => 'Kegiatan', 'foto' => 'galeri-page-7.jpg', 'judul' => 'Jalan Sehat HUT RI'],
            ['kategori' => 'Prestasi', 'foto' => 'galeri-page-8.jpg', 'judul' => 'Bogor Inovation Awards 2026'],
            ['kategori' => 'Kegiatan', 'foto' => 'galeri-page-9.jpg', 'judul' => 'Clasmeeting Day 3'],
            ['kategori' => 'Kegiatan', 'foto' => 'galeri-page-10.jpg', 'judul' => 'Aksi Bersih Lingkungan'],
            ['kategori' => 'Kegiatan', 'foto' => 'galeri-page-11.jpg', 'judul' => 'Pesantren Ekologi'],
            ['kategori' => 'Kegiatan', 'foto' => 'galeri-page-12.jpg', 'judul' => 'Kegiatan Dhuha Bersama'],
            ['kategori' => 'Prestasi', 'foto' => 'galeri-page-13.jpg', 'judul' => 'Inovasi siswa PPLG dalam mengembangkan sistem pemilihan Ketua OSIS yang efektif, tertata, dan berbasis teknologi digital.'],
            ['kategori' => 'Prestasi', 'foto' => 'galeri-page-14.jpg', 'judul' => 'Prestasi KR4BAT ISYARAT di Bogor Innovation Awards 2026'],
        ];

        $kategori = $request->query('kategori', 'semua');
        $cari = $request->query('cari');

        $galeriList = collect($allGaleri);

        if ($kategori !== 'semua') {
            $galeriList = $galeriList->filter(function ($item) use ($kategori) {
                return strtolower($item['kategori']) === strtolower($kategori);
            });
        }

        if ($cari) {
            $galeriList = $galeriList->filter(function ($item) use ($cari) {
                return str_contains(strtolower($item['judul']), strtolower($cari));
            });
        }

        $galeriList = $galeriList->values();

        // Statistik ringkas (nanti bisa dihitung otomatis dari database)
        $statistik = [
            ['angka' => '200', 'label' => 'Foto Kegiatan'],
            ['angka' => '10+', 'label' => 'Video Dokumentasi'],
            ['angka' => '3', 'label' => 'Kategori Galeri'],
            ['angka' => '10th', 'label' => 'Arsip Digital'],
        ];

        return view('galeri', compact('galeriList', 'kategori', 'cari', 'statistik'));
    }
}
