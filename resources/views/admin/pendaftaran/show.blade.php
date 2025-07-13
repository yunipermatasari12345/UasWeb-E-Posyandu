@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="mb-8">
            <a href="{{ route('admin.pendaftaran.index') }}" class="text-blue-600 hover:text-blue-800 mb-4 inline-block">
                ← Kembali ke Daftar Pendaftaran
            </a>
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Detail Pendaftaran</h1>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Informasi Pendaftaran -->
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Informasi Pendaftaran</h2>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Status</label>
                            <div class="mt-1">
                                @if($pendaftaran->status == 'pending')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        Menunggu Validasi
                                    </span>
                                @elseif($pendaftaran->status == 'disetujui')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Disetujui
                                    </span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        Ditolak
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Jenis Pendaftaran</label>
                            <p class="mt-1 text-sm text-gray-900">{{ ucfirst(str_replace('_', ' ', $pendaftaran->jenis_pendaftaran)) }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tanggal Pendaftaran</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $pendaftaran->created_at->format('d/m/Y H:i') }}</p>
                        </div>

                        @if($pendaftaran->tanggal_validasi)
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tanggal Validasi</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $pendaftaran->tanggal_validasi->format('d/m/Y H:i') }}</p>
                        </div>
                        @endif

                        @if($pendaftaran->catatan_admin)
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Catatan Admin</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $pendaftaran->catatan_admin }}</p>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Informasi Anak -->
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Informasi Anak</h2>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama Anak</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $pendaftaran->nama_anak }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $pendaftaran->tanggal_lahir->format('d/m/Y') }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $pendaftaran->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                        </div>

                        @if($pendaftaran->jenis_pendaftaran == 'ibu_hamil' && $pendaftaran->usia_kehamilan)
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Usia Kehamilan</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $pendaftaran->usia_kehamilan }} minggu</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Informasi Ibu -->
            <div class="mt-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Informasi Ibu</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Ibu</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $pendaftaran->nama_ibu }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">NIK Ibu</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $pendaftaran->nik_ibu ?: '-' }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">No. HP</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $pendaftaran->no_hp }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Alamat</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $pendaftaran->alamat }}</p>
                    </div>
                </div>
            </div>

            @if($pendaftaran->catatan)
            <div class="mt-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Catatan Tambahan</h2>
                <p class="text-sm text-gray-900">{{ $pendaftaran->catatan }}</p>
            </div>
            @endif

            <!-- Aksi -->
            @if($pendaftaran->status == 'pending')
            <div class="mt-8 pt-6 border-t border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Validasi Pendaftaran</h2>

                <div class="flex space-x-4">
                    <form action="{{ route('admin.pendaftaran.approve', $pendaftaran->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                            Setujui Pendaftaran
                        </button>
                    </form>

                    <button onclick="showRejectModal()" class="bg-red-600 text-white px-6 py-2 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                        Tolak Pendaftaran
                    </button>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Modal Reject -->
<div id="rejectModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white rounded-lg p-6 w-full max-w-md">
            <h3 class="text-lg font-semibold mb-4">Tolak Pendaftaran</h3>
            <form action="{{ route('admin.pendaftaran.reject', $pendaftaran->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Alasan Penolakan *
                    </label>
                    <textarea name="catatan_admin" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="hideRejectModal()" class="px-4 py-2 text-gray-600 hover:text-gray-800">
                        Batal
                    </button>
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                        Tolak
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function showRejectModal() {
    document.getElementById('rejectModal').classList.remove('hidden');
}

function hideRejectModal() {
    document.getElementById('rejectModal').classList.add('hidden');
}
</script>
@endsection
