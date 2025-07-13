@extends('layouts.app')

@section('title', 'Detail Kader')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Detail Kader</h1>
        <nav class="text-sm text-gray-600">
            <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-600">Dashboard</a>
            <span class="mx-2">/</span>
            <a href="{{ route('admin.kader.index') }}" class="hover:text-blue-600">Kader</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800">Detail</span>
        </nav>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Informasi Pribadi -->
            <div>
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Informasi Pribadi</h2>
                <div class="space-y-3">
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Nama Kader</label>
                        <p class="text-gray-800 font-medium">{{ $kader->nama_kader }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Jenis Kelamin</label>
                        <p class="text-gray-800">{{ $kader->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Tempat Lahir</label>
                        <p class="text-gray-800">{{ $kader->tempat_lahir }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Tanggal Lahir</label>
                        <p class="text-gray-800">{{ $kader->tanggal_lahir->format('d F Y') }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Alamat</label>
                        <p class="text-gray-800">{{ $kader->alamat }}</p>
                    </div>
                </div>
            </div>

            <!-- Informasi Kontak & Pekerjaan -->
            <div>
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Informasi Kontak & Pekerjaan</h2>
                <div class="space-y-3">
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Email</label>
                        <p class="text-gray-800">{{ $kader->email }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">No. HP</label>
                        <p class="text-gray-800">{{ $kader->no_hp }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Pendidikan</label>
                        <p class="text-gray-800">{{ $kader->pendidikan }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Pekerjaan</label>
                        <p class="text-gray-800">{{ $kader->pekerjaan }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Tanggal Bergabung</label>
                        <p class="text-gray-800">{{ $kader->tanggal_bergabung->format('d F Y') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Informasi Posyandu -->
        @if($kader->posyandu)
        <div class="mt-6 pt-6 border-t border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Informasi Posyandu</h2>
            <div class="bg-gray-50 rounded-lg p-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Nama Posyandu</label>
                        <p class="text-gray-800 font-medium">{{ $kader->posyandu->nama_posyandu }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Alamat Posyandu</label>
                        <p class="text-gray-800">{{ $kader->posyandu->alamat }}</p>
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
                    <p class="text-gray-800">{{ $kader->created_at->format('d F Y H:i') }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Terakhir Diupdate</label>
                    <p class="text-gray-800">{{ $kader->updated_at->format('d F Y H:i') }}</p>
                </div>
            </div>
        </div>

        <!-- Tombol Aksi -->
        <div class="mt-8 flex flex-wrap gap-3">
            <a href="{{ route('admin.kader.edit', $kader->id) }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-200">
                <i class="fas fa-edit mr-2"></i>Edit
            </a>
            <a href="{{ route('admin.kader.index') }}"
               class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg transition duration-200">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
            <form action="{{ route('admin.kader.destroy', $kader->id) }}" method="POST" class="inline"
                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus kader ini?')">
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
