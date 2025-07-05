@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Data Balita</h4>
    <a href="{{ route('admin.balita.create') }}" class="btn btn-primary mb-3">+ Tambah Balita</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th><th>Tanggal Lahir</th><th>Orang Tua</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($data as $balita)
            <tr>
                <td>{{ $balita->nama_balita }}</td>
                <td>{{ \Carbon\Carbon::parse($balita->tanggal_lahir)->format('d-m-Y') }}</td>
                <td>{{ $balita->nama_ortu }}</td>
                <td>
                    <a href="{{ route('admin.balita.edit', $balita->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.balita.destroy', $balita->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Hapus data?')" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $data->links() }}
</div>
@endsection
