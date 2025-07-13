@extends('layouts.user')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Detail Pendaftaran</h1>
                <p class="text-gray-600">Informasi lengkap pendaftaran Anda</p>
            </div>
            <a href="{{ route('user.status-pendaftaran') }}" class="text-blue-600 hover:text-blue-800">
                ← Kembali ke Status
            </a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold text-gray-800">Informasi Pendaftaran</h2>
                <div>
                    @if($pendaftaran->status == 'pending')
                        <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                            Menunggu Validasi
                        </span>
                    @elseif($pendaftaran->status == 'disetujui')
                        <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Disetujui ✅
                        </span>
                    @else
                        <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                            Ditolak ❌
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="px-6 py-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Informasi Anak -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Anak</h3>
                    <div class="space-y-3">
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

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Jenis Pendaftaran</label>
                            <p class="mt-1 text-sm text-gray-900">{{ ucfirst(str_replace('_', ' ', $pendaftaran->jenis_pendaftaran)) }}</p>
                        </div>

                        @if($pendaftaran->jenis_pendaftaran == 'ibu_hamil' && $pendaftaran->usia_kehamilan)
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Usia Kehamilan</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $pendaftaran->usia_kehamilan }} minggu</p>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Informasi Orang Tua -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Orang Tua</h3>
                    <div class="space-y-3">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama Ibu</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $pendaftaran->nama_ibu }}</p>
                        </div>

                        @if($pendaftaran->nik_ibu)
                        <div>
                            <label class="block text-sm font-medium text-gray-700">NIK Ibu</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $pendaftaran->nik_ibu }}</p>
                        </div>
                        @endif

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
            </div>

            @if($pendaftaran->catatan)
            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700">Catatan</label>
                <p class="mt-1 text-sm text-gray-900">{{ $pendaftaran->catatan }}</p>
            </div>
            @endif

            <!-- Informasi Validasi -->
            @if($pendaftaran->status != 'pending')
            <div class="mt-6 pt-6 border-t border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Validasi</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tanggal Validasi</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $pendaftaran->tanggal_validasi ? $pendaftaran->tanggal_validasi->format('d/m/Y H:i') : '-' }}</p>
                    </div>

                    @if($pendaftaran->catatan_admin)
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Catatan Admin</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $pendaftaran->catatan_admin }}</p>
                    </div>
                    @endif
                </div>
            </div>
            @endif

            <!-- Timeline -->
            <div class="mt-6 pt-6 border-t border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Timeline</h3>
                <div class="space-y-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-900">Pendaftaran Diajukan</p>
                            <p class="text-sm text-gray-500">{{ $pendaftaran->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>

                    @if($pendaftaran->status != 'pending')
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 {{ $pendaftaran->status == 'disetujui' ? 'bg-green-500' : 'bg-red-500' }} rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    @if($pendaftaran->status == 'disetujui')
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    @else
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                    @endif
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-900">
                                {{ $pendaftaran->status == 'disetujui' ? 'Pendaftaran Disetujui' : 'Pendaftaran Ditolak' }}
                            </p>
                            <p class="text-sm text-gray-500">{{ $pendaftaran->tanggal_validasi ? $pendaftaran->tanggal_validasi->format('d/m/Y H:i') : '-' }}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
