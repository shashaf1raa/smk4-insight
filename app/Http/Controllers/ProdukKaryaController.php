<?php

namespace App\Http\Controllers;

use App\Models\ProdukKarya;
use Illuminate\Http\Request;

class ProdukKaryaController extends Controller
{
    public function index(Request $request)
    {
        $jurusan = $request->query('jurusan', 'semua');

        $query = ProdukKarya::query()->orderBy('created_at', 'desc');

        if ($jurusan !== 'semua') {
            $query->where('jurusan', strtoupper($jurusan));
        }

        $karyaList = $query->get();

        return view('produk-karya', compact('karyaList', 'jurusan'));
    }

    public function show(ProdukKarya $karya)
    {
        return view('produk-karya-detail', compact('karya'));
    }
}