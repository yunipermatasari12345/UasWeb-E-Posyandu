<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\YuniBalita;
use Illuminate\Http\Request;

class YuniBalitaController extends Controller
{
    public function index()
{
    $balitas = YuniBalita::latest()->paginate(10);
    return view('admin.balita.index', compact('balitas'));
}

    public function create()
    {
        return view('admin.balita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_balita'   => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'nama_ortu'     => 'required|string|max:255',
            'alamat'        => 'nullable|string|max:255',
        ]);

        YuniBalita::create($request->all());
        return redirect()->route('admin.balita.index')->with('success', 'Balita ditambahkan');
    }

    public function edit(YuniBalita $balita)
    {
        return view('admin.balita.edit', compact('balita'));
    }

    public function update(Request $request, YuniBalita $balita)
    {
        $request->validate([
            'nama_balita'   => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'nama_ortu'     => 'required|string|max:255',
            'alamat'        => 'nullable|string|max:255',
        ]);

        $balita->update($request->all());
        return redirect()->route('admin.balita.index')->with('success', 'Balita diperbarui');
    }

    public function destroy(YuniBalita $balita)
    {
        $balita->delete();
        return back()->with('success', 'Balita dihapus');
    }
}
