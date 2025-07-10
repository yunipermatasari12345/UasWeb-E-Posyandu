@extends('layouts.app')

@section('title', 'Dashboard Admin')
@section('subtitle', 'Menu Utama Admin Posyandu')

@section('content')
<div class="max-w-5xl mx-auto py-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
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
        &copy; {{ date('Y') }} Posyandu App - Admin Dashboard
    </div>
</div>
@endsection
