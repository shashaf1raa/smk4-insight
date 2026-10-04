<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $beritaList = Berita::orderBy('tanggal', 'desc')->paginate(10);

        return view('admin.berita.index', compact('beritaList'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kategori' => ['required', 'in:kegiatan,prestasi,pengumuman'],
            'tanggal' => ['required', 'date'],
            'judul' => ['required', 'string', 'max:255'],
            'ringkasan' => ['nullable', 'string'],
            'isi' => ['nullable', 'string'],
            'gambar' => ['nullable', 'image', 'max:8192'],
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . preg_replace('/\s+/', '-', $file->getClientOriginalName());
            file_put_contents(public_path('images/' . $filename), file_get_contents($file->getRealPath()));
            $data['gambar'] = $filename;
        }

        Berita::create($data);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $data = $request->validate([
            'kategori' => ['required', 'in:kegiatan,prestasi,pengumuman'],
            'tanggal' => ['required', 'date'],
            'judul' => ['required', 'string', 'max:255'],
            'ringkasan' => ['nullable', 'string'],
            'isi' => ['nullable', 'string'],
            'gambar' => ['nullable', 'image', 'max:8192'],
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . preg_replace('/\s+/', '-', $file->getClientOriginalName());
            file_put_contents(public_path('images/' . $filename), file_get_contents($file->getRealPath()));
            $data['gambar'] = $filename;
        }

        $berita->update($data);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}