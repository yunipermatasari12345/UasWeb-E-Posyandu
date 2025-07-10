@extends('layouts.app')

@section('title', 'Tambah Data Balita')
@section('subtitle', 'Masukkan informasi balita baru')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Tambah Data Balita</h3>
                    <p class="text-sm text-gray-600 mt-1">Lengkapi informasi balita dengan benar</p>
                </div>
                <a href="{{ route('admin.balita.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
            </div>
        </div>

        <form action="{{ route('admin.balita.store') }}" method="POST" class="p-6">
        @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Informasi Balita -->
                <div class="space-y-6">
                    <div>
                        <h4 class="text-md font-medium text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-baby text-purple-600 mr-2"></i>
                            Informasi Balita
                        </h4>
                    </div>

                    <div>
                        <label for="nama_balita" class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Balita <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               name="nama_balita"
                               id="nama_balita"
                               value="{{ old('nama_balita') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('nama_balita') border-red-500 @enderror"
                               placeholder="Masukkan nama lengkap balita">
                        @error('nama_balita')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700 mb-2">
                            Jenis Kelamin <span class="text-red-500">*</span>
                        </label>
                        <select name="jenis_kelamin"
                                id="jenis_kelamin"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('jenis_kelamin') border-red-500 @enderror">
                            <option value="">Pilih jenis kelamin</option>
                            <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="tempat_lahir" class="block text-sm font-medium text-gray-700 mb-2">
                            Tempat Lahir <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               name="tempat_lahir"
                               id="tempat_lahir"
                               value="{{ old('tempat_lahir') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('tempat_lahir') border-red-500 @enderror"
                               placeholder="Kota tempat lahir">
                        @error('tempat_lahir')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-2">
                            Tanggal Lahir <span class="text-red-500">*</span>
                        </label>
                        <input type="date"
                               name="tanggal_lahir"
                               id="tanggal_lahir"
                               value="{{ old('tanggal_lahir') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('tanggal_lahir') border-red-500 @enderror">
                        @error('tanggal_lahir')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="berat_lahir" class="block text-sm font-medium text-gray-700 mb-2">
                            Berat Lahir (kg) <span class="text-red-500">*</span>
                        </label>
                        <input type="number"
                               name="berat_lahir"
                               id="berat_lahir"
                               value="{{ old('berat_lahir') }}"
                               step="0.1"
                               min="0"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('berat_lahir') border-red-500 @enderror"
                               placeholder="2.5">
                        @error('berat_lahir')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="panjang_lahir" class="block text-sm font-medium text-gray-700 mb-2">
                            Panjang Lahir (cm) <span class="text-red-500">*</span>
                        </label>
                        <input type="number"
                               name="panjang_lahir"
                               id="panjang_lahir"
                               value="{{ old('panjang_lahir') }}"
                               step="0.1"
                               min="0"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('panjang_lahir') border-red-500 @enderror"
                               placeholder="48.5">
                        @error('panjang_lahir')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Informasi Orang Tua -->
                <div class="space-y-6">
                    <div>
                        <h4 class="text-md font-medium text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-users text-blue-600 mr-2"></i>
                            Informasi Orang Tua
                        </h4>
                    </div>

                    <div>
                        <label for="nama_ortu" class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Orang Tua <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               name="nama_ortu"
                               id="nama_ortu"
                               value="{{ old('nama_ortu') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('nama_ortu') border-red-500 @enderror"
                               placeholder="Nama ayah/ibu">
                        @error('nama_ortu')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="no_hp_ortu" class="block text-sm font-medium text-gray-700 mb-2">
                            No. HP Orang Tua <span class="text-red-500">*</span>
                        </label>
                        <input type="tel"
                               name="no_hp_ortu"
                               id="no_hp_ortu"
                               value="{{ old('no_hp_ortu') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('no_hp_ortu') border-red-500 @enderror"
                               placeholder="081234567890">
                        @error('no_hp_ortu')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">
                            Alamat <span class="text-red-500">*</span>
                        </label>
                        <textarea name="alamat"
                                  id="alamat"
                                  rows="3"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('alamat') border-red-500 @enderror"
                                  placeholder="Alamat lengkap">{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="posyandu_id" class="block text-sm font-medium text-gray-700 mb-2">
                            Posyandu <span class="text-red-500">*</span>
                        </label>
                        <select name="posyandu_id"
                                id="posyandu_id"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('posyandu_id') border-red-500 @enderror">
                            <option value="">Pilih Posyandu</option>
                            @foreach($posyandus as $posyandu)
                                <option value="{{ $posyandu->id }}" {{ old('posyandu_id') == $posyandu->id ? 'selected' : '' }}>
                                    {{ $posyandu->nama_posyandu }} - {{ $posyandu->kelurahan }}
                                </option>
                            @endforeach
                        </select>
                        @error('posyandu_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="catatan" class="block text-sm font-medium text-gray-700 mb-2">
                            Catatan Khusus
                        </label>
                        <textarea name="catatan"
                                  id="catatan"
                                  rows="3"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('catatan') border-red-500 @enderror"
                                  placeholder="Catatan kesehatan atau kondisi khusus">{{ old('catatan') }}</textarea>
                        @error('catatan')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Tombol Submit -->
            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200 mt-8">
                <a href="{{ route('admin.balita.index') }}"
                   class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                    Batal
                </a>
                <button type="submit"
                        class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 transition-colors">
                    <i class="fas fa-save mr-2"></i>
                    Simpan Data
                </button>
            </div>
    </form>
    </div>
</div>

@push('scripts')
<script>
// Auto-calculate age when date of birth changes
document.getElementById('tanggal_lahir').addEventListener('change', function() {
    const birthDate = new Date(this.value);
    const today = new Date();
    const ageInMonths = (today.getFullYear() - birthDate.getFullYear()) * 12 +
                       (today.getMonth() - birthDate.getMonth());

    // You can display the calculated age somewhere if needed
    console.log('Age in months:', ageInMonths);
});

// Phone number formatting
document.getElementById('no_hp_ortu').addEventListener('input', function() {
    let value = this.value.replace(/\D/g, '');
    if (value.length > 0) {
        if (value.startsWith('0')) {
            value = value.substring(1);
        }
        if (value.length > 0 && !value.startsWith('62')) {
            value = '62' + value;
        }
    }
    this.value = value;
});
</script>
@endpush
@endsection
