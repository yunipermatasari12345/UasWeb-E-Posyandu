@extends('layouts.app')
@section('title','Edit Balita')

@section('content')
<div class="container">
    <h4>Edit Balita</h4>
    <form action="{{ route('admin.balita.update',$balita->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3"><label>Nama Balita</label>
            <input type="text" name="nama_balita"
                   value="{{ $balita->nama_balita }}" class="form-control" required></div>
        <div class="mb-3"><label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir"
                   value="{{ $balita->tanggal_lahir }}" class="form-control" required></div>
        <div class="mb-3"><label>Nama Orang Tua</label>
            <input type="text" name="nama_ortu"
                   value="{{ $balita->nama_ortu }}" class="form-control" required></div>
        <div class="mb-3"><label>Alamat</label>
            <input type="text" name="alamat"
                   value="{{ $balita->alamat }}" class="form-control"></div>
        <button class="btn btn-success">Update</button>
        <a href="{{ route('admin.balita.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
