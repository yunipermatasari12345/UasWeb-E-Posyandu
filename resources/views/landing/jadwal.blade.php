<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Posyandu - Posyandu Sejahtera</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .hero-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .card-hover:hover {
            transform: translateY(-2px);
            transition: all 0.3s ease;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center">
                        <i class="fas fa-heartbeat text-white text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-gray-800">Posyandu Sejahtera</h1>
                        <p class="text-sm text-gray-600">Sistem Informasi Posyandu</p>
                    </div>
                </div>

                <nav class="hidden md:flex space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600 font-medium">Beranda</a>
                    <a href="#berita" class="text-gray-700 hover:text-blue-600 font-medium">Berita Kesehatan</a>
                    <a href="#dokumentasi" class="text-gray-700 hover:text-blue-600 font-medium">Dokumentasi</a>
                    <a href="#kontak" class="text-gray-700 hover:text-blue-600 font-medium">Hubungi Kami</a>
                    <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">Login</a>
                </nav>

                <!-- Mobile menu button -->
                <button class="md:hidden text-gray-700">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-gradient text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">
                    Jadwal Kegiatan Posyandu
                </h1>
                <p class="text-xl mb-8 opacity-90">
                    Informasi lengkap tentang jadwal kegiatan dan layanan Posyandu Sejahtera
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('home') }}" class="bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                        <i class="fas fa-home mr-2"></i>Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Schedule Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Jadwal Kegiatan</h2>
                    <p class="text-gray-600">Berikut adalah jadwal kegiatan Posyandu yang dapat Anda ikuti</p>
                </div>

                @if($jadwals->count() > 0)
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($jadwals as $jadwal)
                            <div class="bg-white border border-gray-200 rounded-lg shadow-lg p-6 card-hover">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center">
                                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                                            <i class="fas fa-calendar-alt text-blue-600 text-xl"></i>
                                        </div>
                                        <div class="ml-4">
                                            <h3 class="font-semibold text-gray-800">{{ $jadwal->nama_kegiatan }}</h3>
                                            @if($jadwal->posyandu)
                                                <p class="text-sm text-gray-600">{{ $jadwal->posyandu->nama_posyandu }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="space-y-3">
                                    <div class="flex items-center text-gray-600">
                                        <i class="fas fa-calendar-day text-blue-500 mr-3"></i>
                                        <span>{{ \Carbon\Carbon::parse($jadwal->tanggal)->format('d F Y') }}</span>
                                    </div>

                                    <div class="flex items-center text-gray-600">
                                        <i class="fas fa-clock text-green-500 mr-3"></i>
                                        <span>{{ $jadwal->waktu_mulai }} - {{ $jadwal->waktu_selesai }}</span>
                                    </div>

                                    @if($jadwal->lokasi)
                                        <div class="flex items-center text-gray-600">
                                            <i class="fas fa-map-marker-alt text-red-500 mr-3"></i>
                                            <span>{{ $jadwal->lokasi }}</span>
                                        </div>
                                    @endif

                                    @if($jadwal->deskripsi)
                                        <div class="mt-4 p-3 bg-gray-50 rounded-lg">
                                            <p class="text-sm text-gray-700">{{ $jadwal->deskripsi }}</p>
                                        </div>
                                    @endif
                                </div>

                                <div class="mt-4 pt-4 border-t border-gray-200">
                                    <div class="flex items-center justify-between">
                                        <span class="text-xs text-gray-500">
                                            <i class="fas fa-users mr-1"></i>
                                            Peserta: {{ $jadwal->jumlah_peserta ?? 'Tidak terbatas' }}
                                        </span>
                                        <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">
                                            {{ $jadwal->status ?? 'Aktif' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-calendar-times text-gray-400 text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Belum Ada Jadwal</h3>
                        <p class="text-gray-600 mb-6">Saat ini belum ada jadwal kegiatan yang tersedia.</p>
                        <a href="{{ route('home') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                            <i class="fas fa-home mr-2"></i>Kembali ke Beranda
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Info Section -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Informasi Penting</h2>
                    <p class="text-gray-600">Beberapa hal yang perlu diperhatikan sebelum mengikuti kegiatan Posyandu</p>
                </div>

                <div class="grid md:grid-cols-2 gap-8">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-info-circle text-blue-600 text-xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800">Persiapan Sebelum Datang</h3>
                        </div>
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                                Bawa KTP atau Kartu Keluarga
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                                Bawa buku KIA (Kesehatan Ibu dan Anak)
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                                Datang tepat waktu sesuai jadwal
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                                Gunakan masker dan jaga jarak
                            </li>
                        </ul>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-phone text-green-600 text-xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800">Kontak Darurat</h3>
                        </div>
                        <div class="space-y-3 text-gray-600">
                            <div class="flex items-center">
                                <i class="fas fa-user-md text-blue-500 mr-3"></i>
                                <span>Dokter: (021) 1234-5678</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-user-nurse text-green-500 mr-3"></i>
                                <span>Bidan: (021) 1234-5679</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-ambulance text-red-500 mr-3"></i>
                                <span>Darurat: 119</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-envelope text-purple-500 mr-3"></i>
                                <span>Email: info@posyandusejahtera.id</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <div class="flex items-center justify-center mb-6">
                    <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mr-3">
                        <i class="fas fa-heartbeat text-white text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold">Posyandu Sejahtera</h3>
                        <p class="text-gray-400 text-sm">Sistem Informasi Posyandu</p>
                    </div>
                </div>

                <div class="grid md:grid-cols-3 gap-8 mb-8">
                    <div>
                        <h4 class="font-semibold mb-4">Kontak</h4>
                        <div class="space-y-2 text-gray-400">
                            <p><i class="fas fa-map-marker-alt mr-2"></i>Jl. Posyandu No. 123</p>
                            <p><i class="fas fa-phone mr-2"></i>(021) 1234-5678</p>
                            <p><i class="fas fa-envelope mr-2"></i>info@posyandusejahtera.id</p>
                        </div>
                    </div>

                    <div>
                        <h4 class="font-semibold mb-4">Layanan</h4>
                        <div class="space-y-2 text-gray-400">
                            <p>Pemeriksaan Balita</p>
                            <p>Imunisasi</p>
                            <p>Konsultasi Gizi</p>
                            <p>Penyuluhan Kesehatan</p>
                        </div>
                    </div>

                    <div>
                        <h4 class="font-semibold mb-4">Jam Operasional</h4>
                        <div class="space-y-2 text-gray-400">
                            <p>Senin - Jumat: 08:00 - 16:00</p>
                            <p>Sabtu: 08:00 - 12:00</p>
                            <p>Minggu: Tutup</p>
                        </div>
                    </div>
                </div>

                <div class="border-t border-gray-700 pt-8">
                    <p class="text-gray-400">
                        Copyright © 2025 Posyandu Sejahtera. All Rights Reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Mobile Navigation -->
    <div class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 md:hidden z-50">
        <div class="flex justify-around py-2">
            <a href="{{ route('home') }}" class="flex flex-col items-center p-2 text-gray-600">
                <i class="fas fa-home text-lg"></i>
                <span class="text-xs mt-1">Beranda</span>
            </a>
            <a href="{{ route('jadwal') }}" class="flex flex-col items-center p-2 text-blue-600">
                <i class="fas fa-calendar text-lg"></i>
                <span class="text-xs mt-1">Jadwal</span>
            </a>
            <a href="#tentang" class="flex flex-col items-center p-2 text-gray-600">
                <i class="fas fa-info text-lg"></i>
                <span class="text-xs mt-1">Tentang</span>
            </a>
            <a href="{{ route('login') }}" class="flex flex-col items-center p-2 text-gray-600">
                <i class="fas fa-user text-lg"></i>
                <span class="text-xs mt-1">Login</span>
            </a>
        </div>
    </div>
</body>
</html>
