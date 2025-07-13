<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','e-Posyandu')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #7c3aed;
            --success-color: #059669;
            --info-color: #0891b2;
            --warning-color: #d97706;
            --danger-color: #dc2626;
            --light-bg: #f8fafc;
            --dark-bg: #1e293b;
        }

        body {
            background: linear-gradient(135deg, #f0f9ff 0%, #fdf4ff 100%);
            font-family: 'Poppins', Arial, sans-serif;
            line-height: 1.6;
        }

        .navbar {
            background: rgba(255,255,255,0.95)!important;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
            color: var(--primary-color) !important;
            letter-spacing: 0.5px;
        }

        .nav-link {
            font-weight: 500;
            position: relative;
            transition: all 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--primary-color);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }

        .nav-link.active, .nav-link:focus, .nav-link:hover {
            color: var(--primary-color) !important;
        }

        .btn-primary, .btn-success {
            background: var(--primary-color);
            border: none;
            font-weight: 500;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover, .btn-success:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(37, 99, 235, 0.3);
        }

        .btn-outline-primary {
            border-color: var(--primary-color);
            color: var(--primary-color);
            font-weight: 500;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .btn-outline-primary:hover {
            background: var(--primary-color);
            border-color: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(37, 99, 235, 0.3);
        }

        .statistik-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px rgba(37, 99, 235, 0.1);
            border-radius: 20px;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .statistik-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 40px rgba(37, 99, 235, 0.15);
            background: rgba(255, 255, 255, 0.95);
        }

        .statistik-card .fa-2x {
            filter: drop-shadow(0 4px 8px rgba(37, 99, 235, 0.2));
            transition: all 0.3s ease;
        }

        .statistik-card:hover .fa-2x {
            transform: scale(1.1);
        }

        .statistik-card .text-3xl {
            font-size: 2.5rem;
            font-weight: 700;
        }

        .statistik-card .text-lg {
            font-size: 1.1rem;
            font-weight: 500;
        }

        .slogan {
            font-size: 1.2rem;
            color: var(--secondary-color);
            font-style: italic;
            margin-bottom: 2rem;
            font-weight: 500;
        }

        .card {
            border-radius: 15px;
            border: none;
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }

        .form-control {
            border-radius: 10px;
            border: 2px solid #e2e8f0;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(37, 99, 235, 0.25);
        }

        footer {
            background: linear-gradient(135deg, var(--dark-bg) 0%, #334155 100%);
            color: #fff;
            padding: 3rem 0 1.5rem 0;
            text-align: center;
            margin-top: 4rem;
        }

        footer a {
            color: #93c5fd;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        footer a:hover {
            color: #fff;
            text-decoration: none;
            transform: translateY(-2px);
        }

        .footer-content {
            position: relative;
        }

        .footer-content::before {
            content: '';
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            border-radius: 2px;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.5rem;
            }

            .slogan {
                font-size: 1rem;
            }

            .statistik-card .text-3xl {
                font-size: 2rem;
            }
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-color);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #1d4ed8;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <span style="font-size:2.2rem; margin-right: 0.5rem;">🏥</span>
                e-Posyandu
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ url('/') }}">
                            <i class="fas fa-home me-1"></i>Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('jadwal') ? 'active' : '' }}" href="{{ route('jadwal') }}">
                            <i class="fas fa-calendar-alt me-1"></i>Jadwal
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('daftar.anak') ? 'active' : '' }}" href="{{ route('daftar.anak') }}">
                            <i class="fas fa-user-plus me-1"></i>Pendaftaran
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('cek.anak') ? 'active' : '' }}" href="{{ route('cek.anak') }}">
                            <i class="fas fa-clipboard-check me-1"></i> Cek Status Pendaftaran
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('statistik') ? 'active' : '' }}" href="{{ route('statistik') }}">
                            <i class="fas fa-chart-bar me-1"></i>Statistik
                        </a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="btn btn-outline-primary ms-2" href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-cog me-1"></i>Admin Panel
                        </a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="btn btn-primary ms-2" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt me-1"></i>Login Admin
                        </a>
                    </li>
                    @endauth
                </ul>
                <div class="d-flex align-items-center gap-3">
                    @auth
                        @php
                            $pendaftaran = \App\Models\YuniPendaftaran::where('user_id', auth()->id())->latest()->first();
                        @endphp
                        @if($pendaftaran)
                            @if($pendaftaran->status == 'disetujui')
                                <span class="badge bg-success" style="font-size:0.95rem;"><i class="fas fa-check-circle me-1"></i> Pendaftaran Disetujui</span>
                            @elseif($pendaftaran->status == 'pending')
                                <span class="badge bg-warning text-dark" style="font-size:0.95rem;"><i class="fas fa-hourglass-half me-1"></i> Menunggu Validasi</span>
                            @else
                                <span class="badge bg-danger" style="font-size:0.95rem;"><i class="fas fa-times-circle me-1"></i> Pendaftaran Ditolak</span>
                            @endif
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main class="container" style="padding-top: 6rem;">
        <div class="slogan text-center fade-in-up">
            <i class="fas fa-heartbeat me-2"></i>
            "Bersama Posyandu, Anak Sehat, Keluarga Bahagia"
        </div>
        @yield('content')
    </main>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="row align-items-center">
                    <div class="col-md-6 text-md-start text-center mb-3 mb-md-0">
                        <h5 class="fw-bold mb-2">
                            <i class="fas fa-heartbeat me-2"></i>e-Posyandu
                        </h5>
                        <p class="mb-0" style="color: #cbd5e1;">Sistem Informasi Posyandu Terpadu</p>
                    </div>
                    <div class="col-md-6 text-md-end text-center">
                        <div class="mb-2">
                            <a href="mailto:info@posyandu.com" class="me-3">
                                <i class="fas fa-envelope me-1"></i>info@yuniposyandu.com
                            </a>
                            <a href="tel:081234567890">
                                <i class="fas fa-phone me-1"></i>0812-3456-7890
                            </a>
                        </div>
                        <div style="font-size:0.9rem; color:#94a3b8;">
                            <i class="fas fa-map-marker-alt me-1"></i>
                            Jl. Sehat No. 123, Kec. Bahagia, Kota Ceria
                        </div>
                    </div>
                </div>
                <hr class="my-3" style="border-color: #475569;">
                <div class="text-center">
                    <p class="mb-0" style="color: #94a3b8;">
                        &copy; {{ date('Y') }} e-Posyandu. Dibuat dengan ❤️ oleh Yuni Permata Sari.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
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

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.background = 'rgba(255,255,255,0.98)';
                navbar.style.boxShadow = '0 4px 20px rgba(0,0,0,0.1)';
            } else {
                navbar.style.background = 'rgba(255,255,255,0.95)';
                navbar.style.boxShadow = '0 4px 20px rgba(0,0,0,0.08)';
            }
        });

        // Add fade-in animation to elements
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe all cards and sections
        document.querySelectorAll('.card, section').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'all 0.6s ease-out';
            observer.observe(el);
        });
    </script>
</body>
</html>
