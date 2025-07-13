@extends('layouts.app')

@section('title', 'Detail Posyandu')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Detail Posyandu</h1>
        <nav class="text-sm text-gray-600">
            <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-600">Dashboard</a>
            <span class="mx-2">/</span>
            <a href="{{ route('admin.posyandu.index') }}" class="hover:text-blue-600">Posyandu</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800">Detail</span>
        </nav>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Informasi Dasar -->
            <div>
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Informasi Dasar</h2>
                <div class="space-y-3">
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Nama Posyandu</label>
                        <p class="text-gray-800 font-medium">{{ $posyandu->nama_posyandu }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Alamat</label>
                        <p class="text-gray-800">{{ $posyandu->alamat }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Kecamatan</label>
                        <p class="text-gray-800">{{ $posyandu->kecamatan }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Kelurahan</label>
                        <p class="text-gray-800">{{ $posyandu->kelurahan }}</p>
                    </div>
                </div>
            </div>

            <!-- Informasi Kontak -->
            <div>
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Informasi Kontak</h2>
                <div class="space-y-3">
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Email</label>
                        <p class="text-gray-800">{{ $posyandu->email }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">No. HP</label>
                        <p class="text-gray-800">{{ $posyandu->no_hp }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Nama Ketua</label>
                        <p class="text-gray-800">{{ $posyandu->nama_ketua }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">No. HP Ketua</label>
                        <p class="text-gray-800">{{ $posyandu->no_hp_ketua }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Deskripsi -->
        @if($posyandu->deskripsi)
        <div class="mt-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Deskripsi</h2>
            <div class="bg-gray-50 rounded-lg p-4">
                <p class="text-gray-800">{{ $posyandu->deskripsi }}</p>
            </div>
        </div>
        @endif

        <!-- Informasi Sistem -->
        <div class="mt-6 pt-6 border-t border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Informasi Sistem</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600">Dibuat Pada</label>
                    <p class="text-gray-800">{{ $posyandu->created_at->format('d F Y H:i') }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Terakhir Diupdate</label>
                    <p class="text-gray-800">{{ $posyandu->updated_at->format('d F Y H:i') }}</p>
                </div>
            </div>
        </div>

        <!-- Tombol Aksi -->
        <div class="mt-8 flex flex-wrap gap-3">
            <a href="{{ route('admin.posyandu.edit', $posyandu->id) }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-200">
                <i class="fas fa-edit mr-2"></i>Edit
            </a>
            <a href="{{ route('admin.posyandu.index') }}"
               class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg transition duration-200">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
            <form action="{{ route('admin.posyandu.destroy', $posyandu->id) }}" method="POST" class="inline"
                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus posyandu ini?')">
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
