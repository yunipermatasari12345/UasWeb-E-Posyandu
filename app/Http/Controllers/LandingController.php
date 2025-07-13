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
        $posyandus = \App\Models\YuniPosyandu::all();
        return view('landing.daftar-anak', compact('posyandus'));
    }

    public function daftarAnak(Request $request)
    {
        $request->validate([
            'nama_balita' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'berat_lahir' => 'required|numeric|min:0',
            'panjang_lahir' => 'required|numeric|min:0',
            'no_hp_ortu' => 'required',
            'nama_ortu' => 'required',
            'alamat' => 'nullable',
            'posyandu_id' => 'required|exists:yuni_posyandus,id',
        ]);

        \App\Models\YuniPendaftaran::create([
            'user_id' => null, // Belum login
            'nama_anak' => $request->nama_balita,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin ?? 'L',
            'nama_ibu' => $request->nama_ortu,
            'nik_ibu' => null,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp_ortu,
            'jenis_pendaftaran' => 'balita',
            'usia_kehamilan' => null,
            'catatan' => null,
            'status' => 'pending',
            'admin_id' => null,
            'tanggal_validasi' => null,
        ]);
        return redirect()->route('daftar.anak')->with('success', 'Pendaftaran anak berhasil! Menunggu validasi admin.');
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
        $pendaftaran = \App\Models\YuniPendaftaran::where('nama_anak', $request->nama_balita)
            ->where('tanggal_lahir', $request->tanggal_lahir)
            ->latest()->first();
        return view('landing.cek-anak', compact('pendaftaran'));
    }
}
