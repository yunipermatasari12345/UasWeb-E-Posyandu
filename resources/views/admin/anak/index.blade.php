@extends('layouts.app')
@section('title', 'Daftar Bayi')
@section('content')
<h2 class="mb-4">Daftar Data Bayi <span class="badge bg-primary">{{ $anaks->count() }}</span></h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Bayi</th>
            <th>Tanggal Lahir</th>
            <th>Nama Orang Tua</th>
        </tr>
    </thead>
    <tbody>
        @foreach($anaks as $anak)
        <tr>
            <td>{{ $anak->nama_bayi ?? '-' }}</td>
            <td>{{ $anak->tanggal_lahir ?? '-' }}</td>
            <td>{{ $anak->nama_ortu ?? '-' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
