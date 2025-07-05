@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Edit Posyandu</h4>

    <form action="{{ route('admin.posyandu.update', $posyandu->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Nama Posyandu</label>
            <input type="text" name="nama_posyandu" class="form-control" value="{{ $posyandu->nama_posyandu }}" required>
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{ $posyandu->alamat }}" required>
        </div>

        <div class="mb-3">
            <label>Kelurahan</label>
            <input type="text" name="kelurahan" class="form-control" value="{{ $posyandu->kelurahan }}" required>
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('admin.posyandu.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
