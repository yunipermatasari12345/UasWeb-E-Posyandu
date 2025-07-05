{{-- resources/views/admin/kader/index.blade.php --}}

@extends('layouts.admin') {{-- Pastikan layout ini ada, atau sesuaikan dengan layout milikmu --}}

@section('title', 'Data Kader')

@section('content')
<div class="container mt-4">
    <h1>Data Kader</h1>

    <a href="{{ route('admin.kader.create') }}" class="btn btn-primary mb-3">Tambah Kader</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Nomor HP</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kaders as $kader)
                <tr>
                    <td>{{ $kader->nama }}</td>
                    <td>{{ $kader->no_hp }}</td>
                    <td>{{ $kader->alamat }}</td>
                    <td>
                        <a href="{{ route('admin.kader.edit', $kader->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.kader.destroy', $kader->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Belum ada data kader.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
