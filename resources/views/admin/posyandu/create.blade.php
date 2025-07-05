@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Tambah Posyandu</h4>

    <form action="{{ route('admin.posyandu.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Posyandu</label>
            <input type="text" name="nama_posyandu" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Kelurahan</label>
            <input type="text" name="kelurahan" class="form-control" required>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.posyandu.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
