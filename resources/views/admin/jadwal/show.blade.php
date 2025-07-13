@extends('layouts.app')

@section('title', 'Detail Jadwal')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Detail Jadwal</h1>
        <nav class="text-sm text-gray-600">
            <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-600">Dashboard</a>
            <span class="mx-2">/</span>
            <a href="{{ route('admin.jadwal.index') }}" class="hover:text-blue-600">Jadwal</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800">Detail</span>
        </nav>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Informasi Jadwal -->
            <div>
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Informasi Jadwal</h2>
                <div class="space-y-3">
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Nama Kegiatan</label>
                        <p class="text-gray-800 font-medium">{{ $jadwal->nama_kegiatan }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Tanggal</label>
                        <p class="text-gray-800">{{ $jadwal->tanggal->format('d F Y') }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Waktu Mulai</label>
                        <p class="text-gray-800">{{ $jadwal->waktu_mulai }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Waktu Selesai</label>
                        <p class="text-gray-800">{{ $jadwal->waktu_selesai }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Lokasi</label>
                        <p class="text-gray-800">{{ $jadwal->lokasi }}</p>
                    </div>
                </div>
            </div>

            <!-- Informasi Tambahan -->
            <div>
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Informasi Tambahan</h2>
                <div class="space-y-3">
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Jenis Kegiatan</label>
                        <p class="text-gray-800">{{ $jadwal->jenis_kegiatan }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Status</label>
                        <span class="px-2 py-1 text-xs font-medium rounded-full
                            {{ $jadwal->status == 'aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ ucfirst($jadwal->status) }}
                        </span>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Peserta Target</label>
                        <p class="text-gray-800">{{ $jadwal->peserta_target }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Keterangan</label>
                        <p class="text-gray-800">{{ $jadwal->keterangan ?: 'Tidak ada keterangan' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Informasi Posyandu -->
        @if($jadwal->posyandu)
        <div class="mt-6 pt-6 border-t border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Informasi Posyandu</h2>
            <div class="bg-gray-50 rounded-lg p-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Nama Posyandu</label>
                        <p class="text-gray-800 font-medium">{{ $jadwal->posyandu->nama_posyandu }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Alamat Posyandu</label>
                        <p class="text-gray-800">{{ $jadwal->posyandu->alamat }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Informasi Sistem -->
        <div class="mt-6 pt-6 border-t border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Informasi Sistem</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600">Dibuat Pada</label>
                    <p class="text-gray-800">{{ $jadwal->created_at->format('d F Y H:i') }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Terakhir Diupdate</label>
                    <p class="text-gray-800">{{ $jadwal->updated_at->format('d F Y H:i') }}</p>
                </div>
            </div>
        </div>

        <!-- Tombol Aksi -->
        <div class="mt-8 flex flex-wrap gap-3">
            <a href="{{ route('admin.jadwal.edit', $jadwal->id) }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-200">
                <i class="fas fa-edit mr-2"></i>Edit
            </a>
            <a href="{{ route('admin.jadwal.index') }}"
               class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg transition duration-200">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
            <form action="{{ route('admin.jadwal.destroy', $jadwal->id) }}" method="POST" class="inline"
                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition duration-200">
                    <i class="fas fa-trash mr-2"></i>Hapus
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
