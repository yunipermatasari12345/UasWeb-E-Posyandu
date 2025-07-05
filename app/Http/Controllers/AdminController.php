<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $posyandus = \App\Models\YuniPosyandu::latest()->take(5)->get();
        $kaders    = \App\Models\YuniKader::latest()->take(5)->get();
        $balitas   = \App\Models\YuniBalita::latest()->take(5)->get();
        $jadwals   = \App\Models\YuniJadwal::with('posyandu')->latest()->take(5)->get();
        return view('admin.dashboard', compact('posyandus', 'kaders', 'balitas', 'jadwals'));
    }
}
