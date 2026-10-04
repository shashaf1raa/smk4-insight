<?php

namespace Database\Seeders;

use App\Models\Berita;
use Illuminate\Database\Seeder;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['kategori' => 'prestasi', 'gambar' => 'artikel-1.jpg', 'tanggal' => '2026-04-02', 'judul' => 'Siswa-Siswi SMKN 4 Bogor Lolos SNBP 2026', 'ringkasan' => 'Selamat untuk siswa-siswi SMKN 4 Bogor yang berhasil lolos SNBP 2026.'],
            ['kategori' => 'kegiatan', 'gambar' => 'artikel-2.jpg', 'tanggal' => '2026-07-31', 'judul' => 'Kegiatan KR4BAT Dhuha Bersama', 'ringkasan' => 'Pembiasaan sholat Dhuha bersama untuk memperkuat karakter spiritual siswa/siswi SMKN 4 Bogor secara rutin.'],
            ['kategori' => 'prestasi', 'gambar' => 'artikel-3.jpg', 'tanggal' => '2026-07-06', 'judul' => 'Justine dan Heidar Sabet Juara 2 Web Technologies', 'ringkasan' => 'Berikut adalah panduan lengkap alur pendaftaran, jadwal seleksi, serta berkas persyaratan yang wajib dipersiapkan.'],
            ['kategori' => 'kegiatan', 'gambar' => 'artikel-4.jpg', 'tanggal' => '2026-08-12', 'judul' => 'Kegiatan Jalan Sehat Semarak HUT RI ke-81', 'ringkasan' => 'Keluarga besar SMKN 4 Bogor berpartisipasi aktif dalam kegiatan jalan sehat penuh semangat kebersamaan.'],
            ['kategori' => 'kegiatan', 'gambar' => 'artikel-5.jpg', 'tanggal' => '2026-08-20', 'judul' => 'Kunjungan Monitoring dan Evaluasi (Monev) TPOA', 'ringkasan' => 'Pelaksanaan agenda pengawasan standar mutu pendidikan vokasi berkelanjutan oleh tim pengawas.'],
            ['kategori' => 'kegiatan', 'gambar' => 'artikel-6.jpg', 'tanggal' => '2026-08-19', 'judul' => 'Aksi Ekologi Pancawaluya – Bebersih Lingkungan', 'ringkasan' => 'Gerakan peduli lingkungan hidup dan kebersihan area sekitar sekolah demi terciptanya atmosfer belajar yang asri.'],
            ['kategori' => 'pengumuman', 'gambar' => 'artikel-7.jpg', 'tanggal' => '2026-08-10', 'judul' => 'Informasi SPMB Jabar 2026', 'ringkasan' => 'Jangan lewatkan timeline SPMB Jabar 2026 yang dimulai 29 Mei s.d. 8 Juni 2026. Pastikan berkas pendaftaran telah lengkap dan lakukan pendaftaran secara daring (online).'],
            ['kategori' => 'pengumuman', 'gambar' => 'artikel-8.jpg', 'tanggal' => '2026-07-29', 'judul' => 'Pengumuman Resmi SMKN 4 KOTA BOGOR', 'ringkasan' => 'Pengelolaan Pembiayaan & Larangan Aktivitas Penjualan Seragam Sekolah.'],
            ['kategori' => 'kegiatan', 'gambar' => 'artikel-9.jpg', 'tanggal' => '2026-02-16', 'judul' => 'Miraj Inspire Fest & Tarhib Ramadhan', 'ringkasan' => 'Kegiatan Miraj Inspire Fest & Tarhib Ramadhan yang diisi dengan berbagai kegiatan, termasuk lomba Fashion Show.'],
            ['kategori' => 'kegiatan', 'gambar' => 'artikel-10.jpg', 'tanggal' => '2026-07-29', 'judul' => 'Kegiatan Penyuluhan & Bimbingan Jabatan', 'ringkasan' => 'Kegiatan penyuluhan karier untuk membekali siswa tingkat akhir sebelum lulus.'],
            ['kategori' => 'kegiatan', 'gambar' => 'artikel-11.jpg', 'tanggal' => '2026-02-11', 'judul' => 'MOU Program Kerjasama Industri SMKN 4 Bogor dengan PT Bonet Utama', 'ringkasan' => 'Kegiatan ini dilaksanakan di SMKN 4 Kota Bogor Pada Hari Rabu 11, Februari 2026.'],
            ['kategori' => 'prestasi', 'gambar' => 'artikel-12.jpg', 'tanggal' => '2025-09-29', 'judul' => 'Juara 1 The Ace 2025 UI/UX Competition Universitas Diponogoro', 'ringkasan' => 'Selamat dan Sukses atas pencapaian prestasi yang telah diraih Juara 1 The Ace 2025 UI/UX Competition Universitas Diponogoro.'],
            ['kategori' => 'kegiatan', 'gambar' => 'artikel-13.jpg', 'tanggal' => '2026-08-17', 'judul' => 'Kegiatan Upacara Pengibaran Bendera Merah Putih dalam rangka Peringatan HUT ke-81 Republik Indonesia', 'ringkasan' => 'Kegiatan ini dilaksanakan di lapangan SMK Negeri 4 Bogor pada Senin, 17 Agustus 2026.'],
            ['kategori' => 'kegiatan', 'gambar' => 'artikel-14.jpg', 'tanggal' => '2026-09-09', 'judul' => 'Kegiatan Bersih-Bersih Lingkungan Sekolah Pasca Paparan Abu Vulkanik', 'ringkasan' => 'Kegiatan ini dilaksanakan pada hari Rabu, 9 September di lingkungan SMKN 4 KOTA BOGOR.'],
            ['kategori' => 'kegiatan', 'gambar' => 'artikel-15.jpg', 'tanggal' => '2026-08-05', 'judul' => 'Kegiatan Program Sertifikasi Bahasa Inggris (TOEIC)', 'ringkasan' => 'Kegiatan ini dilaksanakan di Lab SMKN 4 Kota Bogor.'],
            ['kategori' => 'prestasi', 'gambar' => 'artikel-16.jpg', 'tanggal' => '2026-09-09', 'judul' => 'Juara Harapan 2 Tingkat SMA/SMK/MA Sederajat', 'ringkasan' => 'BOGOR INNOVATION AWARDS 2026'],
        ];

        foreach ($data as $item) {
            Berita::updateOrCreate(
                ['judul' => $item['judul']], // kalau judul sama udah ada, di-update bukan dobel
                $item
            );
        }
    }
}