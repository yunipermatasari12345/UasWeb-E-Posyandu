@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Pendaftaran Anak/Ibu Hamil</h1>
            <p class="text-gray-600">Silakan isi formulir pendaftaran di bawah ini</p>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <form action="{{ route('user.store-pendaftaran') }}" method="POST">
                @csrf

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Jenis Pendaftaran *
                    </label>
                    <select name="jenis_pendaftaran" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="">Pilih jenis pendaftaran</option>
                        <option value="balita">Balita</option>
                        <option value="ibu_hamil">Ibu Hamil</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Anak *
                    </label>
                    <input type="text" name="nama_anak" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Tanggal Lahir *
                        </label>
                        <input type="date" name="tanggal_lahir" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Jenis Kelamin *
                        </label>
                        <select name="jenis_kelamin" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <option value="">Pilih jenis kelamin</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Ibu *
                    </label>
                    <input type="text" name="nama_ibu" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            NIK Ibu
                        </label>
                        <input type="text" name="nik_ibu" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Alamat *
                    </label>
                    <textarea name="alamat" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                </div>

                <div class="mb-6" id="usia-kehamilan" style="display: none;">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Usia Kehamilan (minggu)
                    </label>
                    <input type="number" name="usia_kehamilan" min="1" max="42" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Catatan Tambahan
                    </label>
                    <textarea name="catatan" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Catatan khusus atau informasi tambahan..."></textarea>
                </div>

                <div class="flex items-center justify-between">
                    <a href="{{ route('user.dashboard') }}" class="text-gray-600 hover:text-gray-800">
                        ← Kembali ke Dashboard
                    </a>
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Kirim Pendaftaran
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.querySelector('select[name="jenis_pendaftaran"]').addEventListener('change', function() {
    const usiaKehamilan = document.getElementById('usia-kehamilan');
    if (this.value === 'ibu_hamil') {
        usiaKehamilan.style.display = 'block';
        usiaKehamilan.querySelector('input').required = true;
    } else {
        usiaKehamilan.style.display = 'none';
        usiaKehamilan.querySelector('input').required = false;
    }
});
</script>
@endsection
