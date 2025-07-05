@extends('layouts.admin')

@section('title','Data Posyandu')

@section('content')
<div class="container">
    <h4>Data Posyandu</h4>
    <a href="{{ route('admin.posyandu.create') }}" class="btn btn-primary mb-3">+ Tambah Posyandu</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Posyandu</th>
                <th>Alamat</th>
                <th>Kelurahan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $posyandu)
                <tr>
                    <td>{{ $posyandu->nama_posyandu }}</td>
                    <td>{{ $posyandu->alamat }}</td>
                    <td>{{ $posyandu->kelurahan }}</td>
                    <td>
                        <a href="{{ route('admin.posyandu.edit', $posyandu->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.posyandu.destroy', $posyandu->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $data->links() }}
</div>
@endsection
