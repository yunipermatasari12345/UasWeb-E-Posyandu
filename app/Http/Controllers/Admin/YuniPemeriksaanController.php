<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\YuniPemeriksaan;
use App\Models\YuniBalita;
use App\Models\YuniKader;
use App\Models\User;

class YuniPemeriksaanController extends Controller
{
    public function index()
    {
        $data = YuniPemeriksaan::with(['balita', 'kader', 'user'])->latest()->paginate(10);
        return view('admin.pemeriksaan.index', compact('data'));
    }

    public function create()
    {
        $balitas = YuniBalita::all();
        $kaders = YuniKader::all();
        $users = User::all();
        return view('admin.pemeriksaan.create', compact('balitas', 'kaders', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'balita_id' => 'required|exists:yuni_balitas,id',
            'kader_id' => 'required|exists:yuni_kaders,id',
            'user_id' => 'required|exists:users,id',
            'tanggal' => 'required|date',
            'berat_badan' => 'required|numeric|min:0',
            'tinggi_badan' => 'required|numeric|min:0',
            'catatan' => 'nullable|string',
        ]);
        YuniPemeriksaan::create($request->all());
        return redirect()->route('admin.pemeriksaan.index')->with('success', 'Data pemeriksaan berhasil ditambahkan!');
    }

    public function show(YuniPemeriksaan $pemeriksaan)
    {
        return view('admin.pemeriksaan.show', compact('pemeriksaan'));
    }

    public function edit(YuniPemeriksaan $pemeriksaan)
    {
        $balitas = YuniBalita::all();
        $kaders = YuniKader::all();
        $users = User::all();
        return view('admin.pemeriksaan.edit', compact('pemeriksaan', 'balitas', 'kaders', 'users'));
    }

    public function update(Request $request, YuniPemeriksaan $pemeriksaan)
    {
        $request->validate([
            'balita_id' => 'required|exists:yuni_balitas,id',
            'kader_id' => 'required|exists:yuni_kaders,id',
            'user_id' => 'required|exists:users,id',
            'tanggal' => 'required|date',
            'berat_badan' => 'required|numeric|min:0',
            'tinggi_badan' => 'required|numeric|min:0',
            'catatan' => 'nullable|string',
        ]);
        $pemeriksaan->update($request->all());
        return redirect()->route('admin.pemeriksaan.index')->with('success', 'Data pemeriksaan berhasil diperbarui!');
    }

    public function destroy(YuniPemeriksaan $pemeriksaan)
    {
        $pemeriksaan->delete();
        return redirect()->route('admin.pemeriksaan.index')->with('success', 'Data pemeriksaan berhasil dihapus!');
    }
}
