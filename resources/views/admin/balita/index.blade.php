@extends('layouts.app')

@section('title', 'Data Balita')
@section('content')
<div class="container mx-auto py-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Data Balita</h1>
        <a href="{{ route('admin.balita.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tambah Balita</a>
    </div>
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
    @endif
    <div class="bg-white shadow rounded">
        <table class="min-w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left">Nama Balita</th>
                    <th class="px-4 py-2 text-left">Jenis Kelamin</th>
                    <th class="px-4 py-2 text-left">Tanggal Lahir</th>
                    <th class="px-4 py-2 text-left">Orang Tua</th>
                    <th class="px-4 py-2 text-left">Posyandu</th>
                    <th class="px-4 py-2 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($balitas as $balita)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $balita->nama_balita }}</td>
                    <td class="px-4 py-2">
                        {{ $balita->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                    </td>
                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($balita->tanggal_lahir)->format('d M Y') }}</td>
                    <td class="px-4 py-2">{{ $balita->nama_ortu }}</td>
                    <td class="px-4 py-2">{{ optional($balita->posyandu)->nama_posyandu }}</td>
                    <td class="px-4 py-2 text-right">
                        <a href="{{ route('admin.balita.show', $balita->id) }}" class="text-blue-600 hover:underline mr-2">Lihat</a>
                        <a href="{{ route('admin.balita.edit', $balita->id) }}" class="text-green-600 hover:underline mr-2">Edit</a>
                        <form action="{{ route('admin.balita.destroy', $balita->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus data?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-8 text-gray-500">Belum ada data balita.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-4">
            {{ $balitas->links() }}
        </div>
    </div>
</div>
@endsection
