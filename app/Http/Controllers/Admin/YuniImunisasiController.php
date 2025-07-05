<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\YuniImunisasi;
use App\Models\YuniPosyandu;

class YuniImunisasiController extends Controller
{
    public function index()
    {
        $data = YuniImunisasi::with('posyandu')->latest()->paginate(10);
        return view('admin.imunisasi.index', compact('data'));
    }

    public function create()
    {
        $posyandus = YuniPosyandu::orderBy('nama_posyandu')->get();
        return view('admin.imunisasi.create', compact('posyandus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_imunisasi' => 'required|string|max:100',
            'tanggal' => 'required|date',
            'posyandu_id' => 'required|exists:yuni_posyandus,id',
        ]);
        YuniImunisasi::create($request->all());
        return redirect()->route('admin.imunisasi.index')->with('success', 'Data imunisasi ditambahkan');
    }

    public function edit(YuniImunisasi $imunisasi)
    {
        $posyandus = YuniPosyandu::orderBy('nama_posyandu')->get();
        return view('admin.imunisasi.edit', compact('imunisasi', 'posyandus'));
    }

    public function update(Request $request, YuniImunisasi $imunisasi)
    {
        $request->validate([
            'nama_imunisasi' => 'required|string|max:100',
            'tanggal' => 'required|date',
            'posyandu_id' => 'required|exists:yuni_posyandus,id',
        ]);
        $imunisasi->update($request->all());
        return redirect()->route('admin.imunisasi.index')->with('success', 'Data imunisasi diperbarui');
    }

    public function destroy(YuniImunisasi $imunisasi)
    {
        $imunisasi->delete();
        return back()->with('success', 'Data imunisasi dihapus');
    }
}
