<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Kami - Posyandu Sejahtera</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center">
                    <i class="fas fa-heartbeat text-white text-xl"></i>
                </div>
                <h1 class="text-xl font-bold text-gray-800">Posyandu Sejahtera</h1>
            </div>
            <nav class="hidden md:flex space-x-8">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600 font-medium">Beranda</a>
                <a href="{{ route('berita') }}" class="text-gray-700 hover:text-blue-600 font-medium">Berita Kesehatan</a>
                <a href="{{ route('dokumentasi') }}" class="text-gray-700 hover:text-blue-600 font-medium">Dokumentasi</a>
                <a href="{{ route('kontak') }}" class="text-blue-600 font-bold">Hubungi Kami</a>
                <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">Login</a>
            </nav>
        </div>
    </header>
    <main class="container mx-auto px-4 py-16">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Hubungi Kami</h2>
        <div class="bg-white rounded-lg shadow p-8 text-gray-600">
            <p>Silakan hubungi kami melalui email: <span class="font-semibold">info@posyandusejahtera.com</span> atau telepon: <span class="font-semibold">(021) 1234-5678</span></p>
        </div>
    </main>
</body>
</html>
