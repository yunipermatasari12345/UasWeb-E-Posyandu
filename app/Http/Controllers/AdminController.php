<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $posyandus = \App\Models\YuniPosyandu::all();
        $kaders    = \App\Models\YuniKader::all();
        $balitas   = \App\Models\YuniBalita::all();
        $jadwals   = \App\Models\YuniJadwal::all();
        $beritas   = \App\Models\YuniBerita::all();
        $pemeriksaans = \App\Models\YuniPemeriksaan::all();
        return view('admin.dashboard', compact('posyandus', 'kaders', 'balitas', 'jadwals', 'beritas', 'pemeriksaans'));
    }
}
