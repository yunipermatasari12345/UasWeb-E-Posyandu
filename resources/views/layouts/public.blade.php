<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','Posyandu')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { background: linear-gradient(120deg, #e0e7ff 0%, #f0fdfa 100%); font-family: 'Poppins', Arial, sans-serif; }
        .navbar {
            background: rgba(255,255,255,0.95)!important;
            box-shadow: 0 2px 8px rgba(0,0,0,0.03);
        }
        .navbar-brand { font-weight: bold; font-size: 1.5rem; color: #2563eb !important; letter-spacing: 1px; }
        .nav-link, .btn { font-weight: 500; }
        .nav-link.active, .nav-link:focus, .nav-link:hover { color: #2563eb !important; }
        .btn-primary, .btn-success { background: #2563eb; border: none; }
        .btn-primary:hover, .btn-success:hover { background: #1d4ed8; }
        footer { background: #1e293b; color: #fff; padding: 2rem 0 1rem 0; text-align: center; margin-top: 4rem; }
        footer a { color: #93c5fd; text-decoration: none; }
        footer a:hover { color: #fff; text-decoration: underline; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <span style="font-size:1.7rem;">👶</span>&nbsp; e-Posyandu
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
        @yield('content')
    </main>
    <footer>
        <div class="container">
            <div class="mb-2">&copy; {{ date('Y') }} e-Posyandu. Yuni Permata Sari.</div>
            <div>
                <a href="mailto:info@posyandu.com">info@posyandu.com</a> |
                <a href="tel:081234567890">0812-3456-7890</a>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
