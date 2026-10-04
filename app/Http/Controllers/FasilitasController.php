<?php

namespace App\Http\Controllers;

class FasilitasController extends Controller
{
    public function index()
    {
        $fasilitas = [
            ['nama' => 'Lab Komputer', 'deskripsi' => 'Dilengkapi perangkat dan koneksi internet memadai untuk praktik pemrograman dan desain digital.'],
            ['nama' => 'Bengkel TKRO', 'deskripsi' => 'Ruang praktik otomotif dengan peralatan sesuai standar bengkel industri.'],
            ['nama' => 'Bengkel Las TPFL', 'deskripsi' => 'Fasilitas pengelasan dan fabrikasi logam untuk praktik langsung siswa.'],
            ['nama' => 'Lab Jaringan TJKT', 'deskripsi' => 'Perangkat jaringan dan server untuk praktik instalasi serta administrasi jaringan.'],
            ['nama' => 'Perpustakaan', 'deskripsi' => 'Koleksi buku pelajaran, referensi, dan ruang baca yang nyaman.'],
            ['nama' => 'Masjid Sekolah', 'deskripsi' => 'Tempat ibadah dan kegiatan keagamaan bagi seluruh warga sekolah.'],
            ['nama' => 'UKS', 'deskripsi' => 'Ruang kesehatan sekolah untuk pertolongan pertama dan pemeriksaan kesehatan siswa.'],
            ['nama' => 'Lapangan Olahraga', 'deskripsi' => 'Area olahraga untuk kegiatan ekstrakurikuler dan upacara sekolah.'],
        ];

        return view('fasilitas', compact('fasilitas'));
    }
}