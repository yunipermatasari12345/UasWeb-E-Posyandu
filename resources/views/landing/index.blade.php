@extends('layouts.public')

@section('title', 'e-Posyandu - Sistem Informasi Posyandu Terpadu')

@section('content')
<!-- Hero Section Soft & Modern -->
<section class="py-5" style="background: linear-gradient(120deg, #e0f2fe 0%, #ede9fe 100%); border-radius: 22px; margin-bottom: 2.5rem; box-shadow: 0 4px 24px rgba(37,99,235,0.06);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <h1 class="fw-bold mb-2" style="font-size:2.5rem; color:#1e293b; letter-spacing:-1px;">
                    Selamat Datang di <span style="color:#6366f1;">e-Posyandu</span>
                </h1>
                <p class="mb-4" style="font-size:1.15rem; color:#475569; max-width: 520px;">
                    Sistem Informasi Posyandu Terpadu untuk meningkatkan kualitas kesehatan ibu dan anak di Indonesia
                </p>
                <div class="d-flex flex-wrap gap-2">
                    <a href="#layanan" class="btn px-4 py-2" style="background:#f1f5f9; color:#2563eb; border-radius: 12px; font-weight:500; border:1.5px solid #c7d2fe;">
                        <i class="fas fa-heartbeat me-1"></i> Layanan Kami
                    </a>
                    <a href="{{ route('statistik') }}" class="btn px-4 py-2" style="background:#6366f1; color:#fff; border-radius: 12px; font-weight:500; border:none;">
                        <i class="fas fa-chart-bar me-1"></i> Statistik
                    </a>
                </div>
            </div>
            <div class="col-lg-5 text-center mt-4 mt-lg-0">
                <span style="display:inline-block; background:#f3f4f6; border-radius:50%; padding:22px 24px; box-shadow:0 2px 12px #c7d2fe44;">
                    <i class="fas fa-users" style="font-size:2.7rem; color:#a5b4fc;"></i>
                </span>
            </div>
        </div>
    </div>
</section>

