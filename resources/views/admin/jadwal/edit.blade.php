@extends('layouts.app')

@section('title', 'Edit Jadwal')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Edit Jadwal</h1>
        <nav class="text-sm text-gray-600">
            <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-600">Dashboard</a>
            <span class="mx-2">/</span>
            <a href="{{ route('admin.jadwal.index') }}" class="hover:text-blue-600">Jadwal</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800">Edit</span>
        </nav>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="{{ route('admin.jadwal.update', $jadwal->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Informasi Jadwal -->
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Informasi Jadwal</h2>

                    <div class="mb-4">
                        <label for="nama_kegiatan" class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Kegiatan <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               id="nama_kegiatan"
                               name="nama_kegiatan"
                               value="{{ old('nama_kegiatan', $jadwal->nama_kegiatan) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               required>
                        @error('nama_kegiatan')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-2">
                            Tanggal <span class="text-red-500">*</span>
                        </label>
                        <input type="date"
                               id="tanggal"
                               name="tanggal"
                               value="{{ old('tanggal', $jadwal->tanggal->format('Y-m-d')) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               required>
                        @error('tanggal')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="waktu_mulai" class="block text-sm font-medium text-gray-700 mb-2">
                            Waktu Mulai <span class="text-red-500">*</span>
                        </label>
                        <input type="time"
                               id="waktu_mulai"
                               name="waktu_mulai"
                               value="{{ old('waktu_mulai', $jadwal->waktu_mulai) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               required>
                        @error('waktu_mulai')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="waktu_selesai" class="block text-sm font-medium text-gray-700 mb-2">
                            Waktu Selesai <span class="text-red-500">*</span>
                        </label>
                        <input type="time"
                               id="waktu_selesai"
                               name="waktu_selesai"
                               value="{{ old('waktu_selesai', $jadwal->waktu_selesai) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               required>
                        @error('waktu_selesai')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Informasi Tambahan -->
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Informasi Tambahan</h2>

                    <div class="mb-4">
                        <label for="jenis_kegiatan" class="block text-sm font-medium text-gray-700 mb-2">
                            Jenis Kegiatan <span class="text-red-500">*</span>
                        </label>
                        <select id="jenis_kegiatan"
                                name="jenis_kegiatan"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                required>
                            <option value="">Pilih Jenis Kegiatan</option>
                            <option value="Pemeriksaan Balita" {{ old('jenis_kegiatan', $jadwal->jenis_kegiatan) == 'Pemeriksaan Balita' ? 'selected' : '' }}>Pemeriksaan Balita</option>
                            <option value="Imunisasi" {{ old('jenis_kegiatan', $jadwal->jenis_kegiatan) == 'Imunisasi' ? 'selected' : '' }}>Imunisasi</option>
                            <option value="Penyuluhan" {{ old('jenis_kegiatan', $jadwal->jenis_kegiatan) == 'Penyuluhan' ? 'selected' : '' }}>Penyuluhan</option>
                            <option value="Posyandu Lansia" {{ old('jenis_kegiatan', $jadwal->jenis_kegiatan) == 'Posyandu Lansia' ? 'selected' : '' }}>Posyandu Lansia</option>
                            <option value="Kegiatan Lainnya" {{ old('jenis_kegiatan', $jadwal->jenis_kegiatan) == 'Kegiatan Lainnya' ? 'selected' : '' }}>Kegiatan Lainnya</option>
                        </select>
                        @error('jenis_kegiatan')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="lokasi" class="block text-sm font-medium text-gray-700 mb-2">
                            Lokasi <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               id="lokasi"
                               name="lokasi"
                               value="{{ old('lokasi', $jadwal->lokasi) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               required>
                        @error('lokasi')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                            Status <span class="text-red-500">*</span>
                        </label>
                        <select id="status"
                                name="status"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                required>
                            <option value="">Pilih Status</option>
                            <option value="aktif" {{ old('status', $jadwal->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="nonaktif" {{ old('status', $jadwal->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="peserta_target" class="block text-sm font-medium text-gray-700 mb-2">
                            Peserta Target
                        </label>
                        <input type="text"
                               id="peserta_target"
                               name="peserta_target"
                               value="{{ old('peserta_target', $jadwal->peserta_target) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               placeholder="Contoh: Balita 0-5 tahun">
                        @error('peserta_target')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="posyandu_id" class="block text-sm font-medium text-gray-700 mb-2">
                            Posyandu <span class="text-red-500">*</span>
                        </label>
                        <select id="posyandu_id"
                                name="posyandu_id"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                required>
                            <option value="">Pilih Posyandu</option>
                            @foreach($posyandus as $posyandu)
                                <option value="{{ $posyandu->id }}" {{ old('posyandu_id', $jadwal->posyandu_id) == $posyandu->id ? 'selected' : '' }}>
                                    {{ $posyandu->nama_posyandu }}
                                </option>
                            @endforeach
                        </select>
                        @error('posyandu_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Keterangan -->
            <div class="mt-6">
                <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-2">
                    Keterangan
                </label>
                <textarea id="keterangan"
                          name="keterangan"
                          rows="4"
                          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                          placeholder="Keterangan tambahan tentang jadwal...">{{ old('keterangan', $jadwal->keterangan) }}</textarea>
                @error('keterangan')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tombol Aksi -->
            <div class="mt-8 flex flex-wrap gap-3">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition duration-200">
                    <i class="fas fa-save mr-2"></i>Update Jadwal
                </button>
                <a href="{{ route('admin.jadwal.show', $jadwal->id) }}"
                   class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg transition duration-200">
                    <i class="fas fa-times mr-2"></i>Batal
                </a>
                <a href="{{ route('admin.jadwal.index') }}"
                   class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg transition duration-200">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
