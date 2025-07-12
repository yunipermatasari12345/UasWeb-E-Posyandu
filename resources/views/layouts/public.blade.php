<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','Posyandu')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body { background: linear-gradient(120deg, #e0f7fa 0%, #f3e8ff 100%); font-family: 'Poppins', Arial, sans-serif; }
        .navbar {
            background: rgba(255,255,255,0.97)!important;
            box-shadow: 0 2px 8px rgba(0,0,0,0.03);
        }
        .navbar-brand { font-weight: bold; font-size: 1.7rem; color: #2563eb !important; letter-spacing: 1px; }
        .nav-link, .btn { font-weight: 500; }
        .nav-link.active, .nav-link:focus, .nav-link:hover { color: #2563eb !important; }
        .btn-primary, .btn-success { background: #2563eb; border: none; }
        .btn-primary:hover, .btn-success:hover { background: #1d4ed8; }
        .statistik-card {
            box-shadow: 0 4px 24px 0 rgba(37,99,235,0.07);
            border-radius: 1.5rem;
            transition: transform 0.2s, box-shadow 0.2s;
            border: none;
        }
        .statistik-card:hover {
            transform: translateY(-6px) scale(1.04);
            box-shadow: 0 8px 32px 0 rgba(37,99,235,0.13);
            background: #f0fdfa;
        }
        .statistik-card .fa-2x {
            filter: drop-shadow(0 2px 6px #c7d2fe);
        }
        .statistik-card .text-3xl {
            font-size: 2.5rem;
        }
        .statistik-card .text-lg {
            font-size: 1.1rem;
        }
        .slogan {
            font-size: 1.1rem;
            color: #7c3aed;
            font-style: italic;
            margin-bottom: 1.5rem;
        }
        footer { background: #1e293b; color: #fff; padding: 2rem 0 1rem 0; text-align: center; margin-top: 4rem; }
        footer a { color: #93c5fd; text-decoration: none; }
        footer a:hover { color: #fff; text-decoration: underline; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <span style="font-size:2rem;">👨‍👩‍👧‍👦</span>&nbsp; e-Posyandu
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ url('/') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('jadwal') ? 'active' : '' }}" href="{{ route('jadwal') }}">Jadwal</a></li>
                    <li class="nav-item"><a class="btn btn-primary ms-2" href="{{ route('login') }}">Login Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container" style="padding-top: 6rem;">
        <div class="slogan text-center">"Bersama Posyandu, Anak Sehat, Keluarga Bahagia"</div>
        @yield('content')
    </main>
    <footer>
        <div class="container">
            <div class="mb-2">&copy; {{ date('Y') }} e-Posyandu. Yuni Permata Sari.</div>
            <div>
                <a href="mailto:info@posyandu.com">info@posyandu.com</a> |
                <a href="tel:081234567890">0812-3456-7890</a>
            </div>
            <div class="mt-2" style="font-size:0.95rem; color:#a5b4fc;">Jl. Sehat No. 123, Kec. Bahagia, Kota Ceria</div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
