@extends('layouts.admin')

@section('title','Data Anak')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span class="fw-bold">Data Anak</span>
                    <a href="{{ route('admin.anak.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Posyandu</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($anaks as $index => $anak)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $anak->nama }}</td>
                                    <td>{{ $anak->tanggal_lahir }}</td>
                                    <td>{{ $anak->jenis_kelamin }}</td>
                                    <td>{{ $anak->alamat }}</td>
                                    <td>{{ $anak->posyandu->nama_posyandu ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('admin.anak.edit', $anak->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('admin.anak.destroy', $anak->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
