<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\YuniPosyandu;
use App\Models\YuniKader;
use App\Models\YuniBalita;
use App\Models\YuniJadwal;
use Illuminate\Http\Request;

class YuniPosyanduController extends Controller
{
    public function index()
    {
        $posyandus = YuniPosyandu::latest()->paginate(10);
        $kaders = YuniKader::all();
        $balitas = YuniBalita::all();
        $jadwals = YuniJadwal::all();

        return view('admin.posyandu.index', compact('posyandus', 'kaders', 'balitas', 'jadwals'));
    }

    public function create()
    {
        return view('admin.posyandu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_posyandu' => 'required|string|max:255',
            'alamat'        => 'required|string',
            'kelurahan'     => 'required|string|max:100',
            'kecamatan'     => 'required|string|max:100',
            'no_hp'         => 'required|string|max:20',
            'email'         => 'nullable|email|max:255',
            'nama_ketua'    => 'required|string|max:255',
            'no_hp_ketua'   => 'nullable|string|max:20',
            'deskripsi'     => 'nullable|string',
        ]);

        YuniPosyandu::create($request->all());
        return redirect()->route('admin.posyandu.index')->with('success', 'Posyandu berhasil ditambahkan!');
    }

    public function show(YuniPosyandu $posyandu)
    {
        return view('admin.posyandu.show', compact('posyandu'));
    }

    public function edit(YuniPosyandu $posyandu)
    {
        return view('admin.posyandu.edit', compact('posyandu'));
    }

    public function update(Request $request, YuniPosyandu $posyandu)
    {
        $request->validate([
            'nama_posyandu' => 'required|string|max:255',
            'alamat'        => 'required|string',
            'kelurahan'     => 'required|string|max:100',
            'kecamatan'     => 'required|string|max:100',
            'no_hp'         => 'required|string|max:20',
            'email'         => 'nullable|email|max:255',
            'nama_ketua'    => 'required|string|max:255',
            'no_hp_ketua'   => 'nullable|string|max:20',
            'deskripsi'     => 'nullable|string',
        ]);

        $posyandu->update($request->all());
        return redirect()->route('admin.posyandu.index')->with('success', 'Posyandu berhasil diperbarui!');
    }

    public function destroy(YuniPosyandu $posyandu)
    {
        $posyandu->delete();
        return redirect()->route('admin.posyandu.index')->with('success', 'Posyandu berhasil dihapus!');
    }
}
