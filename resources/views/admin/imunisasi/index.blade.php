@extends('layouts.admin')

@section('title','Data Imunisasi')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Data Imunisasi</h2>
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Daftar Imunisasi</span>
            <a href="{{ route('admin.imunisasi.create') }}" class="btn btn-primary btn-sm">+ Tambah Imunisasi</a>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-primary">
                    <tr>
                        <th>Nama Imunisasi</th>
                        <th>Tanggal</th>
                        <th>Posyandu</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($data as $imunisasi)
                    <tr>
                        <td>{{ $imunisasi->nama_imunisasi }}</td>
                        <td>{{ $imunisasi->tanggal }}</td>
                        <td>{{ $imunisasi->posyandu->nama_posyandu ?? '-' }}</td>
                        <td>{{ $imunisasi->deskripsi }}</td>
                        <td>
                            <a href="{{ route('admin.imunisasi.edit', $imunisasi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.imunisasi.destroy', $imunisasi->id) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center">Belum ada data imunisasi.</td></tr>
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
