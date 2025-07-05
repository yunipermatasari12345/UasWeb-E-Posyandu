<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Anak - Posyandu Sejahtera</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-3xl font-bold mb-6">Pendaftaran Anak Posyandu</h1>
        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">{{ session('success') }}</div>
        @endif
        <form action="{{ route('daftar.anak') }}" method="POST" class="bg-white rounded shadow p-6 max-w-lg">
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
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Nama Orang Tua</label>
                <input type="text" name="nama_ortu" class="w-full border rounded px-3 py-2" required value="{{ old('nama_ortu') }}">
                @error('nama_ortu')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Alamat</label>
                <input type="text" name="alamat" class="w-full border rounded px-3 py-2" value="{{ old('alamat') }}">
                @error('alamat')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Posyandu</label>
                <select name="posyandu_id" class="w-full border rounded px-3 py-2" required>
                    <option value="">-- Pilih Posyandu --</option>
                    @foreach(\App\Models\YuniPosyandu::all() as $posyandu)
                        <option value="{{ $posyandu->id }}" {{ old('posyandu_id') == $posyandu->id ? 'selected' : '' }}>{{ $posyandu->nama_posyandu }}</option>
                    @endforeach
                </select>
                @error('posyandu_id')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Daftar</button>
        </form>
    </div>
</body>
</html>
