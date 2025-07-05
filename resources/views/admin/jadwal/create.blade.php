@extends('layouts.app')

@section('title', 'Tambah Jadwal Posyandu')
@section('subtitle', 'Buat jadwal kegiatan posyandu baru')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Tambah Jadwal Posyandu</h3>
                    <p class="text-sm text-gray-600 mt-1">Buat jadwal kegiatan posyandu baru</p>
                </div>
                <a href="{{ route('admin.jadwal.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
            </div>
        </div>

        <form action="{{ route('admin.jadwal.store') }}" method="POST" class="p-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Informasi Jadwal -->
                <div class="space-y-6">
                    <div>
                        <h4 class="text-md font-medium text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-calendar-alt text-orange-600 mr-2"></i>
                            Informasi Jadwal
                        </h4>
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
                        <label for="kegiatan" class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Kegiatan <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               name="kegiatan"
                               id="kegiatan"
                               value="{{ old('kegiatan') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('kegiatan') border-red-500 @enderror"
                               placeholder="Contoh: Posyandu Balita, Imunisasi, dll">
                        @error('kegiatan')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="jenis_kegiatan" class="block text-sm font-medium text-gray-700 mb-2">
                            Jenis Kegiatan <span class="text-red-500">*</span>
                        </label>
                        <select name="jenis_kegiatan"
                                id="jenis_kegiatan"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('jenis_kegiatan') border-red-500 @enderror">
                            <option value="">Pilih jenis kegiatan</option>
                            <option value="Posyandu Balita" {{ old('jenis_kegiatan') == 'Posyandu Balita' ? 'selected' : '' }}>Posyandu Balita</option>
                            <option value="Imunisasi" {{ old('jenis_kegiatan') == 'Imunisasi' ? 'selected' : '' }}>Imunisasi</option>
                            <option value="Pemeriksaan Kesehatan" {{ old('jenis_kegiatan') == 'Pemeriksaan Kesehatan' ? 'selected' : '' }}>Pemeriksaan Kesehatan</option>
                            <option value="Penyuluhan" {{ old('jenis_kegiatan') == 'Penyuluhan' ? 'selected' : '' }}>Penyuluhan</option>
                            <option value="Pemberian Vitamin" {{ old('jenis_kegiatan') == 'Pemberian Vitamin' ? 'selected' : '' }}>Pemberian Vitamin</option>
                            <option value="Lainnya" {{ old('jenis_kegiatan') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        @error('jenis_kegiatan')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-2">
                            Tanggal <span class="text-red-500">*</span>
                        </label>
                        <input type="date"
                               name="tanggal"
                               id="tanggal"
                               value="{{ old('tanggal') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('tanggal') border-red-500 @enderror">
                        @error('tanggal')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="jam" class="block text-sm font-medium text-gray-700 mb-2">
                            Jam <span class="text-red-500">*</span>
                        </label>
                        <input type="time"
                               name="jam"
                               id="jam"
                               value="{{ old('jam') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('jam') border-red-500 @enderror">
                        @error('jam')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Informasi Detail -->
                <div class="space-y-6">
                    <div>
                        <h4 class="text-md font-medium text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-info-circle text-blue-600 mr-2"></i>
                            Informasi Detail
                        </h4>
                    </div>

                    <div>
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">
                            Deskripsi Kegiatan
                        </label>
                        <textarea name="deskripsi"
                                  id="deskripsi"
                                  rows="4"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('deskripsi') border-red-500 @enderror"
                                  placeholder="Jelaskan detail kegiatan yang akan dilakukan">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="target_peserta" class="block text-sm font-medium text-gray-700 mb-2">
                            Target Peserta
                        </label>
                        <input type="text"
                               name="target_peserta"
                               id="target_peserta"
                               value="{{ old('target_peserta') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('target_peserta') border-red-500 @enderror"
                               placeholder="Contoh: Balita 0-5 tahun, Ibu hamil, dll">
                        @error('target_peserta')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="penanggung_jawab" class="block text-sm font-medium text-gray-700 mb-2">
                            Penanggung Jawab
                        </label>
                        <input type="text"
                               name="penanggung_jawab"
                               id="penanggung_jawab"
                               value="{{ old('penanggung_jawab') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('penanggung_jawab') border-red-500 @enderror"
                               placeholder="Nama penanggung jawab kegiatan">
                        @error('penanggung_jawab')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                            Status <span class="text-red-500">*</span>
                        </label>
                        <select name="status"
                                id="status"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('status') border-red-500 @enderror">
                            <option value="">Pilih status</option>
                            <option value="Direncanakan" {{ old('status') == 'Direncanakan' ? 'selected' : '' }}>Direncanakan</option>
                            <option value="Berlangsung" {{ old('status') == 'Berlangsung' ? 'selected' : '' }}>Berlangsung</option>
                            <option value="Selesai" {{ old('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="Dibatalkan" {{ old('status') == 'Dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                        </select>
                        @error('status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="catatan" class="block text-sm font-medium text-gray-700 mb-2">
                            Catatan Tambahan
                        </label>
                        <textarea name="catatan"
                                  id="catatan"
                                  rows="3"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('catatan') border-red-500 @enderror"
                                  placeholder="Catatan tambahan jika diperlukan">{{ old('catatan') }}</textarea>
                        @error('catatan')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Tombol Submit -->
            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200 mt-8">
                <a href="{{ route('admin.jadwal.index') }}"
                   class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                    Batal
                </a>
                <button type="submit"
                        class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 transition-colors">
                    <i class="fas fa-save mr-2"></i>
                    Simpan Jadwal
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
// Set default tanggal to today
document.getElementById('tanggal').value = new Date().toISOString().split('T')[0];

// Set default jam to 08:00
document.getElementById('jam').value = '08:00';

// Auto-fill kegiatan based on jenis_kegiatan
document.getElementById('jenis_kegiatan').addEventListener('change', function() {
    const kegiatanField = document.getElementById('kegiatan');
    if (this.value && !kegiatanField.value) {
        kegiatanField.value = this.value;
    }
});
</script>
@endpush
@endsection
