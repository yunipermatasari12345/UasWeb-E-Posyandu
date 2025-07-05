<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\YuniBerita;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class YuniBeritaController extends Controller
{
    public function index()
    {
        $beritas = YuniBerita::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:yuni_beritas',
            'kategori' => 'required|string|max:100',
            'ringkasan' => 'required|string|max:500',
            'konten' => 'required|string',
            'penulis' => 'required|string|max:100',
            'status' => 'required|in:draft,published',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->storeAs('public/berita', $gambarName);
            $data['gambar'] = 'berita/' . $gambarName;
        }

        YuniBerita::create($data);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan!');
    }

    public function show(YuniBerita $berita)
    {
        return view('admin.berita.show', compact('berita'));
    }

    public function edit(YuniBerita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, YuniBerita $berita)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:yuni_beritas,slug,' . $berita->id,
            'kategori' => 'required|string|max:100',
            'ringkasan' => 'required|string|max:500',
            'konten' => 'required|string',
            'penulis' => 'required|string|max:100',
            'status' => 'required|in:draft,published',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('gambar')) {
            // Delete old image
            if ($berita->gambar) {
                Storage::delete('public/' . $berita->gambar);
            }

            $gambar = $request->file('gambar');
            $gambarName = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->storeAs('public/berita', $gambarName);
            $data['gambar'] = 'berita/' . $gambarName;
        }

        $berita->update($data);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(YuniBerita $berita)
    {
        // Delete image if exists
        if ($berita->gambar) {
            Storage::delete('public/' . $berita->gambar);
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus!');
    }
}
