@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Pengaduan & Saran</h1>
        <p class="text-gray-600">Kirim pengaduan, saran, atau pertanyaan kepada admin Posyandu</p>
    </div>

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
        {{ session('success') }}
    </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Form Pengaduan -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Kirim Pengaduan Baru</h2>

            <form action="{{ route('user.store-pengaduan') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Judul Pengaduan *
                    </label>
                    <input type="text" name="judul" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Kategori *
                    </label>
                    <select name="kategori" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="">Pilih kategori</option>
                        <option value="saran">Saran</option>
                        <option value="keluhan">Keluhan</option>
                        <option value="pertanyaan">Pertanyaan</option>
                        <option value="lainnya">Lainnya</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Prioritas *
                    </label>
                    <select name="prioritas" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="">Pilih prioritas</option>
                        <option value="rendah">Rendah</option>
                        <option value="sedang">Sedang</option>
                        <option value="tinggi">Tinggi</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Isi Pengaduan *
                    </label>
                    <textarea name="isi_pengaduan" rows="5" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Jelaskan detail pengaduan Anda..." required></textarea>
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Kirim Pengaduan
                </button>
            </form>
        </div>

        <!-- Riwayat Pengaduan -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Riwayat Pengaduan</h2>

            @if($pengaduan->count() > 0)
            <div class="space-y-4">
                @foreach($pengaduan as $peng)
                <div class="border border-gray-200 rounded-lg p-4">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="font-semibold text-gray-800">{{ $peng->judul }}</h3>
                        <span class="px-2 py-1 text-xs rounded-full
                            @if($peng->status == 'baru') bg-blue-100 text-blue-800
                            @elseif($peng->status == 'dibaca') bg-yellow-100 text-yellow-800
                            @elseif($peng->status == 'diproses') bg-orange-100 text-orange-800
                            @else bg-green-100 text-green-800
                            @endif">
                            {{ ucfirst($peng->status) }}
                        </span>
                    </div>

                    <div class="flex items-center space-x-4 text-sm text-gray-600 mb-2">
                        <span class="bg-gray-100 px-2 py-1 rounded">{{ ucfirst($peng->kategori) }}</span>
                        <span class="bg-gray-100 px-2 py-1 rounded">{{ ucfirst($peng->prioritas) }}</span>
                        <span>{{ $peng->created_at->format('d/m/Y H:i') }}</span>
                    </div>

                    <p class="text-gray-700 text-sm">{{ Str::limit($peng->isi_pengaduan, 100) }}</p>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-8">
                <i class="fas fa-inbox text-gray-400 text-4xl mb-4"></i>
                <p class="text-gray-500">Belum ada pengaduan</p>
            </div>
            @endif
        </div>
    </div>

    <div class="mt-8">
        <a href="{{ route('user.dashboard') }}" class="text-blue-600 hover:text-blue-800">
            ← Kembali ke Dashboard
        </a>
    </div>
</div>
@endsection
