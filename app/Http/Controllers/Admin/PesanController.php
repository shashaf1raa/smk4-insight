<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesan;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status', 'semua');

        $query = Pesan::query()->orderBy('created_at', 'desc');

        if ($status === 'unread') {
            $query->where('dibaca', false);
        } elseif ($status === 'read') {
            $query->where('dibaca', true);
        }

        $pesanList = $query->paginate(10)->withQueryString();

        $totalPesan = Pesan::count();
        $totalUnread = Pesan::where('dibaca', false)->count();

        return view('admin.pesan.index', compact('pesanList', 'status', 'totalPesan', 'totalUnread'));
    }

    public function show(Pesan $pesan)
    {
        if (!$pesan->dibaca) {
            $pesan->update(['dibaca' => true]);
        }

        return view('admin.pesan.show', compact('pesan'));
    }

    public function destroy(Pesan $pesan)
    {
        $pesan->delete();

        return redirect()->route('admin.pesan.index')->with('success', 'Pesan berhasil dihapus.');
    }
}