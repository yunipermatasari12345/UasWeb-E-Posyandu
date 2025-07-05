@extends('layouts.admin')

@section('title','Data Pemeriksaan Balita')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Data Pemeriksaan Balita</h2>
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-primary">
                    <tr>
                        <th>Balita</th>
                        <th>Kader</th>
                        <th>Pencatat</th>
                        <th>Tanggal</th>
                        <th>Berat (kg)</th>
                        <th>Tinggi (cm)</th>
                        <th>Catatan</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($data as $p)
                    <tr>
                        <td>{{ $p->balita->nama_balita ?? '-' }}</td>
                        <td>{{ $p->kader->nama_kader ?? '-' }}</td>
                        <td>{{ $p->user->name ?? '-' }}</td>
                        <td>{{ $p->tanggal }}</td>
                        <td>{{ $p->berat_badan }}</td>
                        <td>{{ $p->tinggi_badan }}</td>
                        <td>{{ $p->catatan }}</td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center">Belum ada data pemeriksaan.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $data->links() }}
        </div>
    </div>
</div>
@endsection
