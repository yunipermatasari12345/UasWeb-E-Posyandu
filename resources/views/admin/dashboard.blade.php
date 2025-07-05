@extends('layouts.admin') {{-- BENAR --}}


@section('title','Dashboard Admin')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Dashboard Admin</h2>
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>🩺 Data Posyandu (5 Terbaru)</span>
                    <a href="{{ route('admin.posyandu.index') }}" class="btn btn-sm btn-primary">Lihat Semua</a>
                </div>
                <div class="card-body p-0">
                    <table class="table table-sm mb-0">
                        <thead><tr><th>Nama</th><th>Alamat</th><th>Kelurahan</th></tr></thead>
                        <tbody>
                        @foreach($posyandus as $p)
                            <tr>
                                <td>{{ $p->nama_posyandu }}</td>
                                <td>{{ $p->alamat }}</td>
                                <td>{{ $p->kelurahan }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>👩‍⚕️ Data Kader (5 Terbaru)</span>
                    <a href="{{ route('admin.kader.index') }}" class="btn btn-sm btn-primary">Lihat Semua</a>
                </div>
                <div class="card-body p-0">
                    <table class="table table-sm mb-0">
                        <thead><tr><th>Nama</th><th>No HP</th><th>Posyandu</th></tr></thead>
                        <tbody>
                        @foreach($kaders as $k)
                            <tr>
                                <td>{{ $k->nama_kader }}</td>
                                <td>{{ $k->no_hp }}</td>
                                <td>{{ optional($k->posyandu)->nama_posyandu }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm mt-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>👶 Data Balita (5 Terbaru)</span>
                    <a href="{{ route('admin.balita.index') }}" class="btn btn-sm btn-primary">Lihat Semua</a>
                </div>
                <div class="card-body p-0">
                    <table class="table table-sm mb-0">
                        <thead><tr><th>Nama</th><th>Tgl Lahir</th><th>Ortu</th></tr></thead>
                        <tbody>
                        @foreach($balitas as $b)
                            <tr>
                                <td>{{ $b->nama_balita }}</td>
                                <td>{{ $b->tanggal_lahir }}</td>
                                <td>{{ $b->nama_ortu }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm mt-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>📅 Jadwal Posyandu (5 Terbaru)</span>
                    <a href="{{ route('admin.jadwal.index') }}" class="btn btn-sm btn-primary">Lihat Semua</a>
                </div>
                <div class="card-body p-0">
                    <table class="table table-sm mb-0">
                        <thead><tr><th>Tanggal</th><th>Jam</th><th>Kegiatan</th><th>Posyandu</th></tr></thead>
                        <tbody>
                        @foreach($jadwals as $j)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($j->tanggal)->format('d-m-Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($j->jam)->format('H:i') }}</td>
                                <td>{{ $j->kegiatan }}</td>
                                <td>{{ optional($j->posyandu)->nama_posyandu }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
