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
        $jadwals = YuniJadwal::with('posyandu')->latest()->paginate(10);
        $posyandus = YuniPosyandu::all();

        return view('admin.jadwal.index', compact('jadwals', 'posyandus'));
    }

    public function create()
    {
        $posyandus = YuniPosyandu::all();
        return view('admin.jadwal.create', compact('posyandus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'posyandu_id'      => 'required|exists:yuni_posyandus,id',
            'kegiatan'         => 'required|string|max:255',
            'jenis_kegiatan'   => 'required|string|max:100',
            'tanggal'          => 'required|date',
            'jam'              => 'required',
            'deskripsi'        => 'nullable|string',
            'target_peserta'   => 'nullable|string|max:255',
            'penanggung_jawab' => 'nullable|string|max:255',
            'status'           => 'required|in:Direncanakan,Berlangsung,Selesai,Dibatalkan',
            'catatan'          => 'nullable|string',
        ]);

        YuniJadwal::create($request->all());
        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil ditambahkan!');
    }

    public function show(YuniJadwal $jadwal)
    {
        return view('admin.jadwal.show', compact('jadwal'));
    }

    public function edit(YuniJadwal $jadwal)
    {
        $posyandus = YuniPosyandu::all();
        return view('admin.jadwal.edit', compact('jadwal', 'posyandus'));
    }

    public function update(Request $request, YuniJadwal $jadwal)
    {
        $request->validate([
            'posyandu_id'      => 'required|exists:yuni_posyandus,id',
            'kegiatan'         => 'required|string|max:255',
            'jenis_kegiatan'   => 'required|string|max:100',
            'tanggal'          => 'required|date',
            'jam'              => 'required',
            'deskripsi'        => 'nullable|string',
            'target_peserta'   => 'nullable|string|max:255',
            'penanggung_jawab' => 'nullable|string|max:255',
            'status'           => 'required|in:Direncanakan,Berlangsung,Selesai,Dibatalkan',
            'catatan'          => 'nullable|string',
        ]);

        $jadwal->update($request->all());
        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil diperbarui!');
    }

    public function destroy(YuniJadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil dihapus!');
    }
}