<!-- Quick Stats Section -->
<section class="mb-5">
    <div class="row g-4">
        <div class="col-md-3 col-6">
            <div class="card statistik-card h-100 text-center border-0">
                <div class="card-body">
                    <div class="mb-3">
                        <i class="fas fa-baby fa-2x text-primary"></i>
                    </div>
                    <h3 class="text-3xl fw-bold text-primary mb-1">{{ $stats['bayi'] ?? 0 }}</h3>
                    <p class="text-lg text-muted mb-0">Bayi Terdaftar</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card statistik-card h-100 text-center border-0">
                <div class="card-body">
                    <div class="mb-3">
                        <i class="fas fa-child fa-2x text-success"></i>
                    </div>
                    <h3 class="text-3xl fw-bold text-success mb-1">{{ $stats['balita'] ?? 0 }}</h3>
                    <p class="text-lg text-muted mb-0">Balita Terdaftar</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card statistik-card h-100 text-center border-0">
                <div class="card-body">
                    <div class="mb-3">
                        <i class="fas fa-female fa-2x text-info"></i>
                    </div>
                    <h3 class="text-3xl fw-bold text-info mb-1">{{ $stats['ibu_hamil'] ?? 0 }}</h3>
                    <p class="text-lg text-muted mb-0">Ibu Hamil</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card statistik-card h-100 text-center border-0">
                <div class="card-body">
                    <div class="mb-3">
                        <i class="fas fa-user fa-2x text-warning"></i>
                    </div>
                    <h3 class="text-3xl fw-bold text-warning mb-1">{{ $stats['lansia'] ?? 0 }}</h3>
                    <p class="text-lg text-muted mb-0">Lansia Terdaftar</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="layanan" class="mb-5">
    <div class="text-center mb-5">
        <h2 class="display-5 fw-bold text-dark mb-3">Layanan Kami</h2>
        <p class="lead text-muted">Berbagai layanan kesehatan yang kami sediakan untuk masyarakat</p>
    </div>

    <div class="row g-4">
        <div class="col-lg-4 col-md-6">
            <div class="card h-100 border-0 shadow-sm service-card">
                <div class="card-body text-center p-4">
                    <div class="service-icon mb-3">
                        <i class="fas fa-baby text-primary" style="font-size: 3rem;"></i>
                    </div>
                    <h4 class="card-title fw-bold">Pemantauan Tumbuh Kembang</h4>
                    <p class="card-text text-muted">
                        Pemantauan rutin tumbuh kembang bayi dan balita dengan pengukuran berat badan, tinggi badan, dan lingkar kepala
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card h-100 border-0 shadow-sm service-card">
                <div class="card-body text-center p-4">
                    <div class="service-icon mb-3">
                        <i class="fas fa-syringe text-success" style="font-size: 3rem;"></i>
                    </div>
                    <h4 class="card-title fw-bold">Imunisasi</h4>
                    <p class="card-text text-muted">
                        Layanan imunisasi lengkap untuk bayi dan balita sesuai jadwal yang ditentukan oleh Kementerian Kesehatan
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card h-100 border-0 shadow-sm service-card">
                <div class="card-body text-center p-4">
                    <div class="service-icon mb-3">
                        <i class="fas fa-apple-alt text-info" style="font-size: 3rem;"></i>
                    </div>
                    <h4 class="card-title fw-bold">Konsultasi Gizi</h4>
                    <p class="card-text text-muted">
                        Konsultasi gizi untuk ibu hamil, bayi, dan balita untuk memastikan asupan nutrisi yang optimal
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card h-100 border-0 shadow-sm service-card">
                <div class="card-body text-center p-4">
                    <div class="service-icon mb-3">
                        <i class="fas fa-female text-warning" style="font-size: 3rem;"></i>
                    </div>
                    <h4 class="card-title fw-bold">Pemeriksaan Ibu Hamil</h4>
                    <p class="card-text text-muted">
                        Pemeriksaan rutin untuk ibu hamil termasuk pemeriksaan tekanan darah, berat badan, dan kondisi janin
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card h-100 border-0 shadow-sm service-card">
                <div class="card-body text-center p-4">
                    <div class="service-icon mb-3">
                        <i class="fas fa-graduation-cap text-danger" style="font-size: 3rem;"></i>
                    </div>
                    <h4 class="card-title fw-bold">Penyuluhan Kesehatan</h4>
                    <p class="card-text text-muted">
                        Penyuluhan tentang kesehatan ibu dan anak, pola hidup sehat, dan pencegahan penyakit
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card h-100 border-0 shadow-sm service-card">
                <div class="card-body text-center p-4">
                    <div class="service-icon mb-3">
                        <i class="fas fa-user-md text-secondary" style="font-size: 3rem;"></i>
                    </div>
                    <h4 class="card-title fw-bold">Pelayanan Lansia</h4>
                    <p class="card-text text-muted">
                        Pemeriksaan kesehatan rutin untuk lansia termasuk pemeriksaan tekanan darah dan gula darah
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="mb-5">
    <div class="row align-items-center">
        <div class="col-lg-6">
            <h2 class="display-5 fw-bold text-dark mb-4">Tentang e-Posyandu</h2>
            <p class="lead text-muted mb-4">
                e-Posyandu adalah sistem informasi terpadu yang dirancang untuk meningkatkan efisiensi dan efektivitas pelayanan Posyandu di seluruh Indonesia.
            </p>
            <div class="row g-3">
                <div class="col-6">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle text-success me-2"></i>
                        <span>Data Terpusat</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle text-success me-2"></i>
                        <span>Real-time Monitoring</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle text-success me-2"></i>
                        <span>Pelaporan Otomatis</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle text-success me-2"></i>
                        <span>Analisis Data</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card border-0 shadow">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-3">Visi Kami</h4>
                    <p class="text-muted mb-4">
                        "Mewujudkan masyarakat Indonesia yang sehat, cerdas, dan produktif melalui pelayanan Posyandu yang berkualitas dan terpadu."
                    </p>
                    <h4 class="fw-bold mb-3">Misi Kami</h4>
                    <ul class="text-muted">
                        <li>Meningkatkan akses dan kualitas pelayanan kesehatan</li>
                        <li>Mengoptimalkan pemanfaatan teknologi informasi</li>
                        <li>Membangun kemandirian masyarakat dalam kesehatan</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- News & Updates Section -->
