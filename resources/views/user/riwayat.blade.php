@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Riwayat Kesehatan Anak</h1>
        <p class="text-gray-600">Lihat riwayat penimbangan dan perkembangan kesehatan anak Anda</p>
    </div>

    @if($balita)
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Informasi Anak</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700">Nama Anak</label>
                <p class="mt-1 text-lg font-semibold text-gray-900">{{ $balita->nama_balita }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                <p class="mt-1 text-lg text-gray-900">{{ $balita->tanggal_lahir->format('d/m/Y') }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Usia</label>
                <p class="mt-1 text-lg text-gray-900">{{ $balita->tanggal_lahir->diffInMonths(now()) }} bulan</p>
            </div>
        </div>
    </div>

    @if($riwayat->count() > 0)
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800">Riwayat Penimbangan</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tanggal
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Berat Badan
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tinggi Badan
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Lingkar Kepala
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status Gizi
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Catatan
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($riwayat as $r)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $r->tanggal_penimbangan->format('d/m/Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $r->berat_badan }} kg
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $r->tinggi_badan }} cm
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $r->lingkar_kepala ? $r->lingkar_kepala . ' cm' : '-' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($r->status_gizi)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                    @if($r->status_gizi == 'sangat_kurang') bg-red-100 text-red-800
                                    @elseif($r->status_gizi == 'kurang') bg-orange-100 text-orange-800
                                    @elseif($r->status_gizi == 'baik') bg-green-100 text-green-800
                                    @elseif($r->status_gizi == 'lebih') bg-yellow-100 text-yellow-800
                                    @else bg-purple-100 text-purple-800
                                    @endif">
                                    {{ ucwords(str_replace('_', ' ', $r->status_gizi)) }}
                                </span>
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            {{ $r->catatan ?: '-' }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @else
    <div class="bg-white rounded-lg shadow-md p-8 text-center">
        <i class="fas fa-chart-line text-gray-400 text-4xl mb-4"></i>
        <h3 class="text-lg font-semibold text-gray-800 mb-2">Belum Ada Data Penimbangan</h3>
        <p class="text-gray-600">Riwayat penimbangan akan muncul setelah anak Anda melakukan penimbangan di Posyandu</p>
    </div>
    @endif

    @else
    <div class="bg-white rounded-lg shadow-md p-8 text-center">
        <i class="fas fa-baby text-gray-400 text-4xl mb-4"></i>
        <h3 class="text-lg font-semibold text-gray-800 mb-2">Data Anak Tidak Ditemukan</h3>
        <p class="text-gray-600 mb-4">Untuk melihat riwayat kesehatan, Anda perlu mendaftarkan anak terlebih dahulu</p>
        <a href="{{ route('user.pendaftaran') }}" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700">
            Daftar Anak
        </a>
    </div>
    @endif

    <div class="mt-8">
        <a href="{{ route('user.dashboard') }}" class="text-blue-600 hover:text-blue-800">
            ← Kembali ke Dashboard
        </a>
    </div>
</div>
@endsection
