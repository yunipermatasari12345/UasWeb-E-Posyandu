<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Status Pendaftaran - e-Posyandu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-blue-50 to-purple-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md mx-auto py-10">
        <div class="bg-white rounded-2xl shadow-xl p-8 mb-8 border border-blue-100">
            <h1 class="text-2xl font-bold text-blue-700 mb-2 text-center"><i class="fas fa-clipboard-check mr-2"></i>Cek Status Pendaftaran</h1>
            <p class="text-gray-500 text-center mb-6">Masukkan <b>Nama Anak</b> dan <b>Tanggal Lahir</b> untuk melihat status validasi pendaftaran Anda.</p>
            <form action="{{ route('cek.anak') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Nama Anak</label>
                    <input type="text" name="nama_balita" class="w-full border border-blue-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none" required value="{{ old('nama_balita') }}">
                    @error('nama_balita')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
                </div>
                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="w-full border border-blue-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none" required value="{{ old('tanggal_lahir') }}">
                    @error('tanggal_lahir')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
                </div>
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg transition">Cek Status</button>
            </form>
        </div>
        @isset($pendaftaran)
            @if($pendaftaran)
                <div class="rounded-2xl shadow-xl p-8 mb-4 border text-center
                    @if($pendaftaran->status == 'disetujui') bg-green-50 border-green-200 @elseif($pendaftaran->status == 'pending') bg-yellow-50 border-yellow-200 @else bg-red-50 border-red-200 @endif">
                    <div class="mb-3">
                        @if($pendaftaran->status == 'disetujui')
                            <i class="fas fa-check-circle text-green-500 text-5xl"></i>
                        @elseif($pendaftaran->status == 'pending')
                            <i class="fas fa-hourglass-half text-yellow-500 text-5xl"></i>
                        @else
                            <i class="fas fa-times-circle text-red-500 text-5xl"></i>
                        @endif
                    </div>
                    <h2 class="text-xl font-bold mb-2">Status Pendaftaran</h2>
                    @if($pendaftaran->status == 'disetujui')
                        <div class="text-green-700 text-lg font-semibold mb-2">Pendaftaran Anda <b>Disetujui</b> oleh admin.</div>
                    @elseif($pendaftaran->status == 'pending')
                        <div class="text-yellow-700 text-lg font-semibold mb-2">Pendaftaran Anda <b>menunggu validasi</b> admin.</div>
                    @else
                        <div class="text-red-700 text-lg font-semibold mb-2">Pendaftaran Anda <b>ditolak</b> oleh admin.</div>
                    @endif
                    <div class="mt-3 text-gray-700">
                        <b>Nama Anak:</b> {{ $pendaftaran->nama_anak }}<br>
                        <b>Tanggal Lahir:</b> {{ $pendaftaran->tanggal_lahir->format('d/m/Y') }}
                    </div>
                </div>
            @else
                <div class="bg-red-100 text-red-800 px-4 py-4 rounded-2xl shadow text-center font-semibold">Data pendaftaran tidak ditemukan.</div>
            @endif
        @endisset
    </div>
</body>
</html>
