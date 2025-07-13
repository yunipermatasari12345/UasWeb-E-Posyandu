@extends('layouts.app')

@section('title', 'Detail Berita')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Detail Berita</h1>
        <nav class="text-sm text-gray-600 mb-4">
            <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-600">Dashboard</a>
            <span class="mx-2">/</span>
            <a href="{{ route('admin.berita.index') }}" class="hover:text-blue-600">Berita</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800">Detail</span>
        </nav>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-blue-700 mb-2">{{ $berita->judul }}</h2>
            <div class="flex items-center text-sm text-gray-500 mb-2">
                <span><i class="fas fa-user mr-1"></i> {{ $berita->penulis ?? 'Admin' }}</span>
                <span class="mx-2">|</span>
                <span><i class="fas fa-calendar-alt mr-1"></i> {{ $berita->created_at->format('d M Y H:i') }}</span>
                <span class="mx-2">|</span>
                <span><i class="fas fa-tag mr-1"></i> {{ $berita->kategori }}</span>
                <span class="mx-2">|</span>
                <span>Status: <span class="font-semibold {{ $berita->status == 'published' ? 'text-green-600' : 'text-yellow-600' }}">{{ ucfirst($berita->status) }}</span></span>
            </div>
            @if($berita->gambar)
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita" class="rounded-lg max-h-72 object-cover">
                </div>
            @endif
        </div>
        <div class="mb-4">
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Ringkasan</h3>
            <div class="text-gray-800">{{ $berita->ringkasan }}</div>
        </div>
        <div class="prose max-w-none text-gray-800 mb-6">
            {!! nl2br(e($berita->konten)) !!}
        </div>
        <div class="flex flex-wrap gap-3 mt-8">
            <a href="{{ route('admin.berita.edit', $berita->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-200">
                <i class="fas fa-edit mr-2"></i>Edit
            </a>
            <a href="{{ route('admin.berita.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg transition duration-200">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
            <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition duration-200">
                    <i class="fas fa-trash mr-2"></i>Hapus
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
