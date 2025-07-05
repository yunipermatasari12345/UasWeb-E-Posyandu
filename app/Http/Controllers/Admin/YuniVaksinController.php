<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\YuniVaksin;
use App\Models\YuniPosyandu;

class YuniVaksinController extends Controller
{
    public function index()
    {
        $data = YuniVaksin::with('posyandu')->latest()->paginate(10);
        return view('admin.vaksin.index', compact('data'));
    }

    public function create()
    {
        $posyandus = YuniPosyandu::orderBy('nama_posyandu')->get();
        return view('admin.vaksin.create', compact('posyandus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_vaksin' => 'required|string|max:100',
            'tanggal' => 'required|date',
            'posyandu_id' => 'required|exists:yuni_posyandus,id',
        ]);
        YuniVaksin::create($request->all());
        return redirect()->route('admin.vaksin.index')->with('success', 'Data vaksin ditambahkan');
    }

    public function edit(YuniVaksin $vaksin)
    {
        $posyandus = YuniPosyandu::orderBy('nama_posyandu')->get();
        return view('admin.vaksin.edit', compact('vaksin', 'posyandus'));
    }

    public function update(Request $request, YuniVaksin $vaksin)
    {
        $request->validate([
            'nama_vaksin' => 'required|string|max:100',
            'tanggal' => 'required|date',
            'posyandu_id' => 'required|exists:yuni_posyandus,id',
        ]);
        $vaksin->update($request->all());
        return redirect()->route('admin.vaksin.index')->with('success', 'Data vaksin diperbarui');
    }

    public function destroy(YuniVaksin $vaksin)
    {
        $vaksin->delete();
        return back()->with('success', 'Data vaksin dihapus');
    }
}
