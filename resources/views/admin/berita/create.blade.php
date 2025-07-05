@extends('layouts.app')

@section('title', 'Tambah Berita')
@section('subtitle', 'Buat artikel berita baru')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Tambah Berita</h3>
                    <p class="text-sm text-gray-600 mt-1">Buat artikel berita baru untuk masyarakat</p>
                </div>
                <a href="{{ route('admin.berita.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
            </div>
        </div>

        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Form Utama -->
                <div class="lg:col-span-2 space-y-6">
                    <div>
                        <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">
                            Judul Berita <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               name="judul"
                               id="judul"
                               value="{{ old('judul') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('judul') border-red-500 @enderror"
                               placeholder="Masukkan judul berita yang menarik">
                        @error('judul')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">
                            Slug URL <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               name="slug"
                               id="slug"
                               value="{{ old('slug') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('slug') border-red-500 @enderror"
                               placeholder="judul-berita-tanpa-spasi">
                        @error('slug')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">
                            Kategori <span class="text-red-500">*</span>
                        </label>
                        <select name="kategori"
                                id="kategori"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('kategori') border-red-500 @enderror">
                            <option value="">Pilih kategori</option>
                            <option value="Kesehatan" {{ old('kategori') == 'Kesehatan' ? 'selected' : '' }}>Kesehatan</option>
                            <option value="Nutrisi" {{ old('kategori') == 'Nutrisi' ? 'selected' : '' }}>Nutrisi</option>
                            <option value="Imunisasi" {{ old('kategori') == 'Imunisasi' ? 'selected' : '' }}>Imunisasi</option>
                            <option value="Pertumbuhan" {{ old('kategori') == 'Pertumbuhan' ? 'selected' : '' }}>Pertumbuhan</option>
                            <option value="Penyuluhan" {{ old('kategori') == 'Penyuluhan' ? 'selected' : '' }}>Penyuluhan</option>
                            <option value="Berita" {{ old('kategori') == 'Berita' ? 'selected' : '' }}>Berita</option>
                            <option value="Tips" {{ old('kategori') == 'Tips' ? 'selected' : '' }}>Tips</option>
                        </select>
                        @error('kategori')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="ringkasan" class="block text-sm font-medium text-gray-700 mb-2">
                            Ringkasan <span class="text-red-500">*</span>
                        </label>
                        <textarea name="ringkasan"
                                  id="ringkasan"
                                  rows="3"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('ringkasan') border-red-500 @enderror"
                                  placeholder="Ringkasan singkat berita (akan ditampilkan di preview)">{{ old('ringkasan') }}</textarea>
                        @error('ringkasan')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="konten" class="block text-sm font-medium text-gray-700 mb-2">
                            Konten Berita <span class="text-red-500">*</span>
                        </label>
                        <textarea name="konten"
                                  id="konten"
                                  rows="15"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('konten') border-red-500 @enderror"
                                  placeholder="Tulis konten berita lengkap di sini...">{{ old('konten') }}</textarea>
                        @error('konten')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <div>
                        <h4 class="text-md font-medium text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-image text-purple-600 mr-2"></i>
                            Gambar Berita
                        </h4>
                    </div>

                    <div>
                        <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2">
                            Upload Gambar
                        </label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-gray-400 transition-colors">
                            <div class="space-y-1 text-center">
                                <i class="fas fa-cloud-upload-alt text-gray-400 text-3xl mb-4"></i>
                                <div class="flex text-sm text-gray-600">
                                    <label for="gambar" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                        <span>Upload file</span>
                                        <input id="gambar" name="gambar" type="file" class="sr-only" accept="image/*">
                                    </label>
                                    <p class="pl-1">atau drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF sampai 2MB</p>
                            </div>
                        </div>
                        @error('gambar')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <h4 class="text-md font-medium text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-cog text-blue-600 mr-2"></i>
                            Pengaturan
                        </h4>
                    </div>

                    <div>
                        <label for="penulis" class="block text-sm font-medium text-gray-700 mb-2">
                            Penulis <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               name="penulis"
                               id="penulis"
                               value="{{ old('penulis') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('penulis') border-red-500 @enderror"
                               placeholder="Nama penulis">
                        @error('penulis')
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
                            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                        </select>
                        @error('status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="tags" class="block text-sm font-medium text-gray-700 mb-2">
                            Tags
                        </label>
                        <input type="text"
                               name="tags"
                               id="tags"
                               value="{{ old('tags') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('tags') border-red-500 @enderror"
                               placeholder="tag1, tag2, tag3 (pisahkan dengan koma)">
                        @error('tags')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-2">
                            Meta Description
                        </label>
                        <textarea name="meta_description"
                                  id="meta_description"
                                  rows="3"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('meta_description') border-red-500 @enderror"
                                  placeholder="Deskripsi untuk SEO">{{ old('meta_description') }}</textarea>
                        @error('meta_description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Preview Card -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h5 class="text-sm font-medium text-gray-800 mb-3">Preview</h5>
                        <div class="bg-white p-3 rounded border">
                            <div class="text-xs text-gray-500 mb-1">Judul</div>
                            <div class="text-sm font-medium text-gray-900 mb-3" id="preview-judul">Judul berita akan muncul di sini</div>

                            <div class="text-xs text-gray-500 mb-1">Ringkasan</div>
                            <div class="text-sm text-gray-600 mb-3" id="preview-ringkasan">Ringkasan berita akan muncul di sini</div>

                            <div class="text-xs text-gray-500 mb-1">Kategori</div>
                            <div class="text-sm text-blue-600" id="preview-kategori">Kategori akan muncul di sini</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tombol Submit -->
            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200 mt-8">
                <a href="{{ route('admin.berita.index') }}"
                   class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                    Batal
                </a>
                <button type="submit"
                        class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 transition-colors">
                    <i class="fas fa-save mr-2"></i>
                    Simpan Berita
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
// Auto-generate slug from judul
document.getElementById('judul').addEventListener('input', function() {
    const judul = this.value;
    const slug = judul.toLowerCase()
        .replace(/[^a-z0-9 -]/g, '')
        .replace(/\s+/g, '-')
        .replace(/-+/g, '-')
        .trim('-');
    document.getElementById('slug').value = slug;
});

// Live preview
document.getElementById('judul').addEventListener('input', function() {
    document.getElementById('preview-judul').textContent = this.value || 'Judul berita akan muncul di sini';
});

document.getElementById('ringkasan').addEventListener('input', function() {
    document.getElementById('preview-ringkasan').textContent = this.value || 'Ringkasan berita akan muncul di sini';
});

document.getElementById('kategori').addEventListener('change', function() {
    document.getElementById('preview-kategori').textContent = this.value || 'Kategori akan muncul di sini';
});

// File upload preview
document.getElementById('gambar').addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            // You can add image preview here if needed
            console.log('File selected:', file.name);
        };
        reader.readAsDataURL(file);
    }
});

// Set default values
document.getElementById('penulis').value = '{{ auth()->user()->name ?? "Admin" }}';
document.getElementById('status').value = 'draft';
</script>
@endpush
@endsection
