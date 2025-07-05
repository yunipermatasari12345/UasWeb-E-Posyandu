<?php
// app/Http/Controllers/Admin/YuniKaderController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\YuniKader;
use App\Models\YuniPosyandu;
use Illuminate\Http\Request;

class YuniKaderController extends Controller
{
    public function index()
    {
        $data = YuniKader::with('posyandu')->latest()->paginate(10);
        return view('admin.kader.index', compact('data'));
    }

    public function create()
    {
        $posyandus = YuniPosyandu::orderBy('nama_posyandu')->get();
        return view('admin.kader.create', compact('posyandus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kader'  => 'required|string|max:255',
            'no_hp'       => 'nullable|string|max:20',
            'posyandu_id' => 'required|exists:yuni_posyandus,id',
        ]);

        YuniKader::create($request->all());
        return redirect()->route('admin.kader.index')
                         ->with('success', 'Kader ditambahkan');
    }

    public function edit(YuniKader $kader)
    {
        $posyandus = YuniPosyandu::orderBy('nama_posyandu')->get();
        return view('admin.kader.edit', compact('kader', 'posyandus'));
    }

    public function update(Request $request, YuniKader $kader)
    {
        $request->validate([
            'nama_kader'  => 'required|string|max:255',
            'no_hp'       => 'nullable|string|max:20',
            'posyandu_id' => 'required|exists:yuni_posyandus,id',
        ]);

        $kader->update($request->all());
        return redirect()->route('admin.kader.index')
                         ->with('success', 'Kader diperbarui');
    }

    public function destroy(YuniKader $kader)
    {
        $kader->delete();
        return back()->with('success', 'Kader dihapus');
    }
}
