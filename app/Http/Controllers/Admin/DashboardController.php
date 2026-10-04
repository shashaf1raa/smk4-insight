<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Pesan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBerita = Berita::count();
        $totalPesan = Pesan::count();
        $pesanBelumDibaca = Pesan::where('dibaca', false)->count();

        return view('admin.dashboard', compact('totalBerita', 'totalPesan', 'pesanBelumDibaca'));
    }
}