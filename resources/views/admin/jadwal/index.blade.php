@extends('layouts.admin')


@section('content')
<div class="container">
    <h4>Data Jadwal Posyandu</h4>
    <a href="{{ route('admin.jadwal.create') }}" class="btn btn-primary mb-3">+ Tambah Jadwal</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tanggal</th><th>Jam</th><th>Kegiatan</th><th>Posyandu</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($data as $jadwal)
            <tr>
                <td>{{ \Carbon\Carbon::parse($jadwal->tanggal)->format('d-m-Y') }}</td>
                <td>{{ $jadwal->jam }}</td>
                <td>{{ $jadwal->kegiatan }}</td>
                <td>{{ $jadwal->posyandu->nama_posyandu }}</td>
                <td>
                    <a href="{{ route('admin.jadwal.edit', $jadwal->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.jadwal.destroy', $jadwal->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Hapus jadwal?')" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $data->links() }}
</div>
@endsection
