<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\YuniPendaftaran;
use App\Models\YuniPengaduan;
use App\Models\YuniPengumuman;
use App\Models\YuniJadwal;
use App\Models\YuniRiwayatPenimbangan;
use App\Models\YuniBalita;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        $pendaftaran = YuniPendaftaran::where('user_id', $user->id)->latest()->get();
        $pengaduan = YuniPengaduan::where('user_id', $user->id)->latest()->get();
        $pengumuman = YuniPengumuman::where('is_aktif', true)->latest()->take(5)->get();
        $jadwal = YuniJadwal::latest()->take(5)->get();

        return view('user.dashboard', compact('pendaftaran', 'pengaduan', 'pengumuman', 'jadwal'));
    }

    public function pendaftaran()
    {
        return view('user.pendaftaran');
    }

    public function storePendaftaran(Request $request)
    {
        $request->validate([
            'nama_anak' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'nama_ibu' => 'required|string|max:100',
            'nik_ibu' => 'nullable|string|max:30',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'jenis_pendaftaran' => 'required|in:balita,ibu_hamil',
            'usia_kehamilan' => 'nullable|integer|min:1|max:42',
            'catatan' => 'nullable|string'
        ]);

        YuniPendaftaran::create([
            'user_id' => auth()->id(),
            'nama_anak' => $request->nama_anak,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nama_ibu' => $request->nama_ibu,
            'nik_ibu' => $request->nik_ibu,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'jenis_pendaftaran' => $request->jenis_pendaftaran,
            'usia_kehamilan' => $request->usia_kehamilan,
            'catatan' => $request->catatan,
            'status' => 'pending'
        ]);

        return redirect()->route('user.dashboard')->with('success', 'Pendaftaran berhasil dikirim! Menunggu validasi admin.');
    }

    public function pengaduan()
    {
        $pengaduan = YuniPengaduan::where('user_id', auth()->id())->latest()->get();
        return view('user.pengaduan', compact('pengaduan'));
    }

    public function storePengaduan(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:200',
            'isi_pengaduan' => 'required|string',
            'kategori' => 'required|in:saran,keluhan,pertanyaan,lainnya',
            'prioritas' => 'required|in:rendah,sedang,tinggi'
        ]);

        YuniPengaduan::create([
            'user_id' => auth()->id(),
            'judul' => $request->judul,
            'isi_pengaduan' => $request->isi_pengaduan,
            'kategori' => $request->kategori,
            'prioritas' => $request->prioritas,
            'status' => 'baru'
        ]);

        return redirect()->route('user.pengaduan')->with('success', 'Pengaduan berhasil dikirim!');
    }

    public function riwayat()
    {
        $user = auth()->user();
        $balita = YuniBalita::where('nama_ortu', $user->name)->first();
        $riwayat = collect();

        if ($balita) {
            $riwayat = YuniRiwayatPenimbangan::where('balita_id', $balita->id)->latest()->get();
        }

        return view('user.riwayat', compact('riwayat', 'balita'));
    }

    public function jadwal()
    {
        $jadwal = YuniJadwal::latest()->get();
        return view('user.jadwal', compact('jadwal'));
    }

    public function pengumuman()
    {
        $pengumuman = YuniPengumuman::where('is_aktif', true)->latest()->get();
        return view('user.pengumuman', compact('pengumuman'));
    }

    public function statusPendaftaran()
    {
        $pendaftaran = YuniPendaftaran::where('user_id', auth()->id())->latest()->get();
        return view('user.status-pendaftaran', compact('pendaftaran'));
    }

    public function detailPendaftaran($id)
    {
        $pendaftaran = YuniPendaftaran::where('user_id', auth()->id())->findOrFail($id);
        return view('user.detail-pendaftaran', compact('pendaftaran'));
    }
}
