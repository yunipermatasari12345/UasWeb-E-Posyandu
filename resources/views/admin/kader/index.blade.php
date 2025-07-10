@extends('layouts.app')

@section('title', 'Data Kader')
@section('content')
<div class="container mx-auto py-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Data Kader</h1>
        <a href="{{ route('admin.kader.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tambah Kader</a>
    </div>
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
    @endif
    <div class="bg-white shadow rounded">
        <table class="min-w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left">Nama Kader</th>
                    <th class="px-4 py-2 text-left">Jenis Kelamin</th>
                    <th class="px-4 py-2 text-left">Alamat</th>
                    <th class="px-4 py-2 text-left">No HP</th>
                    <th class="px-4 py-2 text-left">Posyandu</th>
                    <th class="px-4 py-2 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kaders as $kader)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $kader->nama_kader }}</td>
                    <td class="px-4 py-2">{{ $kader->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                    <td class="px-4 py-2">{{ $kader->alamat }}</td>
                    <td class="px-4 py-2">{{ $kader->no_hp }}</td>
                    <td class="px-4 py-2">{{ optional($kader->posyandu)->nama_posyandu }}</td>
                    <td class="px-4 py-2 text-right">
                        <a href="{{ route('admin.kader.show', $kader->id) }}" class="text-blue-600 hover:underline mr-2">Lihat</a>
                        <a href="{{ route('admin.kader.edit', $kader->id) }}" class="text-green-600 hover:underline mr-2">Edit</a>
                        <form action="{{ route('admin.kader.destroy', $kader->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus data?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-8 text-gray-500">Belum ada data kader.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-4">
            {{ $kaders->links() }}
        </div>
    </div>
</div>
@endsection
