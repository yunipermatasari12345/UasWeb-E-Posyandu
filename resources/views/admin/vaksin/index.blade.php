@extends('layouts.admin')

@section('title','Data Vaksin')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Data Vaksin</h2>
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Daftar Vaksin</span>
            <a href="{{ route('admin.vaksin.create') }}" class="btn btn-primary btn-sm">+ Tambah Vaksin</a>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-primary">
                    <tr>
                        <th>Nama Vaksin</th>
                        <th>Tanggal</th>
                        <th>Posyandu</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($data as $vaksin)
                    <tr>
                        <td>{{ $vaksin->nama_vaksin }}</td>
                        <td>{{ $vaksin->tanggal }}</td>
                        <td>{{ $vaksin->posyandu->nama_posyandu ?? '-' }}</td>
                        <td>{{ $vaksin->deskripsi }}</td>
                        <td>
                            <a href="{{ route('admin.vaksin.edit', $vaksin->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.vaksin.destroy', $vaksin->id) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center">Belum ada data vaksin.</td></tr>
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
