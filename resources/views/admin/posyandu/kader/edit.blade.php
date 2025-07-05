@extends('layouts.app')
@section('title','Edit Kader')

@section('content')
<form action="{{ route('admin.kader.update',$kader->id) }}" method="POST">@csrf @method('PUT')
  <div class="mb-3"><label>Nama</label><input type="text" name="nama_kader" value="{{ $kader->nama_kader }}" class="form-control" required></div>
  <div class="mb-3"><label>No HP</label><input type="text" name="no_hp" value="{{ $kader->no_hp }}" class="form-control"></div>
  <div class="mb-3">
    <label>Posyandu</label>
    <select name="posyandu_id" class="form-select" required>
      @foreach($posyandus as $p)
          <option value="{{ $p->id }}" {{ $kader->posyandu_id==$p->id?'selected':'' }}>
              {{ $p->nama_posyandu }}
          </option>
      @endforeach
    </select>
  </div>
  <button class="btn btn-success">Update</button>
  <a href="{{ route('admin.kader.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
