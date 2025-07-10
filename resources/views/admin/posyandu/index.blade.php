@extends('layouts.app')

@section('title', 'Data Posyandu')
@section('subtitle', 'Kelola data posyandu terdaftar')

@section('content')
<div class="space-y-6">
    <!-- Header dengan Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-hospital text-blue-600"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Posyandu</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $posyandus->count() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-user-nurse text-green-600"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Kader</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $kaders->count() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-baby text-purple-600"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Balita</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $balitas->count() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-calendar-alt text-orange-600"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Jadwal Aktif</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $jadwals->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Utama -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="p-6 border-b border-gray-200">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-4 sm:space-y-0">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Data Posyandu</h3>
                    <p class="text-sm text-gray-600 mt-1">Kelola semua data posyandu terdaftar</p>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('admin.posyandu.create') }}"
                       class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 transition-colors">
                        <i class="fas fa-plus mr-2"></i>
                        Tambah Posyandu
                    </a>
                </div>
            </div>
        </div>

        <!-- Search dan Filter -->
        <div class="p-6 border-b border-gray-200 bg-gray-50">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Cari Posyandu</label>
                    <div class="relative">
                        <input type="text"
                               id="search"
                               placeholder="Cari nama posyandu atau kelurahan..."
                               class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                    </div>
                </div>
                <div>
                    <label for="filter_kecamatan" class="block text-sm font-medium text-gray-700 mb-2">Filter Kecamatan</label>
                    <select id="filter_kecamatan" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Semua Kecamatan</option>
                        @foreach($posyandus->unique('kecamatan') as $posyandu)
                            <option value="{{ $posyandu->kecamatan }}">{{ $posyandu->kecamatan }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <!-- Tabel Data -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <div class="flex items-center">
                                <i class="fas fa-hospital mr-2"></i>
                                Posyandu
                            </div>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <div class="flex items-center">
                                <i class="fas fa-map-marker-alt mr-2"></i>
                                Lokasi
                            </div>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <div class="flex items-center">
                                <i class="fas fa-user mr-2"></i>
                                Ketua
                            </div>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <div class="flex items-center">
                                <i class="fas fa-phone mr-2"></i>
                                Kontak
                            </div>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <div class="flex items-center">
                                <i class="fas fa-chart-bar mr-2"></i>
                                Statistik
                            </div>
                        </th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Aksi
                        </th>
            </tr>
        </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($posyandus as $posyandu)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 w-10 h-10">
                                    <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-400 to-purple-400 flex items-center justify-center">
                                        <i class="fas fa-hospital text-white"></i>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $posyandu->nama_posyandu }}</div>
                                    <div class="text-sm text-gray-500">{{ $posyandu->kecamatan }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $posyandu->alamat }}</div>
                            <div class="text-sm text-gray-500">{{ $posyandu->kelurahan }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $posyandu->nama_ketua ?? '-' }}</div>
                            <div class="text-sm text-gray-500">{{ $posyandu->no_hp_ketua ?? '-' }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $posyandu->no_hp }}</div>
                            <div class="text-sm text-gray-500">{{ $posyandu->email ?? '-' }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex space-x-2">
                                <div class="text-center">
                                    <div class="text-xs text-gray-500">Kader</div>
                                    <div class="text-sm font-semibold text-blue-600">{{ $kaders->where('posyandu_id', $posyandu->id)->count() }}</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-xs text-gray-500">Balita</div>
                                    <div class="text-sm font-semibold text-green-600">{{ $balitas->where('posyandu_id', $posyandu->id)->count() }}</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-xs text-gray-500">Jadwal</div>
                                    <div class="text-sm font-semibold text-orange-600">{{ $jadwals->where('posyandu_id', $posyandu->id)->count() }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex items-center justify-end space-x-2">
                                <a href="{{ route('admin.posyandu.show', $posyandu->id) }}"
                                   class="text-blue-600 hover:text-blue-900 p-1 rounded">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.posyandu.edit', $posyandu->id) }}"
                                   class="text-green-600 hover:text-green-900 p-1 rounded">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.posyandu.destroy', $posyandu->id) }}" method="POST" class="inline"
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 p-1 rounded">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center">
                                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                    <i class="fas fa-hospital text-gray-400 text-2xl"></i>
                                </div>
                                <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada data posyandu</h3>
                                <p class="text-gray-500 mb-4">Mulai dengan menambahkan data posyandu pertama</p>
                                <a href="{{ route('admin.posyandu.create') }}"
                                   class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                    <i class="fas fa-plus mr-2"></i>
                                    Tambah Posyandu Pertama
                                </a>
                            </div>
                    </td>
                </tr>
                    @endforelse
        </tbody>
    </table>
        </div>

        <!-- Pagination -->
        @if($posyandus->hasPages())
        <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
            <div class="flex items-center justify-between">
                <div class="text-sm text-gray-700">
                    Menampilkan {{ $posyandus->firstItem() }} sampai {{ $posyandus->lastItem() }} dari {{ $posyandus->total() }} data
                </div>
                <div>
                    {{ $posyandus->links() }}
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
// Search functionality
document.getElementById('search').addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    const rows = document.querySelectorAll('tbody tr');

    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        if (text.includes(searchTerm)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});

// Filter functionality
document.getElementById('filter_kecamatan').addEventListener('change', function() {
    const filterValue = this.value;
    const rows = document.querySelectorAll('tbody tr');

    rows.forEach(row => {
        const kecamatanCell = row.querySelector('td:nth-child(1)');
        if (kecamatanCell) {
            const kecamatanText = kecamatanCell.textContent;
            if (!filterValue || kecamatanText.includes(filterValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        }
    });
});
</script>
@endpush
@endsection
