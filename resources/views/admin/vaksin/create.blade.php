@extends('layouts.admin')

@section('title','Tambah Vaksin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-9">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span class="fw-bold">Tambah Vaksin</span>
                    <a href="{{ route('admin.vaksin.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.vaksin.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Vaksin</label>
                            <input type="text" name="nama_vaksin" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="2"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Posyandu</label>
                            <select name="posyandu_id" class="form-select" required>
                                <option value="">-- pilih posyandu --</option>
                                @foreach ($posyandus as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama_posyandu }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary me-2">Simpan</button>
                            <a href="{{ route('admin.vaksin.index') }}" class="btn btn-outline-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
