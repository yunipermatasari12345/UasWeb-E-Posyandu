<?php
// app/Http/Controllers/Admin/YuniKaderController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\YuniKader;
use App\Models\YuniPosyandu;
use Illuminate\Http\Request;

class YuniKaderController extends Controller
{
    public function index()
    {
        $kaders = YuniKader::with('posyandu')->latest()->paginate(10);
        $posyandus = YuniPosyandu::all();

        return view('admin.kader.index', compact('kaders', 'posyandus'));
    }

    public function create()
    {
        $posyandus = YuniPosyandu::all();
        return view('admin.kader.create', compact('posyandus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kader'       => 'required|string|max:255',
            'jenis_kelamin'    => 'required|in:L,P',
            'tempat_lahir'     => 'required|string|max:255',
            'tanggal_lahir'    => 'required|date',
            'alamat'           => 'required|string',
            'no_hp'            => 'required|string|max:20',
            'email'            => 'nullable|email|max:255',
            'pendidikan'       => 'required|string|max:100',
            'pekerjaan'        => 'required|string|max:255',
            'posyandu_id'      => 'required|exists:yuni_posyandus,id',
            'tanggal_bergabung' => 'required|date',
        ]);

        YuniKader::create($request->all());
        return redirect()->route('admin.kader.index')->with('success', 'Data kader berhasil ditambahkan!');
    }

    public function show(YuniKader $kader)
    {
        return view('admin.kader.show', compact('kader'));
    }

    public function edit(YuniKader $kader)
    {
        $posyandus = YuniPosyandu::all();
        return view('admin.kader.edit', compact('kader', 'posyandus'));
    }

    public function update(Request $request, YuniKader $kader)
    {
        $request->validate([
            'nama_kader'       => 'required|string|max:255',
            'jenis_kelamin'    => 'required|in:L,P',
            'tempat_lahir'     => 'required|string|max:255',
            'tanggal_lahir'    => 'required|date',
            'alamat'           => 'required|string',
            'no_hp'            => 'required|string|max:20',
            'email'            => 'nullable|email|max:255',
            'pendidikan'       => 'required|string|max:100',
            'pekerjaan'        => 'required|string|max:255',
            'posyandu_id'      => 'required|exists:yuni_posyandus,id',
            'tanggal_bergabung' => 'required|date',
        ]);

        $kader->update($request->all());
        return redirect()->route('admin.kader.index')->with('success', 'Data kader berhasil diperbarui!');
    }

    public function destroy(YuniKader $kader)
    {
        $kader->delete();
        return redirect()->route('admin.kader.index')->with('success', 'Data kader berhasil dihapus!');
    }
}
