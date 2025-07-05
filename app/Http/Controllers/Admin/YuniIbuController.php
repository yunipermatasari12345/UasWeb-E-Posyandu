<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\YuniIbu;
use App\Models\YuniPosyandu;

class YuniIbuController extends Controller
{
    public function index()
    {
        $data = YuniIbu::with('posyandu')->latest()->paginate(10);
        return view('admin.ibu.index', compact('data'));
    }

    public function create()
    {
        $posyandus = YuniPosyandu::orderBy('nama_posyandu')->get();
        return view('admin.ibu.create', compact('posyandus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ibu' => 'required|string|max:100',
            'nik' => 'nullable|string|max:30',
            'alamat' => 'nullable|string|max:255',
            'no_hp' => 'nullable|string|max:20',
            'posyandu_id' => 'required|exists:yuni_posyandus,id',
        ]);
        YuniIbu::create($request->all());
        return redirect()->route('admin.ibu.index')->with('success', 'Data ibu ditambahkan');
    }

    public function edit(YuniIbu $ibu)
    {
        $posyandus = YuniPosyandu::orderBy('nama_posyandu')->get();
        return view('admin.ibu.edit', compact('ibu', 'posyandus'));
    }

    public function update(Request $request, YuniIbu $ibu)
    {
        $request->validate([
            'nama_ibu' => 'required|string|max:100',
            'nik' => 'nullable|string|max:30',
            'alamat' => 'nullable|string|max:255',
            'no_hp' => 'nullable|string|max:20',
            'posyandu_id' => 'required|exists:yuni_posyandus,id',
        ]);
        $ibu->update($request->all());
        return redirect()->route('admin.ibu.index')->with('success', 'Data ibu diperbarui');
    }

    public function destroy(YuniIbu $ibu)
    {
        $ibu->delete();
        return back()->with('success', 'Data ibu dihapus');
    }
}
