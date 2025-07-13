<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Anak - e-Posyandu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-blue-50 to-purple-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-lg mx-auto py-10">
        <div class="bg-white rounded-2xl shadow-xl p-8 mb-8 border border-blue-100">
            <h1 class="text-2xl font-bold text-blue-700 mb-2 text-center"><i class="fas fa-user-plus mr-2"></i>Pendaftaran Anak</h1>
            <p class="text-gray-500 text-center mb-6">Isi data anak dengan benar untuk mendaftar ke posyandu.</p>
            @if(session('success'))
                <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4 text-center font-semibold">{{ session('success') }}</div>
            @endif
            @if($errors->any())
                <div class="bg-red-100 text-red-800 px-4 py-3 rounded mb-4 text-center font-semibold">
                    {{ $errors->first() }}
                </div>
            @endif
            <form action="{{ route('daftar.anak') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Nama Anak</label>
                    <input type="text" name="nama_balita" class="w-full border border-blue-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none" required value="{{ old('nama_balita') }}">
                </div>
                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="w-full border border-blue-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none" required value="{{ old('tempat_lahir') }}">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-1 font-semibold text-gray-700">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="w-full border border-blue-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none" required value="{{ old('tanggal_lahir') }}">
                    </div>
                    <div>
                        <label class="block mb-1 font-semibold text-gray-700">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="w-full border border-blue-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none" required>
                            <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-1 font-semibold text-gray-700">Berat Lahir (kg)</label>
                        <input type="number" step="0.01" name="berat_lahir" class="w-full border border-blue-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none" required value="{{ old('berat_lahir') }}">
                    </div>
                    <div>
                        <label class="block mb-1 font-semibold text-gray-700">Panjang Lahir (cm)</label>
                        <input type="number" step="0.1" name="panjang_lahir" class="w-full border border-blue-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none" required value="{{ old('panjang_lahir') }}">
                    </div>
                </div>
                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Nama Orang Tua</label>
                    <input type="text" name="nama_ortu" class="w-full border border-blue-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none" required value="{{ old('nama_ortu') }}">
                </div>
                <div>
                    <label class="block mb-1 font-semibold text-gray-700">No. HP Orang Tua</label>
                    <input type="text" name="no_hp_ortu" class="w-full border border-blue-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none" required value="{{ old('no_hp_ortu') }}">
                </div>
                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Alamat</label>
                    <textarea name="alamat" class="w-full border border-blue-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none" required>{{ old('alamat') }}</textarea>
                </div>
                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Pilih Posyandu</label>
                    <select name="posyandu_id" class="w-full border border-blue-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none" required>
                        <option value="">-- Pilih Posyandu --</option>
                        @foreach($posyandus as $posyandu)
                            <option value="{{ $posyandu->id }}" {{ old('posyandu_id') == $posyandu->id ? 'selected' : '' }}>{{ $posyandu->nama_posyandu }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg transition"><i class="fas fa-paper-plane mr-1"></i> Daftar</button>
            </form>
        </div>
    </div>
</body>
</html>
