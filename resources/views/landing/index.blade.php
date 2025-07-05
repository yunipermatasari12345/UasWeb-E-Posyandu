<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posyandu Sejahtera - Sistem Informasi Posyandu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .hero-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .card-hover:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center">
                        <i class="fas fa-heartbeat text-white text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-gray-800">Posyandu Sejahtera</h1>
                        <p class="text-sm text-gray-600">Sistem Informasi Posyandu</p>
                    </div>
                </div>

                <nav class="hidden md:flex space-x-8">
                    <a href="{{ route('daftar.anak') }}" class="text-gray-700 hover:text-blue-600 font-medium">Pendaftaran Anak</a>
                    <a href="{{ route('cek.anak') }}" class="text-gray-700 hover:text-blue-600 font-medium">Cek Data Anak</a>
                    <a href="{{ route('berita') }}" class="text-gray-700 hover:text-blue-600 font-medium">Berita Kesehatan</a>
                    <a href="{{ route('dokumentasi') }}" class="text-gray-700 hover:text-blue-600 font-medium">Dokumentasi</a>
                    <a href="{{ route('kontak') }}" class="text-gray-700 hover:text-blue-600 font-medium">Hubungi Kami</a>
                    <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">Login</a>
                </nav>

                <!-- Mobile menu button -->
                <button class="md:hidden text-gray-700">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="home" class="hero-gradient text-white py-20">
        <div class="container mx-auto px-4 text-center">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">
                    Selamat Datang di Website Informasi Posyandu Sejahtera
                </h1>
                <p class="text-xl md:text-2xl mb-8 opacity-90">
                    Sebuah website yang menyajikan data secara lengkap dan faktual untuk meningkatkan kualitas kesehatan masyarakat
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('jadwal') }}" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                        <i class="fas fa-calendar-alt mr-2"></i>Lihat Jadwal
                    </a>
                    <a href="#tentang" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition">
                        <i class="fas fa-info-circle mr-2"></i>Tentang Kami
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="tentang" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">Tentang Kami</h2>
                <h3 class="text-2xl md:text-3xl font-semibold text-blue-600 mb-8">Posyandu Sejahtera</h3>
                <p class="text-lg text-gray-600 leading-relaxed mb-8">
                    Posyandu Sejahtera menyediakan layanan kesehatan yang lengkap, termasuk pemeriksaan rutin untuk ibu hamil dan balita,
                    program imunisasi, konsultasi gizi, penyuluhan kesehatan, serta pemantauan pertumbuhan balita.
                    Dengan komitmen pada kualitas pelayanan dan pencegahan penyakit, kami berupaya menciptakan generasi
                    yang lebih sehat dan berkualitas di masa depan.
                </p>

                <h4 class="text-xl font-semibold text-gray-800 mb-6">
                    Layanan, fasilitas, serta kelebihan Posyandu Sejahtera
                </h4>

                <div class="grid md:grid-cols-2 gap-8 mt-12">
                    <div class="bg-blue-50 p-6 rounded-lg">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-hospital text-blue-600 text-2xl mr-3"></i>
                            <h5 class="font-semibold text-gray-800">Fasilitas yang nyaman dan bersih</h5>
                        </div>
                        <p class="text-gray-600">Ruang pemeriksaan yang higienis dan peralatan medis yang terawat dengan baik.</p>
                    </div>

                    <div class="bg-green-50 p-6 rounded-lg">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-user-md text-green-600 text-2xl mr-3"></i>
                            <h5 class="font-semibold text-gray-800">Tenaga kesehatan yang sigap dan cekatan</h5>
                        </div>
                        <p class="text-gray-600">Tim medis yang berpengalaman dan siap melayani dengan profesional.</p>
                    </div>

                    <div class="bg-purple-50 p-6 rounded-lg">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-smile text-purple-600 text-2xl mr-3"></i>
                            <h5 class="font-semibold text-gray-800">Pelayanan yang ramah</h5>
                        </div>
                        <p class="text-gray-600">Memberikan pelayanan dengan senyuman dan keramahan kepada setiap pengunjung.</p>
                    </div>

                    <div class="bg-orange-50 p-6 rounded-lg">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-map-marker-alt text-orange-600 text-2xl mr-3"></i>
                            <h5 class="font-semibold text-gray-800">Terjangkau serta mudah</h5>
                        </div>
                        <p class="text-gray-600">Lokasi strategis dan mudah diakses oleh seluruh masyarakat.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-20 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Statistik Tahun 2025</h2>
                <h3 class="text-2xl font-semibold text-blue-600">Data Posyandu Sejahtera</h3>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                                <div class="bg-white p-6 rounded-lg shadow-lg text-center card-hover">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-baby text-blue-600 text-2xl"></i>
                    </div>
                    <div class="text-3xl font-bold text-blue-600 mb-2">{{ $stats['bayi'] }}</div>
                    <div class="text-gray-600 font-medium">Data Bayi</div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg text-center card-hover">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-child text-green-600 text-2xl"></i>
                    </div>
                    <div class="text-3xl font-bold text-green-600 mb-2">{{ $stats['balita'] }}</div>
                    <div class="text-gray-600 font-medium">Data Balita</div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg text-center card-hover">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-female text-purple-600 text-2xl"></i>
                    </div>
                    <div class="text-3xl font-bold text-purple-600 mb-2">{{ $stats['ibu_hamil'] }}</div>
                    <div class="text-gray-600 font-medium">Data Ibu Hamil</div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg text-center card-hover">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user text-orange-600 text-2xl"></i>
                    </div>
                    <div class="text-3xl font-bold text-orange-600 mb-2">{{ $stats['lansia'] }}</div>
                    <div class="text-gray-600 font-medium">Data Lansia</div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">FAQ's</h2>
                    <h3 class="text-2xl font-semibold text-blue-600">Pertanyaan yang sering diajukan</h3>
                </div>

                <div class="space-y-6">
                    <div class="bg-gray-50 rounded-lg p-6">
                        <h4 class="text-lg font-semibold text-gray-800 mb-3">
                            <i class="fas fa-question-circle text-blue-600 mr-2"></i>
                            Apa itu Sistem Informasi Posyandu?
                        </h4>
                        <p class="text-gray-600 leading-relaxed">
                            Sistem Informasi Posyandu adalah sebuah platform digital yang dirancang untuk membantu pengelolaan dan pemantauan kegiatan Posyandu.
                            Platform ini menyediakan alat untuk mencatat data kesehatan masyarakat, pelaporan, dan penentuan gizi untuk meningkatkan efisiensi
                            dan efektivitas layanan Posyandu.
                        </p>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-6">
                        <h4 class="text-lg font-semibold text-gray-800 mb-3">
                            <i class="fas fa-question-circle text-blue-600 mr-2"></i>
                            Layanan apa saja yang disediakan oleh Posyandu Sejahtera?
                        </h4>
                        <p class="text-gray-600 leading-relaxed">
                            Posyandu Sejahtera menyediakan beragam layanan kesehatan dasar, termasuk pemeriksaan kesehatan, imunisasi, konsultasi gizi,
                            serta penyuluhan tentang kesehatan dan pola hidup sehat bagi ibu dan anak.
                        </p>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-6">
                        <h4 class="text-lg font-semibold text-gray-800 mb-3">
                            <i class="fas fa-question-circle text-blue-600 mr-2"></i>
                            Bagaimana cara mendaftar menjadi anggota Posyandu Sejahtera?
                        </h4>
                        <p class="text-gray-600 leading-relaxed">
                            Untuk dapat menjadi anggota Posyandu Sejahtera, Anda dapat datang langsung ke Posyandu terdekat dengan membawa identitas diri
                            seperti KTP atau Kartu Keluarga. Pendaftaran dapat dilakukan secara gratis dan terbuka untuk seluruh masyarakat.
                        </p>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-6">
                        <h4 class="text-lg font-semibold text-gray-800 mb-3">
                            <i class="fas fa-question-circle text-blue-600 mr-2"></i>
                            Bagaimana cara menggunakan Sistem Informasi Posyandu?
                        </h4>
                        <p class="text-gray-600 leading-relaxed">
                            Untuk menggunakan Sistem Informasi Posyandu, pengguna harus memiliki akses dan login ke sistem.
                            Setelah login, pengguna dapat melihat data kesehatan, termasuk informasi tentang anak.
                        </p>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-6">
                        <h4 class="text-lg font-semibold text-gray-800 mb-3">
                            <i class="fas fa-question-circle text-blue-600 mr-2"></i>
                            Bisakah Sistem Informasi Posyandu diakses dari perangkat seluler?
                        </h4>
                        <p class="text-gray-600 leading-relaxed">
                            Ya, kami telah mengoptimalkan Sistem Informasi Posyandu agar dapat diakses dari berbagai perangkat,
                            termasuk smartphone, tablet maupun laptop.
                        </p>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-6">
                        <h4 class="text-lg font-semibold text-gray-800 mb-3">
                            <i class="fas fa-question-circle text-blue-600 mr-2"></i>
                            Apakah Sistem Informasi Posyandu memerlukan biaya untuk digunakan?
                        </h4>
                        <p class="text-gray-600 leading-relaxed">
                            Tidak, kami menyediakan Sistem Informasi Posyandu ini secara gratis untuk membantu meningkatkan kualitas pelayanan Posyandu
                            dan mendukung kesehatan masyarakat secara keseluruhan. Kami berkomitmen untuk menyediakan platform yang mudah digunakan
                            dan bermanfaat bagi semua pengguna.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <div class="flex items-center justify-center mb-6">
                    <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mr-3">
                        <i class="fas fa-heartbeat text-white text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold">Posyandu Sejahtera</h3>
                        <p class="text-gray-400 text-sm">Sistem Informasi Posyandu</p>
                    </div>
                </div>

                <div class="grid md:grid-cols-3 gap-8 mb-8">
                    <div>
                        <h4 class="font-semibold mb-4">Kontak</h4>
                        <div class="space-y-2 text-gray-400">
                            <p><i class="fas fa-map-marker-alt mr-2"></i>Jl. Posyandu No. 123</p>
                            <p><i class="fas fa-phone mr-2"></i>(021) 1234-5678</p>
                            <p><i class="fas fa-envelope mr-2"></i>info@posyandusejahtera.id</p>
                        </div>
                    </div>

                    <div>
                        <h4 class="font-semibold mb-4">Layanan</h4>
                        <div class="space-y-2 text-gray-400">
                            <p>Pemeriksaan Balita</p>
                            <p>Imunisasi</p>
                            <p>Konsultasi Gizi</p>
                            <p>Penyuluhan Kesehatan</p>
                        </div>
                    </div>

                    <div>
                        <h4 class="font-semibold mb-4">Jam Operasional</h4>
                        <div class="space-y-2 text-gray-400">
                            <p>Senin - Jumat: 08:00 - 16:00</p>
                            <p>Sabtu: 08:00 - 12:00</p>
                            <p>Minggu: Tutup</p>
                        </div>
                    </div>
                </div>

                <div class="border-t border-gray-700 pt-8">
                    <p class="text-gray-400">
                        Copyright © 2025 Posyandu Sejahtera. All Rights Reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Mobile Navigation -->
    <div class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 md:hidden z-50">
        <div class="flex justify-around py-2">
            <a href="#home" class="flex flex-col items-center p-2 text-blue-600">
                <i class="fas fa-home text-lg"></i>
                <span class="text-xs mt-1">Beranda</span>
            </a>
            <a href="#jadwal" class="flex flex-col items-center p-2 text-gray-600">
                <i class="fas fa-calendar text-lg"></i>
                <span class="text-xs mt-1">Jadwal</span>
            </a>
            <a href="#tentang" class="flex flex-col items-center p-2 text-gray-600">
                <i class="fas fa-info text-lg"></i>
                <span class="text-xs mt-1">Tentang</span>
            </a>
            <a href="{{ route('login') }}" class="flex flex-col items-center p-2 text-gray-600">
                <i class="fas fa-user text-lg"></i>
                <span class="text-xs mt-1">Login</span>
            </a>
        </div>
    </div>

    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>
