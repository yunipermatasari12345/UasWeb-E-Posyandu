@extends('layouts.admin')

@section('title','Data Balita')

@section('content')
<div class="container">
    <h4>Data Balita</h4>
    <a href="{{ route('admin.balita.create') }}" class="btn btn-primary mb-3">
        + Tambah Balita
    </a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr><th>Nama</th><th>Tgl. Lahir</th><th>Ortu</th><th>Aksi</th></tr>
        </thead>
        <tbody>
        @forelse ($balitas as $balita)
            <tr>
                <td>{{ $balita->nama_balita }}</td>
                <td>{{ \Carbon\Carbon::parse($balita->tanggal_lahir)->format('d-m-Y') }}</td>
                <td>{{ $balita->nama_ortu }}</td>
                <td>
                    <a href="{{ route('admin.balita.edit',$balita->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.balita.destroy',$balita->id) }}"
                          method="POST" class="d-inline"
                          onsubmit="return confirm('Hapus data?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="4" class="text-center">Belum ada data balita.</td></tr>
        @endforelse
        </tbody>
    </table>

    {{ $balitas->links() }}
</div>
@endsection
