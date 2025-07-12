@extends('layouts.app')
@section('title', 'Daftar Ibu Hamil')
@section('content')
<h2 class="mb-4">Daftar Data Ibu Hamil <span class="badge bg-primary">{{ $ibus->count() }}</span></h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Ibu</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ibus as $ibu)
        <tr>
            <td>{{ $ibu->nama_ibu ?? '-' }}</td>
            <td>{{ $ibu->tanggal_lahir ?? '-' }}</td>
            <td>{{ $ibu->alamat ?? '-' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
