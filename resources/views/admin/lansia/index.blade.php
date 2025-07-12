@extends('layouts.app')
@section('title', 'Daftar Lansia')
@section('content')
<h2 class="mb-4">Daftar Data Lansia <span class="badge bg-primary">{{ $lansias->count() }}</span></h2>
@if($lansias->count() == 0)
    <div class="alert alert-info">Belum ada data lansia.</div>
@else
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Lansia</th>
            <th>Usia</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        @foreach($lansias as $lansia)
        <tr>
            <td>{{ $lansia->nama_lansia ?? '-' }}</td>
            <td>{{ $lansia->usia ?? '-' }}</td>
            <td>{{ $lansia->alamat ?? '-' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection
