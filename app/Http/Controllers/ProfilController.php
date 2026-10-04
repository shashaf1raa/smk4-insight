<?php

namespace App\Http\Controllers;

class ProfilController extends Controller
{
    public function index()
    {
        $visi = 'Terwujudnya sekolah yang tangguh dalam imtaq, terampil, mandiri, berbasis Teknologi informasi dan komunikasi, dan berwawasan lingkungan.';

        $misi = [
            'Meningkatkan keimanan dan ketakwaan seluruh warga sekolah.',
            'Menyelenggarakan pendidikan yang berbasis teknologi dan informasi sesuai standar industri.',
            'Mengembangkan kemitraan strategis dengan dunia usaha dan dunia industri nasional maupun internasional.',
            'Menumbuhkan jiwa kewirausahaan dan peduli lingkungan bagi seluruh peserta didik.',
        ];

        $kepalaSekolah = [
            'nama' => 'Drs. Mulya Murprihatono, M.Si',
            'jabatan' => 'Kepala Sekolah SMK Negeri 4 Bogor',
            'kutipan' => 'Pendidikan bukan hanya tentang mengisi wadah dengan informasi, tetapi menyalakan api keingintahuan dan membekali generasi muda dengan keahlian nyata untuk membangun masa depan bangsa.',
            'foto' => 'kepala-sekolah.jpg',
        ];

        $prestasi = [
            [
                'kategori' => 'Nasional',
                'tahun' => '2025',
                'judul' => 'Juara 1 LKS Cloud Computing',
                'deskripsi' => 'Siswa SMKN 4 Bogor berhasil meraih Juara 1 LKS Cloud Computing tingkat nasional.',
            ],
            [
                'kategori' => 'Nasional',
                'tahun' => '2025',
                'judul' => 'Juara 1 LKS Graphic Design',
                'deskripsi' => 'Siswa SMKN 4 Bogor berhasil meraih Juara 1 LKS Graphic Design.',
            ],
            [
                'kategori' => 'Nasional',
                'tahun' => '2025',
                'judul' => 'Juara 3 LKS Web Technologies',
                'deskripsi' => 'Siswa SMKN 4 Bogor berhasil meraih Juara 3 LKS Web Technologies tingkat nasional.',
            ],
            [
                'kategori' => 'Jabodetabek',
                'tahun' => '2025',
                'judul' => 'Juara Madya 2 Paskibra',
                'deskripsi' => 'Tim Paskibra SMKN 4 Bogor meraih Juara Madya 2 tingkat SMA/SMK/MA se-Jabodetabek.',
            ],
        ];

        return view('profil', compact('visi', 'misi', 'kepalaSekolah', 'prestasi'));
    }
}