@extends('layouts.admin')

@section('title','Data Kader')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Data Kader</h2>
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Daftar Kader</span>
            <a href="{{ route('admin.kader.create') }}" class="btn btn-primary btn-sm">+ Tambah Kader</a>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-primary">
                    <tr>
                        <th>Nama</th>
                        <th>No HP</th>
                        <th>Posyandu</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($data as $kader)
                    <tr>
                        <td>{{ $kader->nama_kader }}</td>
                        <td>{{ $kader->no_hp }}</td>
                        <td>{{ $kader->posyandu->nama_posyandu ?? '-' }}</td>
                        <td>
                            <a href="{{ route('admin.kader.edit', $kader->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.kader.destroy', $kader->id) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center">Belum ada data kader.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $data->links() }}
        </div>
    </div>
</div>
@endsection
