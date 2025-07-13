@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Pengumuman Posyandu</h1>
        <p class="text-gray-600">Informasi terbaru dari admin Posyandu</p>
    </div>

    @if($pengumuman->count() > 0)
    <div class="space-y-6">
        @foreach($pengumuman as $p)
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-start justify-between mb-4">
                <div class="flex-1">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $p->judul }}</h3>
                    <div class="flex items-center space-x-4 text-sm text-gray-600 mb-3">
                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded">{{ ucfirst($p->kategori) }}</span>
                        <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded">{{ ucfirst($p->prioritas) }}</span>
                        <span>{{ $p->created_at->format('d/m/Y H:i') }}</span>
                    </div>
                </div>
                @if($p->tanggal_berlaku)
                <div class="text-right">
                    <span class="text-sm text-gray-500">Berlaku sampai:</span>
                    <p class="text-sm font-medium text-gray-800">{{ $p->tanggal_berlaku->format('d/m/Y') }}</p>
                </div>
                @endif
            </div>

            <div class="prose max-w-none">
                <p class="text-gray-700 leading-relaxed">{{ $p->isi_pengumuman }}</p>
            </div>

            @if($p->prioritas == 'urgent')
            <div class="mt-4 p-3 bg-red-50 border border-red-200 rounded-lg">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-triangle text-red-600 mr-2"></i>
                    <span class="text-red-800 font-medium">Pengumuman Penting</span>
                </div>
            </div>
            @endif
        </div>
        @endforeach
    </div>
    @else
    <div class="bg-white rounded-lg shadow-md p-8 text-center">
        <i class="fas fa-bullhorn text-gray-400 text-4xl mb-4"></i>
        <h3 class="text-lg font-semibold text-gray-800 mb-2">Belum Ada Pengumuman</h3>
        <p class="text-gray-600">Pengumuman dari admin akan ditampilkan di sini</p>
    </div>
    @endif

    <div class="mt-8">
        <a href="{{ route('user.dashboard') }}" class="text-blue-600 hover:text-blue-800">
            ← Kembali ke Dashboard
        </a>
    </div>
</div>
@endsection
