@extends('layouts.app')

@section('title', 'Detail Balita')
@section('subtitle', 'Informasi lengkap balita')

@section('content')
<div class="max-w-6xl mx-auto space-y-6">
    <!-- Header -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="w-16 h-16 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full flex items-center justify-center">
                    <i class="fas fa-baby text-white text-2xl"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">{{ $balita->nama_balita }}</h2>
                    <p class="text-gray-600">
                        @if($balita->jenis_kelamin == 'L')
                            <i class="fas fa-male text-blue-500 mr-1"></i> Laki-laki
                        @else
                            <i class="fas fa-female text-pink-500 mr-1"></i> Perempuan
                        @endif
                        • {{ $balita->umur }} bulan
                    </p>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.balita.edit', $balita->id) }}"
                   class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    <i class="fas fa-edit mr-2"></i>
                    Edit
                </a>
                <a href="{{ route('admin.balita.index') }}"
                   class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
            </div>
        </div>
    </div>

    <!-- Statistik Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-calendar text-blue-600"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Umur</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $balita->umur }} bulan</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-weight text-green-600"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Berat Lahir</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $balita->berat_lahir }} kg</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-ruler-vertical text-purple-600"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Panjang Lahir</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $balita->panjang_lahir }} cm</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-hospital text-orange-600"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Posyandu</p>
                    <p class="text-lg font-bold text-gray-900">{{ optional($balita->posyandu)->nama_posyandu ?? '-' }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Informasi Detail -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Informasi Balita -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-baby text-purple-600 mr-2"></i>
                    Informasi Balita
                </h3>
            </div>
            <div class="p-6 space-y-4">
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-medium text-gray-600">Nama Lengkap</span>
                    <span class="text-sm text-gray-900">{{ $balita->nama_balita }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-medium text-gray-600">Jenis Kelamin</span>
                    <span class="text-sm text-gray-900">
                        @if($balita->jenis_kelamin == 'L')
                            <i class="fas fa-male text-blue-500 mr-1"></i> Laki-laki
                        @else
                            <i class="fas fa-female text-pink-500 mr-1"></i> Perempuan
                        @endif
                    </span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-medium text-gray-600">Tempat Lahir</span>
                    <span class="text-sm text-gray-900">{{ $balita->tempat_lahir }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-medium text-gray-600">Tanggal Lahir</span>
                    <span class="text-sm text-gray-900">{{ \Carbon\Carbon::parse($balita->tanggal_lahir)->format('d M Y') }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-medium text-gray-600">Umur</span>
                    <span class="text-sm text-gray-900">{{ $balita->umur }} bulan</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-medium text-gray-600">Berat Lahir</span>
                    <span class="text-sm text-gray-900">{{ $balita->berat_lahir }} kg</span>
                </div>
                <div class="flex justify-between items-center py-3">
                    <span class="text-sm font-medium text-gray-600">Panjang Lahir</span>
                    <span class="text-sm text-gray-900">{{ $balita->panjang_lahir }} cm</span>
                </div>
            </div>
        </div>

        <!-- Informasi Orang Tua -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-users text-blue-600 mr-2"></i>
                    Informasi Orang Tua
                </h3>
            </div>
            <div class="p-6 space-y-4">
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-medium text-gray-600">Nama Orang Tua</span>
                    <span class="text-sm text-gray-900">{{ $balita->nama_ortu }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-medium text-gray-600">No. HP</span>
                    <span class="text-sm text-gray-900">{{ $balita->no_hp_ortu }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-medium text-gray-600">Alamat</span>
                    <span class="text-sm text-gray-900">{{ $balita->alamat }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-medium text-gray-600">Posyandu</span>
                    <span class="text-sm text-gray-900">{{ optional($balita->posyandu)->nama_posyandu ?? '-' }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-medium text-gray-600">Kelurahan</span>
                    <span class="text-sm text-gray-900">{{ optional($balita->posyandu)->kelurahan ?? '-' }}</span>
                </div>
                <div class="flex justify-between items-center py-3">
                    <span class="text-sm font-medium text-gray-600">Status</span>
                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                        <i class="fas fa-check-circle mr-1"></i>
                        Aktif
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Catatan dan Riwayat -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Catatan Khusus -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-sticky-note text-yellow-600 mr-2"></i>
                    Catatan Khusus
                </h3>
            </div>
            <div class="p-6">
                @if($balita->catatan)
                    <p class="text-gray-700">{{ $balita->catatan }}</p>
                @else
                    <p class="text-gray-500 italic">Tidak ada catatan khusus</p>
                @endif
            </div>
        </div>

        <!-- Riwayat Registrasi -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-history text-gray-600 mr-2"></i>
                    Riwayat Registrasi
                </h3>
            </div>
            <div class="p-6 space-y-4">
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-medium text-gray-600">Tanggal Registrasi</span>
                    <span class="text-sm text-gray-900">{{ $balita->created_at->format('d M Y H:i') }}</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-medium text-gray-600">Terakhir Diupdate</span>
                    <span class="text-sm text-gray-900">{{ $balita->updated_at->format('d M Y H:i') }}</span>
                </div>
                <div class="flex justify-between items-center py-3">
                    <span class="text-sm font-medium text-gray-600">ID Registrasi</span>
                    <span class="text-sm text-gray-900 font-mono">#{{ $balita->id }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Grafik Pertumbuhan (Placeholder) -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                <i class="fas fa-chart-line text-green-600 mr-2"></i>
                Grafik Pertumbuhan
            </h3>
            <div class="flex space-x-2">
                <button class="px-3 py-1 text-xs bg-blue-100 text-blue-600 rounded-full">Tinggi</button>
                <button class="px-3 py-1 text-xs bg-gray-100 text-gray-600 rounded-full">Berat</button>
            </div>
        </div>
        <div class="h-64 flex items-center justify-center bg-gray-50 rounded-lg">
            <div class="text-center">
                <i class="fas fa-chart-line text-gray-400 text-4xl mb-4"></i>
                <p class="text-gray-500">Grafik pertumbuhan akan ditampilkan di sini</p>
                <p class="text-sm text-gray-400">Fitur ini akan tersedia dalam update selanjutnya</p>
            </div>
        </div>
    </div>

    <!-- Tombol Aksi -->
    <div class="flex items-center justify-center space-x-4">
        <a href="{{ route('admin.balita.edit', $balita->id) }}"
           class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
            <i class="fas fa-edit mr-2"></i>
            Edit Data
        </a>
        <form action="{{ route('admin.balita.destroy', $balita->id) }}" method="POST" class="inline"
              onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="inline-flex items-center px-6 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                <i class="fas fa-trash mr-2"></i>
                Hapus Data
            </button>
        </form>
        <a href="{{ route('admin.balita.index') }}"
           class="inline-flex items-center px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
            <i class="fas fa-arrow-left mr-2"></i>
            Kembali ke Daftar
        </a>
    </div>
</div>
@endsection
