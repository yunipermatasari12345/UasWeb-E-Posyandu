<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Dashboard Admin') - Posyandu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3B82F6',
                        secondary: '#64748B',
                        success: '#10B981',
                        warning: '#F59E0B',
                        danger: '#EF4444',
                        info: '#06B6D4'
                    }
                }
            }
        }
    </script>
    <style>
        .sidebar-transition { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-2px); transition: all 0.3s ease; }
        .gradient-bg { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .gradient-card { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); }
        .gradient-success { background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); }
        .gradient-warning { background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); }
        .gradient-info { background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%); }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-lg sidebar-transition">
            <div class="gradient-bg p-6">
                <div class="flex items-center space-x-3">
                    <i class="fas fa-heartbeat text-white text-2xl"></i>
                    <h1 class="text-white font-bold text-xl">Posyandu Admin</h1>
                </div>
            </div>

            <nav class="mt-6">
                <div class="px-4 mb-4">
                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Menu Utama</p>
                </div>

                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 sidebar-transition {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-600 border-r-2 border-blue-600' : '' }}">
                    <i class="fas fa-tachometer-alt w-5 h-5 mr-3"></i>
                    <span class="font-medium">Dashboard</span>
                </a>

                <div class="px-4 mt-6 mb-4">
                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Data Master</p>
                </div>

                <a href="{{ route('admin.posyandu.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 sidebar-transition {{ request()->routeIs('admin.posyandu.*') ? 'bg-blue-50 text-blue-600 border-r-2 border-blue-600' : '' }}">
                    <i class="fas fa-hospital w-5 h-5 mr-3"></i>
                    <span class="font-medium">Data Posyandu</span>
                </a>

                <a href="{{ route('admin.kader.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 sidebar-transition {{ request()->routeIs('admin.kader.*') ? 'bg-blue-50 text-blue-600 border-r-2 border-blue-600' : '' }}">
                    <i class="fas fa-user-nurse w-5 h-5 mr-3"></i>
                    <span class="font-medium">Data Kader</span>
                </a>

                <a href="{{ route('admin.balita.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 sidebar-transition {{ request()->routeIs('admin.balita.*') ? 'bg-blue-50 text-blue-600 border-r-2 border-blue-600' : '' }}">
                    <i class="fas fa-baby w-5 h-5 mr-3"></i>
                    <span class="font-medium">Data Balita</span>
                </a>

                <div class="px-4 mt-6 mb-4">
                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Jadwal & Aktivitas</p>
                </div>

                <a href="{{ route('admin.jadwal.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 sidebar-transition {{ request()->routeIs('admin.jadwal.*') ? 'bg-blue-50 text-blue-600 border-r-2 border-blue-600' : '' }}">
                    <i class="fas fa-calendar-alt w-5 h-5 mr-3"></i>
                    <span class="font-medium">Jadwal Posyandu</span>
                </a>

                <a href="{{ route('admin.berita.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 sidebar-transition {{ request()->routeIs('admin.berita.*') ? 'bg-blue-50 text-blue-600 border-r-2 border-blue-600' : '' }}">
                    <i class="fas fa-newspaper w-5 h-5 mr-3"></i>
                    <span class="font-medium">Berita & Artikel</span>
                </a>

                <div class="px-4 mt-6 mb-4">
                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Pengaturan</p>
                </div>

                <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="flex items-center px-6 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 sidebar-transition">
                    <i class="fas fa-sign-out-alt w-5 h-5 mr-3"></i>
                    <span class="font-medium">Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none">@csrf</form>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="flex items-center justify-between px-6 py-4">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">@yield('title','Dashboard')</h2>
                        <p class="text-gray-600 text-sm">@yield('subtitle','Selamat datang di panel admin Posyandu')</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-user-circle text-gray-400 text-xl"></i>
                            <span class="text-gray-700 font-medium">{{ auth()->user()->name ?? 'Admin' }}</span>
                        </div>
                        <div class="w-px h-6 bg-gray-300"></div>
                        <span class="text-sm text-gray-500">{{ now()->format('d M Y, H:i') }}</span>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-6">
                @if(session('success'))
                    <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg flex items-center">
                        <i class="fas fa-check-circle mr-2"></i>
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg flex items-center">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @stack('scripts')
</body>
</html>
