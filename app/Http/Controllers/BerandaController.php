<?php

namespace App\Http\Controllers;

class BerandaController extends Controller
{
    public function index()
    {
        // Data statistik singkat (nanti bisa diganti ambil dari database)
        $statistik = [
            'siswa' => 1066,
            'tenaga_pendidik' => 56,
        ];

        // Data kepala sekolah
        $kepalaSekolah = [
            'nama' => 'Drs. Mulya Murprihatono, M.Si',
            'jabatan' => 'Kepala Sekolah',
            'kutipan' => 'Selamat datang di portal informasi SMK Negeri 4 Bogor. Kami berkomitmen untuk menyelenggarakan pendidikan vokasi yang relevan dengan kebutuhan industri masa depan melalui integrasi teknologi dan nilai-nilai integritas.',
            'foto' => 'kepala-sekolah.jpg',
        ];

        // Keunggulan sekolah
        $keunggulan = [
            [
                'judul' => 'Lab Komputer',
                'deskripsi' => 'Kurikulum disusun dan diperbarui sesuai kebutuhan Dunia Usaha dan Dunia Industri (DUDI) sehingga siswa memiliki kompetensi yang relevan dengan perkembangan teknologi.',
                'icon' => '',
            ],
            [
                'judul' => 'Bengkel TO/TPFL',
                'deskripsi' => 'Didukung laboratorium praktik, ruang belajar yang nyaman, serta berbagai fasilitas penunjang pembelajaran untuk meningkatkan pengalaman belajar siswa.',
                'icon' => '',
            ],
            [
                'judul' => 'Penempatan PKL & Kerja',
                'deskripsi' => 'Memiliki kerja sama dengan berbagai perusahaan dan instansi untuk program Praktik Kerja Lapangan (PKL) serta memperluas peluang kerja bagi lulusan.',
                'icon' => '',
            ],
        ];

        // Berita & pengumuman (dummy, nanti diganti dari tabel `beritas`)
        $beritaList = [
            [
                'kategori' => 'Kegiatan',
                'gambar' => 'penyuluhan.jpg',
                'tanggal' => '29 Juli 2026',
                'judul' => 'Kegiatan Penyuluhan & Bimbingan Jabatan',
                'ringkasan' => '',
            ],
            [
                'kategori' => 'Prestasi',
                'gambar' => 'snbp.jpg',
                'tanggal' => '2 April 2026',
                'judul' => 'Siswa-Siswi SMK Negeri 4 Bogor Lolos SNBP 2026',
                'ringkasan' => 'Selamat untuk siswa-siswi SMK Negeri 4 Bogor yang berhasil lolos SNBP 2026.',
            ],
            [
                'kategori' => 'Kegiatan',
                'gambar' => 'miraj.jpg',
                'tanggal' => '16 Februari 2026',
                'judul' => 'Miraj Inspire Fest & Tarhib Ramadhan',
                'ringkasan' => 'Kegiatan Miraj Inspire Fest & Tarhib Ramadhan yang diisi dengan berbagai kegiatan, termasuk lomba Fashion Show.',
            ],
        ];

        // Galeri kegiatan (dummy, nanti diganti dari tabel `galeris`)
        $galeriList = [
            'galeri-1.jpg',
            'galeri-2.jpg',
            'galeri-3.jpg',
            'galeri-4.jpg',
            'galeri-5.jpg',
            'galeri-6.jpg',
        ];

        return view('beranda', compact(
            'statistik',
            'kepalaSekolah',
            'keunggulan',
            'beritaList',
            'galeriList'
        ));
    }
}