@extends('layouts.admin')

@section('title','Tambah Pemeriksaan')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Tambah Data Pemeriksaan</h2>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.pemeriksaan.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="balita_id" class="form-label">Balita</label>
                    <select name="balita_id" id="balita_id" class="form-select" required>
                        <option value="">- Pilih Balita -</option>
                        @foreach($balitas as $b)
                            <option value="{{ $b->id }}">{{ $b->nama_balita }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="kader_id" class="form-label">Kader</label>
                    <select name="kader_id" id="kader_id" class="form-select" required>
                        <option value="">- Pilih Kader -</option>
                        @foreach($kaders as $k)
                            <option value="{{ $k->id }}">{{ $k->nama_kader }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="user_id" class="form-label">Pencatat</label>
                    <select name="user_id" id="user_id" class="form-select" required>
                        <option value="">- Pilih User -</option>
                        @foreach($users as $u)
                            <option value="{{ $u->id }}">{{ $u->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="berat_badan" class="form-label">Berat Badan (kg)</label>
                    <input type="number" step="0.01" name="berat_badan" id="berat_badan" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="tinggi_badan" class="form-label">Tinggi Badan (cm)</label>
                    <input type="number" step="0.1" name="tinggi_badan" id="tinggi_badan" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="catatan" class="form-label">Catatan</label>
                    <textarea name="catatan" id="catatan" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.pemeriksaan.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
