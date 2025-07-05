<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Data Anak - Posyandu Sejahtera</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-3xl font-bold mb-6">Cek Data Anak</h1>
        <form action="{{ route('cek.anak') }}" method="POST" class="bg-white rounded shadow p-6 max-w-lg mb-6">
            @csrf
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Nama Anak</label>
                <input type="text" name="nama_balita" class="w-full border rounded px-3 py-2" required value="{{ old('nama_balita') }}">
                @error('nama_balita')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="w-full border rounded px-3 py-2" required value="{{ old('tanggal_lahir') }}">
                @error('tanggal_lahir')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Cek Data</button>
        </form>
        @isset($anak)
            @if($anak)
                <div class="bg-green-50 rounded shadow p-6 max-w-lg">
                    <h2 class="text-xl font-bold mb-2">Data Anak Ditemukan</h2>
                    <div><b>Nama:</b> {{ $anak->nama_balita }}</div>
                    <div><b>Tanggal Lahir:</b> {{ $anak->tanggal_lahir }}</div>
                    <div><b>Nama Orang Tua:</b> {{ $anak->nama_ortu }}</div>
                    <div><b>Alamat:</b> {{ $anak->alamat }}</div>
                    <div><b>Posyandu:</b> {{ $anak->posyandu->nama_posyandu ?? '-' }}</div>
                </div>
            @else
                <div class="bg-red-100 text-red-800 px-4 py-2 rounded max-w-lg">Data anak tidak ditemukan.</div>
            @endif
        @endisset
    </div>
</body>
</html>
