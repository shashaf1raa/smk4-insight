<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $kategori = $request->query('kategori', 'semua');
        $cari = $request->query('cari');

        $query = Berita::query()->orderBy('tanggal', 'desc');

        if ($kategori !== 'semua') {
            $query->where('kategori', strtolower($kategori));
        }

        if ($cari) {
            $query->where('judul', 'like', '%' . $cari . '%');
        }

        $beritaList = $query->paginate(6)->withQueryString();

        return view('berita', compact('beritaList', 'kategori', 'cari'));
    }

    public function show(Berita $berita)
    {
        $beritaLain = Berita::where('id', '!=', $berita->id)
            ->where('kategori', $berita->kategori)
            ->orderBy('tanggal', 'desc')
            ->take(3)
            ->get();

        return view('berita-detail', compact('berita', 'beritaLain'));
    }
}