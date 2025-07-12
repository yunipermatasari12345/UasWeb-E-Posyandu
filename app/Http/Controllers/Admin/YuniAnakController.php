<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\YuniAnak;

class YuniAnakController extends Controller
{
    public function index()
    {
        $anaks = YuniAnak::all();
        return view('admin.anak.index', compact('anaks'));
    }
}
