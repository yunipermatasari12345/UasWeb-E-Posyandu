@extends('layouts.admin')

@section('title','Edit Data Anak')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-9">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span class="fw-bold">Edit Data Anak</span>
                    <a href="{{ route('admin.anak.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.anak.update', $anak->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Nama Anak</label>
                            <input type="text" name="nama" class="form-control" value="{{ $anak->nama }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" value="{{ $anak->tanggal_lahir }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-select" required>
                                <option value="">-- pilih jenis kelamin --</option>
                                <option value="Laki-laki" {{ $anak->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ $anak->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control" rows="2" required>{{ $anak->alamat }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Posyandu</label>
                            <select name="posyandu_id" class="form-select" required>
                                <option value="">-- pilih posyandu --</option>
                                @foreach ($posyandus as $p)
                                    <option value="{{ $p->id }}" {{ $anak->posyandu_id == $p->id ? 'selected' : '' }}>{{ $p->nama_posyandu }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary me-2">Update</button>
                            <a href="{{ route('admin.anak.index') }}" class="btn btn-outline-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