<section class="mb-5">
    <div class="text-center mb-5">
        <h2 class="display-5 fw-bold text-dark mb-3">Berita & Informasi Terkini</h2>
        <p class="lead text-muted">Update terbaru seputar kesehatan ibu dan anak</p>
    </div>

    <div class="row g-4">
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-newspaper text-primary me-2"></i>
                        <small class="text-muted">15 Januari 2025</small>
                    </div>
                    <h5 class="card-title fw-bold">Pentingnya Imunisasi Dasar Lengkap</h5>
                    <p class="card-text text-muted">
                        Imunisasi dasar lengkap sangat penting untuk melindungi anak dari berbagai penyakit berbahaya...
                    </p>
                    <a href="#" class="btn btn-outline-primary btn-sm">Baca Selengkapnya</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-newspaper text-primary me-2"></i>
                        <small class="text-muted">12 Januari 2025</small>
                    </div>
                    <h5 class="card-title fw-bold">Tips Nutrisi Seimbang untuk Balita</h5>
                    <p class="card-text text-muted">
                        Nutrisi yang seimbang sangat penting untuk mendukung tumbuh kembang optimal balita...
                    </p>
                    <a href="#" class="btn btn-outline-primary btn-sm">Baca Selengkapnya</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-newspaper text-primary me-2"></i>
                        <small class="text-muted">10 Januari 2025</small>
                    </div>
                    <h5 class="card-title fw-bold">Jadwal Posyandu Bulan Januari 2025</h5>
                    <p class="card-text text-muted">
                        Berikut adalah jadwal kegiatan Posyandu untuk bulan Januari 2025 yang dapat diikuti...
                    </p>
                    <a href="{{ route('jadwal') }}" class="btn btn-outline-primary btn-sm">Lihat Jadwal</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact & Location Section -->
<section class="mb-5">
    <div class="row">
        <div class="col-lg-6">
            <h2 class="display-5 fw-bold text-dark mb-4">Hubungi Kami</h2>
            <div class="row g-4">
                <div class="col-12">
                    <div class="d-flex align-items-center">
                        <div class="contact-icon me-3">
                            <i class="fas fa-map-marker-alt text-primary" style="font-size: 1.5rem;"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">Alamat</h5>
                            <p class="text-muted mb-0">Jl. Sehat No. 123, Kec. Bahagia, Kota Ceria</p>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="d-flex align-items-center">
                        <div class="contact-icon me-3">
                            <i class="fas fa-phone text-primary" style="font-size: 1.5rem;"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">Telepon</h5>
                            <p class="text-muted mb-0">0812-3456-7890</p>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="d-flex align-items-center">
                        <div class="contact-icon me-3">
                            <i class="fas fa-envelope text-primary" style="font-size: 1.5rem;"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">Email</h5>
                            <p class="text-muted mb-0">info@posyandu.com</p>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="d-flex align-items-center">
                        <div class="contact-icon me-3">
                            <i class="fas fa-clock text-primary" style="font-size: 1.5rem;"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">Jam Operasional</h5>
                            <p class="text-muted mb-0">Senin - Jumat: 08:00 - 16:00<br>Sabtu: 08:00 - 12:00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card border-0 shadow">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-3">Kirim Pesan</h4>
                    <form>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Nama Lengkap">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Subjek">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" rows="4" placeholder="Pesan"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="text-center py-5" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 20px;">
    <div class="container">
        <h2 class="display-5 fw-bold text-white mb-4">Bergabunglah dengan Kami</h2>
        <p class="lead text-white mb-4">
            Mari bersama-sama meningkatkan kualitas kesehatan masyarakat Indonesia
        </p>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="{{ route('login') }}" class="btn btn-light btn-lg px-4">
                <i class="fas fa-sign-in-alt me-2"></i>Login Admin
            </a>
            <a href="{{ route('statistik') }}" class="btn btn-outline-light btn-lg px-4">
                <i class="fas fa-chart-line me-2"></i>Lihat Statistik
            </a>
        </div>
    </div>
</section>

<style>
.service-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-radius: 15px;
}

.service-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1) !important;
}

.service-icon {
    transition: transform 0.3s ease;
}

.service-card:hover .service-icon {
    transform: scale(1.1);
}

.contact-icon {
    width: 50px;
    height: 50px;
    background: rgba(37, 99, 235, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.hero-section {
    position: relative;
    overflow: hidden;
}

.hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/><circle cx="50" cy="10" r="0.5" fill="white" opacity="0.1"/><circle cx="10" cy="60" r="0.5" fill="white" opacity="0.1"/><circle cx="90" cy="40" r="0.5" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
    pointer-events: none;
}

.hero-image {
    animation: float 6s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}
</style>
@endsection
