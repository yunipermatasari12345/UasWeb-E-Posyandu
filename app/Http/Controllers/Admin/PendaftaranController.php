<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\YuniPendaftaran;
use App\Models\YuniBalita;
use App\Models\YuniIbu;

class PendaftaranController extends Controller
{
    public function index()
    {
        $pendaftaran = YuniPendaftaran::with('user')->latest()->get();
        return view('admin.pendaftaran.index', compact('pendaftaran'));
    }

    public function show(string $id)
    {
        $pendaftaran = YuniPendaftaran::with('user')->findOrFail($id);
        return view('admin.pendaftaran.show', compact('pendaftaran'));
    }

    public function approve(string $id)
    {
        $pendaftaran = YuniPendaftaran::findOrFail($id);

        // Ambil posyandu pertama yang ada, atau null jika tidak ada
        $posyandu = \App\Models\YuniPosyandu::first();
        $posyandu_id = $posyandu ? $posyandu->id : null;

        if ($pendaftaran->jenis_pendaftaran == 'balita') {
            // Buat data balita baru
            YuniBalita::create([
                'nama_balita'    => $pendaftaran->nama_anak,
                'jenis_kelamin'  => $pendaftaran->jenis_kelamin ?? 'L',
                'tempat_lahir'   => $pendaftaran->tempat_lahir ?? '',
                'tanggal_lahir'  => $pendaftaran->tanggal_lahir,
                'berat_lahir'    => $pendaftaran->berat_lahir ?? 0,
                'panjang_lahir'  => $pendaftaran->panjang_lahir ?? 0,
                'umur'           => null, // Bisa dihitung otomatis di model jika perlu
                'nama_ortu'      => $pendaftaran->nama_ibu,
                'no_hp_ortu'     => $pendaftaran->no_hp ?? '',
                'alamat'         => $pendaftaran->alamat,
                'posyandu_id'    => $posyandu_id,
                'catatan'        => $pendaftaran->catatan ?? null,
            ]);
        } else {
            // Buat data ibu hamil baru
            YuniIbu::create([
                'nama_ibu' => $pendaftaran->nama_ibu,
                'nik' => $pendaftaran->nik_ibu,
                'alamat' => $pendaftaran->alamat,
                'no_hp' => $pendaftaran->no_hp,
                'posyandu_id' => $posyandu_id
            ]);
        }

        $pendaftaran->update([
            'status' => 'disetujui',
            'admin_id' => null, // Set null karena tidak ada tabel yuni_admins
            'tanggal_validasi' => now(),
            'catatan_admin' => 'Pendaftaran disetujui'
        ]);

        return redirect()->route('admin.pendaftaran.index')->with('success', 'Pendaftaran berhasil disetujui!');
    }

    public function reject(Request $request, string $id)
    {
        $request->validate([
            'catatan_admin' => 'required|string'
        ]);

        $pendaftaran = YuniPendaftaran::findOrFail($id);
        $pendaftaran->update([
            'status' => 'ditolak',
            'admin_id' => null, // Set null karena tidak ada tabel yuni_admins
            'tanggal_validasi' => now(),
            'catatan_admin' => $request->catatan_admin
        ]);

        return redirect()->route('admin.pendaftaran.index')->with('success', 'Pendaftaran ditolak!');
    }
}
