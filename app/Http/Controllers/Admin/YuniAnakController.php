<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\YuniAnak;
use App\Models\YuniIbu;
use App\Models\YuniPosyandu;

class YuniAnakController extends Controller
{
    public function index()
    {
        $data = YuniAnak::with(['ibu', 'posyandu'])->latest()->paginate(10);
        return view('admin.anak.index', compact('data'));
    }

    public function create()
    {
        $ibus = YuniIbu::orderBy('nama_ibu')->get();
        $posyandus = YuniPosyandu::orderBy('nama_posyandu')->get();
        return view('admin.anak.create', compact('ibus', 'posyandus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_anak' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'ibu_id' => 'required|exists:yuni_ibus,id',
            'posyandu_id' => 'required|exists:yuni_posyandus,id',
        ]);
        YuniAnak::create($request->all());
        return redirect()->route('admin.anak.index')->with('success', 'Data anak ditambahkan');
    }

    public function edit(YuniAnak $anak)
    {
        $ibus = YuniIbu::orderBy('nama_ibu')->get();
        $posyandus = YuniPosyandu::orderBy('nama_posyandu')->get();
        return view('admin.anak.edit', compact('anak', 'ibus', 'posyandus'));
    }

    public function update(Request $request, YuniAnak $anak)
    {
        $request->validate([
            'nama_anak' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'ibu_id' => 'required|exists:yuni_ibus,id',
            'posyandu_id' => 'required|exists:yuni_posyandus,id',
        ]);
        $anak->update($request->all());
        return redirect()->route('admin.anak.index')->with('success', 'Data anak diperbarui');
    }

    public function destroy(YuniAnak $anak)
    {
        $anak->delete();
        return back()->with('success', 'Data anak dihapus');
    }
}
