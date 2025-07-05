@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Edit Jadwal</h4>

    <form action="{{ route('admin.jadwal.update', $jadwal->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $jadwal->tanggal }}" required>
        </div>
        <div class="mb-3">
            <label>Jam</label>
            <input type="time" name="jam" class="form-control" value="{{ $jadwal->jam }}" required>
        </div>
        <div class="mb-3">
            <label>Kegiatan</label>
            <input type="text" name="kegiatan" class="form-control" value="{{ $jadwal->kegiatan }}" required>
        </div>
        <div class="mb-3">
            <label>Posyandu</label>
            <select name="posyandu_id" class="form-control" required>
                @foreach ($posyandus as $p)
                    <option value="{{ $p->id }}" {{ $p->id==$jadwal->posyandu_id ? 'selected' : '' }}>
                        {{ $p->nama_posyandu }}
                    </option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success">Update</button>
        <a href="{{ route('admin.jadwal.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
