@extends('layouts.app')

@section('title', 'Tambah Data Posyandu')
@section('subtitle', 'Masukkan informasi posyandu baru')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Tambah Data Posyandu</h3>
                    <p class="text-sm text-gray-600 mt-1">Lengkapi informasi posyandu dengan benar</p>
                </div>
                <a href="{{ route('admin.posyandu.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
            </div>
        </div>

        <form action="{{ route('admin.posyandu.store') }}" method="POST" class="p-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Informasi Dasar -->
                <div class="space-y-6">
                    <div>
                        <h4 class="text-md font-medium text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-hospital text-blue-600 mr-2"></i>
                            Informasi Dasar
                        </h4>
                    </div>

                    <div>
                        <label for="nama_posyandu" class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Posyandu <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               name="nama_posyandu"
                               id="nama_posyandu"
                               value="{{ old('nama_posyandu') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('nama_posyandu') border-red-500 @enderror"
                               placeholder="Contoh: Posyandu Melati">
                        @error('nama_posyandu')
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
                                  placeholder="Alamat lengkap posyandu">{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="kelurahan" class="block text-sm font-medium text-gray-700 mb-2">
                            Kelurahan <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               name="kelurahan"
                               id="kelurahan"
                               value="{{ old('kelurahan') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('kelurahan') border-red-500 @enderror"
                               placeholder="Nama kelurahan">
                        @error('kelurahan')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="kecamatan" class="block text-sm font-medium text-gray-700 mb-2">
                            Kecamatan <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               name="kecamatan"
                               id="kecamatan"
                               value="{{ old('kecamatan') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('kecamatan') border-red-500 @enderror"
                               placeholder="Nama kecamatan">
                        @error('kecamatan')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Informasi Kontak -->
                <div class="space-y-6">
                    <div>
                        <h4 class="text-md font-medium text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-phone text-green-600 mr-2"></i>
                            Informasi Kontak
                        </h4>
                    </div>

                    <div>
                        <label for="no_hp" class="block text-sm font-medium text-gray-700 mb-2">
                            No. HP <span class="text-red-500">*</span>
                        </label>
                        <input type="tel"
                               name="no_hp"
                               id="no_hp"
                               value="{{ old('no_hp') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('no_hp') border-red-500 @enderror"
                               placeholder="081234567890">
                        @error('no_hp')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            Email
                        </label>
                        <input type="email"
                               name="email"
                               id="email"
                               value="{{ old('email') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('email') border-red-500 @enderror"
                               placeholder="posyandu@example.com">
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="nama_ketua" class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Ketua Posyandu <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               name="nama_ketua"
                               id="nama_ketua"
                               value="{{ old('nama_ketua') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('nama_ketua') border-red-500 @enderror"
                               placeholder="Nama ketua posyandu">
                        @error('nama_ketua')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="no_hp_ketua" class="block text-sm font-medium text-gray-700 mb-2">
                            No. HP Ketua
                        </label>
                        <input type="tel"
                               name="no_hp_ketua"
                               id="no_hp_ketua"
                               value="{{ old('no_hp_ketua') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('no_hp_ketua') border-red-500 @enderror"
                               placeholder="081234567890">
                        @error('no_hp_ketua')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">
                            Deskripsi
                        </label>
                        <textarea name="deskripsi"
                                  id="deskripsi"
                                  rows="3"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('deskripsi') border-red-500 @enderror"
                                  placeholder="Deskripsi singkat tentang posyandu">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Tombol Submit -->
            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200 mt-8">
                <a href="{{ route('admin.posyandu.index') }}"
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
// Phone number formatting
document.getElementById('no_hp').addEventListener('input', function() {
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

document.getElementById('no_hp_ketua').addEventListener('input', function() {
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
