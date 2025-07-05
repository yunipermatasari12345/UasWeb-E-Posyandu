@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Tambah Berita Kesehatan</h1>
    <form action="{{ route('admin.berita.store') }}" method="POST" class="bg-white rounded shadow p-6">
        @csrf
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Judul</label>
            <input type="text" name="judul" class="w-full border rounded px-3 py-2" required value="{{ old('judul') }}">
            @error('judul')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Isi Berita</label>
            <textarea name="isi" rows="6" class="w-full border rounded px-3 py-2" required>{{ old('isi') }}</textarea>
            @error('isi')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('admin.berita.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
</div>
@endsection
