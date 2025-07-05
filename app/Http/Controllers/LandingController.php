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
}
