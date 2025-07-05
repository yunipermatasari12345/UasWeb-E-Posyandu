<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\YuniPosyandu;
use Illuminate\Http\Request;

class YuniPosyanduController extends Controller
{
    public function index()
    {
        $data = YuniPosyandu::latest()->paginate(10);
        return view('admin.posyandu.index', compact('data'));
    }

    public function create()
    {
        return view('admin.posyandu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_posyandu' => 'required|string|max:255',
            'alamat'        => 'required|string',
            'kelurahan'     => 'required|string|max:100',
        ]);

        YuniPosyandu::create($request->all());
        return redirect()->route('admin.posyandu.index')->with('success', 'Posyandu ditambahkan');
    }

    public function edit(YuniPosyandu $posyandu)
    {
        return view('admin.posyandu.edit', compact('posyandu'));
    }

    public function update(Request $request, YuniPosyandu $posyandu)
    {
        $request->validate([
            'nama_posyandu' => 'required|string|max:255',
            'alamat'        => 'required|string',
            'kelurahan'     => 'required|string|max:100',
        ]);

        $posyandu->update($request->all());
        return redirect()->route('admin.posyandu.index')->with('success', 'Posyandu diperbarui');
    }

    public function destroy(YuniPosyandu $posyandu)
    {
        $posyandu->delete();
        return back()->with('success', 'Posyandu dihapus');
    }
}
