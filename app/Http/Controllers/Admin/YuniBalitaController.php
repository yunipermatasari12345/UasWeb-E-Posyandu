<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\YuniBalita;
use App\Models\YuniPosyandu;
use App\Models\YuniKader;
use App\Models\YuniJadwal;
use Illuminate\Http\Request;
use Carbon\Carbon;

class YuniBalitaController extends Controller
{
    public function index()
    {
        $balitas = YuniBalita::with('posyandu')->latest()->paginate(10);
        $posyandus = YuniPosyandu::all();
        $kaders = YuniKader::all();
        $jadwals = YuniJadwal::all();

        return view('admin.balita.index', compact('balitas', 'posyandus', 'kaders', 'jadwals'));
    }

    public function create()
    {
        $posyandus = YuniPosyandu::all();
        return view('admin.balita.create', compact('posyandus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_balita'   => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir'  => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'berat_lahir'   => 'required|numeric|min:0',
            'panjang_lahir' => 'required|numeric|min:0',
            'nama_ortu'     => 'required|string|max:255',
            'no_hp_ortu'    => 'required|string|max:20',
            'alamat'        => 'required|string',
            'posyandu_id'   => 'required|exists:yuni_posyandus,id',
            'catatan'       => 'nullable|string',
        ]);

        $data = $request->all();

        // Hitung umur dalam bulan
        $tanggal_lahir = Carbon::parse($request->tanggal_lahir);
        $data['umur'] = $tanggal_lahir->diffInMonths(Carbon::now());

        YuniBalita::create($data);
        return redirect()->route('admin.balita.index')->with('success', 'Data balita berhasil ditambahkan!');
    }

    public function show(YuniBalita $balita)
    {
        return view('admin.balita.show', compact('balita'));
    }

    public function edit(YuniBalita $balita)
    {
        $posyandus = YuniPosyandu::all();
        return view('admin.balita.edit', compact('balita', 'posyandus'));
    }

    public function update(Request $request, YuniBalita $balita)
    {
        $request->validate([
            'nama_balita'   => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir'  => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'berat_lahir'   => 'required|numeric|min:0',
            'panjang_lahir' => 'required|numeric|min:0',
            'nama_ortu'     => 'required|string|max:255',
            'no_hp_ortu'    => 'required|string|max:20',
            'alamat'        => 'required|string',
            'posyandu_id'   => 'required|exists:yuni_posyandus,id',
            'catatan'       => 'nullable|string',
        ]);

        $data = $request->all();

        // Hitung umur dalam bulan
        $tanggal_lahir = Carbon::parse($request->tanggal_lahir);
        $data['umur'] = $tanggal_lahir->diffInMonths(Carbon::now());

        $balita->update($data);
        return redirect()->route('admin.balita.index')->with('success', 'Data balita berhasil diperbarui!');
    }

    public function destroy(YuniBalita $balita)
    {
        $balita->delete();
        return redirect()->route('admin.balita.index')->with('success', 'Data balita berhasil dihapus!');
    }
}
