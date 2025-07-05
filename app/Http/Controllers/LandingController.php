<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\YuniJadwal;
use App\Models\YuniBalita;
use App\Models\YuniKader;
use App\Models\YuniPosyandu;
use App\Models\Berita;
use Carbon\Carbon;

class LandingController extends Controller
{
    public function index()
    {
        // Get statistics from database
        $stats = [
            'bayi' => YuniBalita::where('tanggal_lahir', '>=', Carbon::now()->subYear())->count(),
            'balita' => YuniBalita::where('tanggal_lahir', '<', Carbon::now()->subYear())
                                 ->where('tanggal_lahir', '>=', Carbon::now()->subYears(5))->count(),
            'ibu_hamil' => 0, // You can add this table later
            'lansia' => 0, // You can add this table later
            'kader' => YuniKader::count(),
            'posyandu' => YuniPosyandu::count(),
        ];

        return view('landing.index', compact('stats'));
    }

    public function jadwal()
    {
        $jadwals = YuniJadwal::with('posyandu')->get();
        return view('landing.jadwal', compact('jadwals'));
    }

    public function showBerita()
    {
        $beritas = Berita::latest()->paginate(5);
        return view('landing.berita', compact('beritas'));
    }

    public function formDaftarAnak()
    {
        return view('landing.daftar-anak');
    }

    public function daftarAnak(Request $request)
    {
        $request->validate([
            'nama_balita' => 'required',
            'tanggal_lahir' => 'required|date',
            'nama_ortu' => 'required',
            'alamat' => 'nullable',
            'posyandu_id' => 'required|exists:yuni_posyandus,id',
        ]);
        YuniBalita::create($request->all());
        return redirect()->route('daftar.anak')->with('success', 'Pendaftaran anak berhasil!');
    }

    public function formCekAnak()
    {
        return view('landing.cek-anak');
    }

    public function cekAnak(Request $request)
    {
        $request->validate([
            'nama_balita' => 'required',
            'tanggal_lahir' => 'required|date',
        ]);
        $anak = YuniBalita::where('nama_balita', $request->nama_balita)
            ->where('tanggal_lahir', $request->tanggal_lahir)
            ->first();
        return view('landing.cek-anak', compact('anak'));
    }
}
