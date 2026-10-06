<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProdukKarya;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProdukKaryaController extends Controller
{
    public function index()
    {
        $produkList = ProdukKarya::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.produk.index', compact('produkList'));
    }

    public function create()
    {
        return view('admin.produk.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'jurusan' => ['required', 'in:PPLG,TJKT,TKRO,TPFL'],
            'judul' => ['required', 'string', 'max:255'],
            'siswa' => ['nullable', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
            'harga' => ['required', 'numeric', 'min:0'],
            'foto' => ['nullable', 'image', 'max:8192'],
        ]);

        $baseSlug = Str::slug($data['judul']);
        $slug = $baseSlug;
        $i = 1;
        while (ProdukKarya::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $i++;
        }
        $data['slug'] = $slug;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . preg_replace('/\s+/', '-', $file->getClientOriginalName());
            file_put_contents(public_path('images/' . $filename), file_get_contents($file->getRealPath()));
            $data['foto'] = $filename;
        }

        ProdukKarya::create($data);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(ProdukKarya $produk)
    {
        return view('admin.produk.edit', compact('produk'));
    }

    public function update(Request $request, ProdukKarya $produk)
    {
        $data = $request->validate([
            'jurusan' => ['required', 'in:PPLG,TJKT,TKRO,TPFL'],
            'judul' => ['required', 'string', 'max:255'],
            'siswa' => ['nullable', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
            'harga' => ['required', 'numeric', 'min:0'],
            'foto' => ['nullable', 'image', 'max:8192'],
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . preg_replace('/\s+/', '-', $file->getClientOriginalName());
            file_put_contents(public_path('images/' . $filename), file_get_contents($file->getRealPath()));
            $data['foto'] = $filename;
        }

        $produk->update($data);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(ProdukKarya $produk)
    {
        $produk->delete();

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}