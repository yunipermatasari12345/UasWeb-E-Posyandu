@extends('layouts.app')

@section('title', 'Dashboard Admin')
@section('subtitle', 'Menu Utama Admin Posyandu')

@section('content')
<div class="max-w-5xl mx-auto py-8">
    <div class="mb-10">
        <h2 class="text-2xl font-bold mb-2">Statistik Tahun {{ date('Y') }}</h2>
        <div class="text-blue-600 font-semibold mb-6">Data Yuni Permata Sari MI2C</div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 w-full mb-8">
            <!-- Data Bayi -->
            <div class="bg-white rounded-2xl shadow p-8 flex flex-col items-center transition hover:shadow-lg cursor-pointer statistik-card" data-target="#data-bayi" style="text-decoration:none;">
                <div class="bg-blue-100 rounded-full p-6 mb-4">
                    <i class="fas fa-baby fa-2x text-blue-600"></i>
                </div>
                <div class="text-3xl font-bold text-blue-600 mb-2">{{ $jumlahBayi }}</div>
                <div class="text-lg text-gray-700">Data Bayi</div>
            </div>
            <!-- Data Balita -->
            <div class="bg-white rounded-2xl shadow p-8 flex flex-col items-center transition hover:shadow-lg cursor-pointer statistik-card" data-target="#data-balita" style="text-decoration:none;">
                <div class="bg-green-100 rounded-full p-6 mb-4">
                    <i class="fas fa-child fa-2x text-green-600"></i>
                </div>
                <div class="text-3xl font-bold text-green-600 mb-2">{{ $jumlahBalita }}</div>
                <div class="text-lg text-gray-700">Data Balita</div>
            </div>
            <!-- Data Ibu Hamil -->
            <div class="bg-white rounded-2xl shadow p-8 flex flex-col items-center transition hover:shadow-lg cursor-pointer statistik-card" data-target="#data-ibu" style="text-decoration:none;">
                <div class="bg-purple-100 rounded-full p-6 mb-4">
                    <i class="fas fa-female fa-2x text-purple-600"></i>
                </div>
                <div class="text-3xl font-bold text-purple-600 mb-2">{{ $jumlahIbu }}</div>
                <div class="text-lg text-gray-700">Data Ibu Hamil</div>
            </div>
            <!-- Data Lansia -->
            <div class="bg-white rounded-2xl shadow p-8 flex flex-col items-center transition hover:shadow-lg cursor-pointer statistik-card" data-target="#data-lansia" style="text-decoration:none;">
                <div class="bg-orange-100 rounded-full p-6 mb-4">
                    <i class="fas fa-user fa-2x text-orange-600"></i>
                </div>
                <div class="text-3xl font-bold text-orange-600 mb-2">{{ $jumlahLansia }}</div>
                <div class="text-lg text-gray-700">Data Lansia</div>
            </div>
        </div>
        <!-- Data Section -->
        <div class="w-full">
            <div id="data-bayi" class="data-section" style="display:none;">
                <h3 class="mb-3 text-xl font-semibold">Daftar Data Bayi</h3>
                <table class="table table-bordered">
                    <thead><tr><th>Nama Bayi</th><th>Tanggal Lahir</th><th>Nama Orang Tua</th></tr></thead>
                    <tbody>
                    @foreach($anaks as $anak)
                        <tr>
                            <td>{{ $anak->nama_bayi ?? '-' }}</td>
                            <td>{{ $anak->tanggal_lahir ?? '-' }}</td>
                            <td>{{ $anak->nama_ortu ?? '-' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div id="data-balita" class="data-section" style="display:none;">
                <h3 class="mb-3 text-xl font-semibold">Daftar Data Balita</h3>
                <table class="table table-bordered">
                    <thead><tr><th>Nama Balita</th><th>Tanggal Lahir</th><th>Nama Orang Tua</th></tr></thead>
                    <tbody>
                    @foreach($balitas as $balita)
                        <tr>
                            <td>{{ $balita->nama_balita ?? '-' }}</td>
                            <td>{{ $balita->tanggal_lahir ?? '-' }}</td>
                            <td>{{ $balita->nama_ortu ?? '-' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div id="data-ibu" class="data-section" style="display:none;">
                <h3 class="mb-3 text-xl font-semibold">Daftar Data Ibu Hamil</h3>
                <table class="table table-bordered">
                    <thead><tr><th>Nama Ibu</th><th>Tanggal Lahir</th><th>Alamat</th></tr></thead>
                    <tbody>
                    @foreach($ibus as $ibu)
                        <tr>
                            <td>{{ $ibu->nama_ibu ?? '-' }}</td>
                            <td>{{ $ibu->tanggal_lahir ?? '-' }}</td>
                            <td>{{ $ibu->alamat ?? '-' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div id="data-lansia" class="data-section" style="display:none;">
                <h3 class="mb-3 text-xl font-semibold">Daftar Data Lansia</h3>
                <div class="alert alert-info">Belum ada data lansia.</div>
            </div>
        </div>
    </div>
    <!-- Menu CRUD Admin -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-10">
        <!-- POSYANDU -->
        <a href="{{ route('admin.posyandu.index') }}" class="block bg-white rounded-xl shadow-md hover:shadow-lg transition p-6 text-center group">
            <div class="flex justify-center mb-3">
                <span class="bg-blue-100 p-3 rounded-full">
                    <i class="fas fa-hospital text-blue-600 text-2xl"></i>
                </span>
            </div>
            <div class="text-lg font-bold text-gray-800">Posyandu</div>
            <div class="text-sm text-gray-500 mb-2">Kelola data posyandu</div>
            <div class="text-2xl font-bold text-blue-600">{{ $posyandus->count() }}</div>
        </a>
        <!-- KADER -->
        <a href="{{ route('admin.kader.index') }}" class="block bg-white rounded-xl shadow-md hover:shadow-lg transition p-6 text-center group">
            <div class="flex justify-center mb-3">
                <span class="bg-green-100 p-3 rounded-full">
                    <i class="fas fa-user-nurse text-green-600 text-2xl"></i>
                </span>
            </div>
            <div class="text-lg font-bold text-gray-800">Kader</div>
            <div class="text-sm text-gray-500 mb-2">Kelola data kader</div>
            <div class="text-2xl font-bold text-green-600">{{ $kaders->count() }}</div>
        </a>
        <!-- BALITA -->
        <a href="{{ route('admin.balita.index') }}" class="block bg-white rounded-xl shadow-md hover:shadow-lg transition p-6 text-center group">
            <div class="flex justify-center mb-3">
                <span class="bg-purple-100 p-3 rounded-full">
                    <i class="fas fa-baby text-purple-600 text-2xl"></i>
                </span>
            </div>
            <div class="text-lg font-bold text-gray-800">Balita</div>
            <div class="text-sm text-gray-500 mb-2">Kelola data balita</div>
            <div class="text-2xl font-bold text-purple-600">{{ $balitas->count() }}</div>
        </a>
        <!-- JADWAL -->
        <a href="{{ route('admin.jadwal.index') }}" class="block bg-white rounded-xl shadow-md hover:shadow-lg transition p-6 text-center group">
            <div class="flex justify-center mb-3">
                <span class="bg-orange-100 p-3 rounded-full">
                    <i class="fas fa-calendar-alt text-orange-600 text-2xl"></i>
                </span>
            </div>
            <div class="text-lg font-bold text-gray-800">Jadwal</div>
            <div class="text-sm text-gray-500 mb-2">Kelola jadwal kegiatan</div>
            <div class="text-2xl font-bold text-orange-600">{{ $jadwals->count() }}</div>
        </a>
        <!-- BERITA -->
        <a href="{{ route('admin.berita.index') }}" class="block bg-white rounded-xl shadow-md hover:shadow-lg transition p-6 text-center group">
            <div class="flex justify-center mb-3">
                <span class="bg-yellow-100 p-3 rounded-full">
                    <i class="fas fa-newspaper text-yellow-600 text-2xl"></i>
                </span>
            </div>
            <div class="text-lg font-bold text-gray-800">Berita</div>
            <div class="text-sm text-gray-500 mb-2">Kelola berita & info</div>
            <div class="text-2xl font-bold text-yellow-600">{{ $beritas->count() }}</div>
        </a>
        <!-- PEMERIKSAAN -->
        <a href="{{ route('admin.pemeriksaan.index') }}" class="block bg-white rounded-xl shadow-md hover:shadow-lg transition p-6 text-center group">
            <div class="flex justify-center mb-3">
                <span class="bg-pink-100 p-3 rounded-full">
                    <i class="fas fa-notes-medical text-pink-600 text-2xl"></i>
                </span>
            </div>
            <div class="text-lg font-bold text-gray-800">Pemeriksaan</div>
            <div class="text-sm text-gray-500 mb-2">Data pemeriksaan balita</div>
            <div class="text-2xl font-bold text-pink-600">{{ $pemeriksaans->count() ?? 0 }}</div>
        </a>
    </div>
    <div class="mt-10 text-center text-gray-400 text-xs">
        &copy; {{ date('Y') }} Yuni Permata Sari MI2C - Admin Dashboard
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.statistik-card').forEach(function(card) {
        card.addEventListener('click', function() {
            document.querySelectorAll('.data-section').forEach(function(sec) {
                sec.style.display = 'none';
            });
            var target = this.getAttribute('data-target');
            var el = document.querySelector(target);
            if (el) el.style.display = 'block';
            window.scrollTo({ top: el.offsetTop - 100, behavior: 'smooth' });
        });
    });
});
</script>
@endpush
