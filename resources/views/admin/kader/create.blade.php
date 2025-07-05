@extends('layouts.app')
@section('title','Tambah Kader')

@section('content')
<div class="container">
    <h4>Tambah Kader</h4>
    <form action="{{ route('admin.kader.store') }}" method="POST">@csrf
        <div class="mb-3"><label>Nama</label><input type="text" name="nama_kader" class="form-control" required></div>
        <div class="mb-3"><label>No HP</label><input type="text" name="no_hp" class="form-control"></div>
        <div class="mb-3">
            <label>Posyandu</label>
            <select name="posyandu_id" class="form-select" required>
                <option value="">Pilih</option>
                @foreach($posyandus as $p)
                    <option value="{{ $p->id }}">{{ $p->nama_posyandu }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.kader.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
