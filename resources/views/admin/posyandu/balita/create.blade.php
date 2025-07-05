@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Tambah Balita</h4>

    <form action="{{ route('admin.balita.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Balita</label>
            <input type="text" name="nama_balita" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama Orang Tua</label>
            <input type="text" name="nama_ortu" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control">
        </div>
        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.balita.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
