@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Daftar Berita Kesehatan</h1>
    <a href="{{ route('admin.berita.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Berita</a>
    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">{{ session('success') }}</div>
    @endif
    <div class="bg-white rounded shadow p-4">
        <table class="min-w-full">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Judul</th>
                    <th class="py-2 px-4 border-b">Penulis</th>
                    <th class="py-2 px-4 border-b">Tanggal</th>
                    <th class="py-2 px-4 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($beritas as $berita)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $berita->judul }}</td>
                    <td class="py-2 px-4 border-b">{{ $berita->penulis }}</td>
                    <td class="py-2 px-4 border-b">{{ $berita->created_at->format('d-m-Y') }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('admin.berita.edit', $berita) }}" class="text-yellow-600 hover:underline mr-2">Edit</a>
                        <form action="{{ route('admin.berita.destroy', $berita) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button class="text-red-600 hover:underline" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">{{ $beritas->links() }}</div>
    </div>
</div>
@endsection
