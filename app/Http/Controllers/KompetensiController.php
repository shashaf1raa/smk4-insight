<?php

namespace App\Http\Controllers;

class KompetensiController extends Controller
{
    /**
     * Satu sumber data dipakai bareng: ditampilkan sebagai daftar di
     * halaman Profil Sekolah, dan sebagai halaman detail per jurusan.
     */
    public static function all(): array
    {
        return [
            [
                'slug' => 'pplg',
                'kode' => 'PPLG',
                'nama' => 'Pengembangan Perangkat Lunak dan Gim',
                'foto' => 'kompetensi-pplg.jpg',
                'deskripsi' => 'Mempelajari pengembangan aplikasi web, mobile, dan desktop, dasar pemrograman, basis data, UI/UX, serta teknologi digital sesuai kebutuhan industri.',
                'deskripsi_panjang' => 'Program keahlian PPLG membekali siswa untuk merancang, membangun, dan menguji aplikasi berbasis web, mobile, maupun desktop. Siswa dilatih berpikir logis dan sistematis melalui praktik pemrograman langsung, mulai dari dasar algoritma hingga pengembangan proyek nyata bersama industri.',
                'mapel' => ['Pemrograman Dasar', 'Basis Data', 'Pemrograman Web', 'Pemrograman Mobile', 'UI/UX Design', 'Praktik Kerja Lapangan'],
                'prospek' => ['Web Developer', 'Mobile App Developer', 'UI/UX Designer', 'Quality Assurance', 'Wirausaha Digital'],
            ],
            [
                'slug' => 'tjkt',
                'kode' => 'TJKT',
                'nama' => 'Teknik Jaringan Komputer dan Telekomunikasi',
                'foto' => 'kompetensi-tjkt.jpg',
                'deskripsi' => 'Mempelajari instalasi dan pengelolaan jaringan komputer, server, keamanan siber, serta sistem telekomunikasi untuk mendukung infrastruktur teknologi informasi.',
                'deskripsi_panjang' => 'Program keahlian TJKT membekali siswa merancang, memasang, dan mengelola jaringan komputer serta infrastruktur telekomunikasi. Siswa dilatih langsung menangani perangkat jaringan, server, dan dasar-dasar keamanan siber melalui praktik di laboratorium jaringan sekolah.',
                'mapel' => ['Dasar Jaringan Komputer', 'Administrasi Server', 'Keamanan Jaringan', 'Fiber Optik', 'Sistem Operasi Jaringan', 'Praktik Kerja Lapangan'],
                'prospek' => ['Network Engineer', 'Network Administrator', 'Teknisi Jaringan', 'IT Support', 'Cyber Security Staff'],
            ],
            [
                'slug' => 'tkro',
                'kode' => 'TKRO',
                'nama' => 'Teknik Kendaraan Ringan Otomotif',
                'foto' => 'kompetensi-tkro.jpg',
                'deskripsi' => 'Membekali siswa dengan keterampilan perawatan, perbaikan, dan diagnosis kendaraan ringan menggunakan teknologi otomotif modern dan standar industri.',
                'deskripsi_panjang' => 'Program keahlian TKRO membekali siswa dengan kemampuan merawat, memperbaiki, dan mendiagnosis kerusakan pada kendaraan ringan. Praktik dilakukan langsung di bengkel sekolah dengan peralatan otomotif modern, sesuai standar yang dipakai bengkel resmi dan industri otomotif.',
                'mapel' => ['Teknologi Dasar Otomotif', 'Perawatan Mesin Kendaraan Ringan', 'Sasis dan Pemindah Tenaga', 'Kelistrikan Otomotif', 'Praktik Kerja Lapangan'],
                'prospek' => ['Teknisi Bengkel Otomotif', 'Mekanik Kendaraan Ringan', 'Quality Control Otomotif', 'Wirausaha Bengkel'],
            ],
            [
                'slug' => 'tpfl',
                'kode' => 'TPFL',
                'nama' => 'Teknik Pengelasan dan Fabrikasi Logam',
                'foto' => 'kompetensi-tpfl.jpg',
                'deskripsi' => 'Mempelajari teknik pengelasan, fabrikasi logam, pembacaan gambar teknik, serta proses produksi untuk memenuhi kebutuhan industri manufaktur.',
                'deskripsi_panjang' => 'Program keahlian TPFL membekali siswa dengan keterampilan mengelas dan mengolah logam menjadi komponen atau struktur sesuai standar industri manufaktur. Siswa berlatih membaca gambar teknik dan mempraktikkan berbagai teknik pengelasan langsung di bengkel las sekolah.',
                'mapel' => ['Gambar Teknik', 'Teknik Pengelasan Dasar', 'Fabrikasi Logam', 'Pengelasan Lanjut', 'K3 Industri', 'Praktik Kerja Lapangan'],
                'prospek' => ['Welder/Juru Las', 'Teknisi Fabrikasi', 'Quality Control Manufaktur', 'Wirausaha Bengkel Las'],
            ],
        ];
    }

    public function index()
    {
        $kompetensi = self::all();

        return view('program-keahlian', compact('kompetensi'));
    }

    public function show(string $slug)
    {
        $kompetensi = collect(self::all())->firstWhere('slug', $slug);

        if (!$kompetensi) {
            abort(404);
        }

        return view('kompetensi-detail', compact('kompetensi'));
    }
}