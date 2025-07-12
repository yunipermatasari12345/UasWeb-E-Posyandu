<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class YuniLansiaController extends Controller
{
    public function index()
    {
        $lansias = collect(); // Dummy kosong, bisa diganti model jika sudah ada
        return view('admin.lansia.index', compact('lansias'));
    }
}
