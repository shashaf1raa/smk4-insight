<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukKaryaController extends Controller
{
    /**
     * Satu sumber data dipakai bareng: buat daftar (index) dan halaman detail (show).
     * NOTE: harga di bawah ini masih ESTIMASI dari saya, silakan disesuaikan
     * dengan harga jasa/barang yang sebenarnya.
     */
    public static function all(): array
    {
        return [
            [
                'slug' => 'votesmartk4',
                'jurusan' => 'PPLG',
                'foto' => 'karya-1.jpg',
                'judul' => 'VoteSmartK4 - Sistem Pemilihan Ketua OSIS Berbasis Web',
                'siswa' => 'Tim PPLG Kelas XII',
                'deskripsi' => 'Inovasi siswa PPLG dalam mengembangkan sistem pemilihan Ketua OSIS yang efektif, tertata, dan berbasis teknologi digital.',
                'harga' => 500000,
            ],
           
        ];
    }

    public function index(Request $request)
    {
        $jurusan = $request->query('jurusan', 'semua');

        $karyaList = collect(self::all());

        if ($jurusan !== 'semua') {
            $karyaList = $karyaList->filter(function ($item) use ($jurusan) {
                return strtolower($item['jurusan']) === strtolower($jurusan);
            });
        }

        $karyaList = $karyaList->values();

        return view('produk-karya', compact('karyaList', 'jurusan'));
    }

    public function show(string $slug)
    {
        $karya = collect(self::all())->firstWhere('slug', $slug);

        if (!$karya) {
            abort(404);
        }

        return view('produk-karya-detail', compact('karya'));
    }
}