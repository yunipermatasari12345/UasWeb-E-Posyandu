@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Jadwal Posyandu</h1>
        <p class="text-gray-600">Lihat jadwal kegiatan Posyandu terbaru</p>
    </div>

    @if($jadwal->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($jadwal as $j)
        <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <div class="p-2 bg-blue-100 rounded-lg">
                        <i class="fas fa-calendar-alt text-blue-600"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="font-semibold text-gray-800">{{ $j->kegiatan }}</h3>
                        <p class="text-sm text-gray-600">{{ $j->posyandu->nama_posyandu }}</p>
                    </div>
                </div>
            </div>

            <div class="space-y-2">
                <div class="flex items-center text-sm text-gray-600">
                    <i class="fas fa-calendar-day w-4 mr-2"></i>
                    <span>{{ $j->tanggal->format('d/m/Y') }}</span>
                </div>
                <div class="flex items-center text-sm text-gray-600">
                    <i class="fas fa-clock w-4 mr-2"></i>
                    <span>{{ $j->jam }}</span>
                </div>
            </div>

            <div class="mt-4 pt-4 border-t border-gray-200">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                    Jadwal Posyandu
                </span>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="bg-white rounded-lg shadow-md p-8 text-center">
        <i class="fas fa-calendar-times text-gray-400 text-4xl mb-4"></i>
        <h3 class="text-lg font-semibold text-gray-800 mb-2">Belum Ada Jadwal</h3>
        <p class="text-gray-600">Jadwal Posyandu akan ditampilkan di sini</p>
    </div>
    @endif

    <div class="mt-8">
        <a href="{{ route('user.dashboard') }}" class="text-blue-600 hover:text-blue-800">
            ← Kembali ke Dashboard
        </a>
    </div>
</div>
@endsection
