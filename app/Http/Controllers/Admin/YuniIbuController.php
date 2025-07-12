<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\YuniIbu;

class YuniIbuController extends Controller
{
    public function index()
    {
        $ibus = YuniIbu::all();
        return view('admin.ibu.index', compact('ibus'));
    }
}
