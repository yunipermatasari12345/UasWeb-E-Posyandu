<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\YuniJadwal;
use App\Models\YuniPosyandu;
use Illuminate\Http\Request;

class YuniJadwalController extends Controller
{
    public function index()
    {
        $data = YuniJadwal::with('posyandu')->orderBy('tanggal', 'desc')->paginate(10);
        return view('admin.jadwal.index', compact('data'));
    }

    public function create()
    {
        $posyandus = YuniPosyandu::orderBy('nama_posyandu')->get();
        return view('admin.jadwal.create', compact('posyandus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal'     => 'required|date',
            'jam'         => 'required',
            'kegiatan'    => 'required|string|max:150',
            'posyandu_id' => 'required|exists:yuni_posyandus,id',
        ]);

        YuniJadwal::create($request->all());
        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal ditambahkan');
    }

    public function edit(YuniJadwal $jadwal)
    {
        $posyandus = YuniPosyandu::orderBy('nama_posyandu')->get();
        return view('admin.jadwal.edit', compact('jadwal', 'posyandus'));
    }

    public function update(Request $request, YuniJadwal $jadwal)
    {
        $request->validate([
            'tanggal'     => 'required|date',
            'jam'         => 'required',
            'kegiatan'    => 'required|string|max:150',
            'posyandu_id' => 'required|exists:yuni_posyandus,id',
        ]);

        $jadwal->update($request->all());
        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal diperbarui');
    }

    public function destroy(YuniJadwal $jadwal)
    {
        $jadwal->delete();
        return back()->with('success', 'Jadwal dihapus');
    }
}
