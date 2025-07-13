@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Edit Berita Kesehatan</h1>
    <form action="{{ route('admin.berita.update', $berita) }}" method="POST" class="bg-white rounded shadow p-6" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Judul</label>
            <input type="text" name="judul" class="w-full border rounded px-3 py-2" required value="{{ old('judul', $berita->judul) }}">
            @error('judul')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Slug</label>
            <input type="text" name="slug" class="w-full border rounded px-3 py-2" required value="{{ old('slug', $berita->slug) }}">
            @error('slug')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Kategori</label>
            <input type="text" name="kategori" class="w-full border rounded px-3 py-2" required value="{{ old('kategori', $berita->kategori) }}">
            @error('kategori')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Ringkasan</label>
            <textarea name="ringkasan" rows="2" class="w-full border rounded px-3 py-2" required>{{ old('ringkasan', $berita->ringkasan) }}</textarea>
            @error('ringkasan')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Konten</label>
            <textarea name="konten" rows="6" class="w-full border rounded px-3 py-2" required>{{ old('konten', $berita->konten) }}</textarea>
            @error('konten')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Penulis</label>
            <input type="text" name="penulis" class="w-full border rounded px-3 py-2" value="{{ old('penulis', $berita->penulis) }}">
            @error('penulis')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Status</label>
            <select name="status" class="w-full border rounded px-3 py-2">
                <option value="draft" {{ old('status', $berita->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ old('status', $berita->status) == 'published' ? 'selected' : '' }}>Published</option>
            </select>
            @error('status')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Gambar (opsional)</label>
            <input type="file" name="gambar" class="w-full border rounded px-3 py-2">
            @if($berita->gambar)
                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita" class="h-24 mt-2">
            @endif
            @error('gambar')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Tags</label>
            <input type="text" name="tags" class="w-full border rounded px-3 py-2" value="{{ old('tags', $berita->tags) }}">
            @error('tags')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Meta Description</label>
            <input type="text" name="meta_description" class="w-full border rounded px-3 py-2" value="{{ old('meta_description', $berita->meta_description) }}">
            @error('meta_description')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
        <a href="{{ route('admin.berita.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
</div>
@endsection
