@extends('layouts.user')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white">
    <div class="container mx-auto px-4 py-12">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Selamat Datang di Posyandu</h1>
            <p class="text-xl text-blue-100 mb-8">Layanan kesehatan ibu dan anak terpadu untuk tumbuh kembang optimal</p>
            <div class="flex flex-wrap justify-center gap-4">
                <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-lg p-4 text-center">
                    <div class="text-2xl font-bold">{{ $pendaftaran->count() }}</div>
                    <div class="text-sm">Pendaftaran</div>
                </div>
                <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-lg p-4 text-center">
                    <div class="text-2xl font-bold">{{ $pengumuman->count() }}</div>
                    <div class="text-sm">Pengumuman</div>
                </div>
                <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-lg p-4 text-center">
                    <div class="text-2xl font-bold">{{ $jadwal->count() }}</div>
                    <div class="text-sm">Jadwal</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mx-auto px-4 py-8">
    <!-- Welcome Message -->
    <div class="mb-8 text-center">
        <h2 class="text-2xl font-bold text-gray-800 mb-2">Halo, {{ auth()->user()->name }}!</h2>
        <p class="text-gray-600">Apa yang ingin Anda lakukan hari ini?</p>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center mb-4">
                <div class="p-3 bg-white bg-opacity-20 rounded-lg">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold">Daftar Anak</h3>
                    <p class="text-blue-100 text-sm">Pendaftaran baru</p>
                </div>
            </div>
            <a href="{{ route('user.pendaftaran') }}" class="block text-center bg-white bg-opacity-20 hover:bg-opacity-30 rounded-lg py-2 transition-all duration-300">
                Daftar Sekarang →
            </a>
        </div>

        <div class="bg-gradient-to-br from-green-500 to-green-600 text-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center mb-4">
                <div class="p-3 bg-white bg-opacity-20 rounded-lg">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold">Status Pendaftaran</h3>
                    <p class="text-green-100 text-sm">Lihat status validasi</p>
                </div>
            </div>
            <a href="{{ route('user.status-pendaftaran') }}" class="block text-center bg-white bg-opacity-20 hover:bg-opacity-30 rounded-lg py-2 transition-all duration-300">
                Lihat Status →
            </a>
        </div>

        <div class="bg-gradient-to-br from-purple-500 to-purple-600 text-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center mb-4">
                <div class="p-3 bg-white bg-opacity-20 rounded-lg">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold">Pengaduan</h3>
                    <p class="text-purple-100 text-sm">Kirim saran/keluhan</p>
                </div>
            </div>
            <a href="{{ route('user.pengaduan') }}" class="block text-center bg-white bg-opacity-20 hover:bg-opacity-30 rounded-lg py-2 transition-all duration-300">
                Kirim Pengaduan →
            </a>
        </div>

        <div class="bg-gradient-to-br from-orange-500 to-orange-600 text-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center mb-4">
                <div class="p-3 bg-white bg-opacity-20 rounded-lg">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold">Riwayat</h3>
                    <p class="text-orange-100 text-sm">Data kesehatan anak</p>
                </div>
            </div>
            <a href="{{ route('user.riwayat') }}" class="block text-center bg-white bg-opacity-20 hover:bg-opacity-30 rounded-lg py-2 transition-all duration-300">
                Lihat Riwayat →
            </a>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Left Column -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Status Pendaftaran -->
            @if($pendaftaran->count() > 0)
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Status Pendaftaran
                    </h2>
                    <a href="{{ route('user.status-pendaftaran') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium bg-blue-50 px-3 py-1 rounded-full">
                        Lihat Semua →
                    </a>
                </div>
                <div class="space-y-4">
                    @foreach($pendaftaran->take(3) as $daftar)
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800">{{ $daftar->nama_anak }}</h3>
                                <p class="text-sm text-gray-600">{{ ucfirst(str_replace('_', ' ', $daftar->jenis_pendaftaran)) }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            @if($daftar->status == 'pending')
                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Menunggu
                                </span>
                            @elseif($daftar->status == 'disetujui')
                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                    Disetujui
                                </span>
                            @else
                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                    Ditolak
                                </span>
                            @endif
                            <p class="text-xs text-gray-500 mt-1">{{ $daftar->created_at->format('d/m/Y') }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Pengumuman Terbaru -->
            @if($pengumuman->count() > 0)
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                        </svg>
                        Pengumuman Terbaru
                    </h2>
                    <a href="{{ route('user.pengumuman') }}" class="text-purple-600 hover:text-purple-800 text-sm font-medium bg-purple-50 px-3 py-1 rounded-full">
                        Lihat Semua →
                    </a>
                </div>
                <div class="space-y-4">
                    @foreach($pengumuman->take(3) as $pengumuman)
                    <div class="border-l-4 border-purple-500 pl-4 py-2 hover:bg-purple-50 rounded-r-lg transition-colors">
                        <h3 class="font-semibold text-gray-800">{{ $pengumuman->judul }}</h3>
                        <p class="text-gray-600 text-sm mt-1">{{ Str::limit($pengumuman->isi_pengumuman, 120) }}</p>
                        <div class="flex items-center mt-2 space-x-2">
                            <span class="bg-purple-100 text-purple-800 px-2 py-1 rounded text-xs">{{ ucfirst($pengumuman->kategori) }}</span>
                            <span class="text-xs text-gray-500">{{ $pengumuman->created_at->format('d/m/Y H:i') }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>

        <!-- Right Column -->
        <div class="space-y-8">
            <!-- Jadwal Terdekat -->
            @if($jadwal->count() > 0)
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Jadwal Terdekat
                    </h2>
                    <a href="{{ route('user.jadwal') }}" class="text-orange-600 hover:text-orange-800 text-sm font-medium bg-orange-50 px-3 py-1 rounded-full">
                        Lihat Semua →
                    </a>
                </div>
                <div class="space-y-4">
                    @foreach($jadwal->take(5) as $jadwal)
                    <div class="flex items-center justify-between p-4 bg-orange-50 rounded-lg hover:bg-orange-100 transition-colors">
                        <div>
                            <h3 class="font-semibold text-gray-800">{{ $jadwal->kegiatan }}</h3>
                            <p class="text-gray-600 text-sm">{{ $jadwal->tanggal->format('d/m/Y') }} - {{ $jadwal->jam }}</p>
                        </div>
                        <div class="text-right">
                            <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded text-xs font-medium">
                                Jadwal
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Quick Stats -->
            <div class="bg-gradient-to-br from-blue-500 to-purple-600 text-white rounded-xl shadow-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Statistik Anda</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-blue-100">Total Pendaftaran</span>
                        <span class="text-2xl font-bold">{{ $pendaftaran->count() }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-blue-100">Pengaduan Aktif</span>
                        <span class="text-2xl font-bold">{{ $pengaduan->where('status', '!=', 'selesai')->count() }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-blue-100">Jadwal Bulan Ini</span>
                        <span class="text-2xl font-bold">{{ $jadwal->where('tanggal', '>=', now()->startOfMonth())->count() }}</span>
                    </div>
                </div>
            </div>

            <!-- Tips Kesehatan -->
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                    Tips Kesehatan
                </h3>
                <div class="space-y-3 text-sm text-gray-600">
                    <div class="flex items-start">
                        <div class="w-2 h-2 bg-green-500 rounded-full mt-2 mr-3 flex-shrink-0"></div>
                        <p>Pastikan anak mendapat imunisasi sesuai jadwal</p>
                    </div>
                    <div class="flex items-start">
                        <div class="w-2 h-2 bg-green-500 rounded-full mt-2 mr-3 flex-shrink-0"></div>
                        <p>Berikan makanan bergizi seimbang</p>
                    </div>
                    <div class="flex items-start">
                        <div class="w-2 h-2 bg-green-500 rounded-full mt-2 mr-3 flex-shrink-0"></div>
                        <p>Lakukan penimbangan rutin di posyandu</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
