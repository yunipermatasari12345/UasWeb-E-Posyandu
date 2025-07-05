<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\YuniPemeriksaan;

class YuniPemeriksaanController extends Controller
{
    public function index()
    {
        $data = YuniPemeriksaan::with(['balita', 'kader', 'user'])->latest()->paginate(10);
        return view('admin.pemeriksaan.index', compact('data'));
    }
    // CRUD lain bisa ditambah sesuai kebutuhan
}
