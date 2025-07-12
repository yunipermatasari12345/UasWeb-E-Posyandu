@extends('layouts.public')

@section('title', 'Statistik Tahun ' . date('Y'))

@section('content')
<div class="min-h-screen bg-gray-50 flex flex-col items-center justify-center py-10">
    <h1 class="text-4xl font-bold text-gray-800 mb-2">Statistik Tahun {{ date('Y') }}</h1>
    <div class="text-xl text-blue-600 font-semibold mb-8">Data Posyandu Sejahtera</div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 w-full max-w-6xl mb-8">
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
    <div class="w-full max-w-6xl">
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
