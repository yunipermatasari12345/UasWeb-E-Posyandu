<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{display:flex;min-height:100vh}
        .sidebar{width:240px;background:#343a40;color:#fff}
        .sidebar a{color:#fff;text-decoration:none;display:block;padding:12px 16px}
        .sidebar a:hover{background:#495057}
        .content{flex:1;padding:24px;background:#f8f9fa}
        .logo{background:#212529;font-size:1.3rem;text-align:center;padding:16px 0}
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">Admin Panel</div>
        <a href="{{ route('admin.dashboard') }}">🏠 Dashboard</a>
        <a href="{{ route('admin.posyandu.index') }}">🩺 Data Posyandu</a>
        <a href="{{ route('admin.kader.index') }}">👩‍⚕️ Data Kader</a>
        <a href="{{ route('admin.balita.index') }}">👶 Data Balita</a>
        <a href="{{ route('admin.jadwal.index') }}">📅 Jadwal Posyandu</a>
        <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">🚪 Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none">@csrf</form>
    </div>

    <div class="content">
        <h4 class="mb-3">@yield('title','Dashboard')</h4>
        @yield('content')
    </div>
</body>
</html>
