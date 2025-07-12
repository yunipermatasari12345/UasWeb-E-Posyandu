<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\YuniAnak;
use App\Models\YuniBalita;
use App\Models\YuniIbu;

class StatistikController extends Controller
{
    public function index()
    {
        $jumlahBayi    = YuniAnak::count();
        $jumlahBalita  = YuniBalita::count();
        $jumlahIbu     = YuniIbu::count();
        $jumlahLansia  = 0; // Dummy, jika ada tabel lansia bisa diganti
        $anaks = YuniAnak::all();
        $balitas = YuniBalita::all();
        $ibus = YuniIbu::all();
        $lansias = collect(); // Dummy
        return view('statistik', compact('jumlahBayi', 'jumlahBalita', 'jumlahIbu', 'jumlahLansia', 'anaks', 'balitas', 'ibus', 'lansias'));
    }
}
