<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Posyandu')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f4f6fa; }
        .sidebar { min-height: 100vh; background: #0d6efd; color: #fff; }
        .sidebar a { color: #fff; text-decoration: none; display: block; padding: 1rem; border-radius: 0.3rem; }
        .sidebar a.active, .sidebar a:hover { background: #0b5ed7; }
        .sidebar h4 { font-weight: bold; }
    </style>
</head>
<body>
    <div class="d-flex">
        <nav class="sidebar p-3">
            <h5 class="mb-3">Menu Utama</h5>
            <a href="{{ route('admin.imunisasi.index') }}" class="{{ request()->routeIs('admin.imunisasi.*') ? 'active' : '' }}">Data Imunisasi</a>
            <a href="{{ route('admin.vaksin.index') }}" class="{{ request()->routeIs('admin.vaksin.*') ? 'active' : '' }}">Data Vaksin</a>
            <a href="{{ route('admin.anak.index') }}" class="{{ request()->routeIs('admin.anak.*') ? 'active' : '' }}">Data Anak</a>
            <a href="{{ route('admin.ibu.index') }}" class="{{ request()->routeIs('admin.ibu.*') ? 'active' : '' }}">Data Ibu</a>
            <a href="{{ route('admin.petugas.index') }}" class="{{ request()->routeIs('admin.petugas.*') ? 'active' : '' }}">Data Petugas</a>
            <a href="{{ route('admin.posyandu.index') }}" class="{{ request()->routeIs('admin.posyandu.*') ? 'active' : '' }}">Data Posyandu</a>
            <a href="{{ route('admin.penimbangan.index') }}" class="{{ request()->routeIs('admin.penimbangan.*') ? 'active' : '' }}">Data Penimbangan</a>
            <a href="{{ route('admin.riwayatvaksin.index') }}" class="{{ request()->routeIs('admin.riwayatvaksin.*') ? 'active' : '' }}">Riwayat Vaksin</a>
            <hr>
            <a href="#" class="text-muted">Tentang Posyandu</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
        </nav>
        <main class="flex-grow-1 p-4">
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
