<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Dashboard User') - Posyandu</title>
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
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <h1 class="text-xl font-bold text-blue-600">
                            <i class="fas fa-heartbeat mr-2"></i>
                            e-Posyandu User
                        </h1>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-user-circle text-gray-400 text-xl"></i>
                        <span class="text-gray-700 font-medium">{{ auth()->user()->name }}</span>
                    </div>
                    <div class="w-px h-6 bg-gray-300"></div>
                    <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:text-blue-800 text-sm">
                        <i class="fas fa-cog mr-1"></i>Admin Panel
                    </a>
                    <div class="w-px h-6 bg-gray-300"></div>
                    <a href="{{ url('/') }}" class="text-gray-600 hover:text-gray-800 text-sm">
                        <i class="fas fa-home mr-1"></i>Beranda
                    </a>
                    <div class="w-px h-6 bg-gray-300"></div>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-red-600 hover:text-red-800 text-sm">
                            <i class="fas fa-sign-out-alt mr-1"></i>Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex space-x-8">
                <a href="{{ route('user.dashboard') }}" class="flex items-center px-3 py-4 text-sm font-medium {{ request()->routeIs('user.dashboard') ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-500 hover:text-gray-700' }}">
                    <i class="fas fa-tachometer-alt mr-2"></i>
                    Dashboard
                </a>
                <a href="{{ route('user.pendaftaran') }}" class="flex items-center px-3 py-4 text-sm font-medium {{ request()->routeIs('user.pendaftaran') ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-500 hover:text-gray-700' }}">
                    <i class="fas fa-user-plus mr-2"></i>
                    Pendaftaran
                </a>
                <a href="{{ route('user.status-pendaftaran') }}" class="flex items-center px-3 py-4 text-sm font-medium {{ request()->routeIs('user.status-pendaftaran') ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-500 hover:text-gray-700' }}">
                    <i class="fas fa-clipboard-check mr-2"></i>
                    Status Pendaftaran
                </a>
                <a href="{{ route('user.pengaduan') }}" class="flex items-center px-3 py-4 text-sm font-medium {{ request()->routeIs('user.pengaduan') ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-500 hover:text-gray-700' }}">
                    <i class="fas fa-comment mr-2"></i>
                    Pengaduan
                </a>
                <a href="{{ route('user.riwayat') }}" class="flex items-center px-3 py-4 text-sm font-medium {{ request()->routeIs('user.riwayat') ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-500 hover:text-gray-700' }}">
                    <i class="fas fa-chart-line mr-2"></i>
                    Riwayat
                </a>
                <a href="{{ route('user.jadwal') }}" class="flex items-center px-3 py-4 text-sm font-medium {{ request()->routeIs('user.jadwal') ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-500 hover:text-gray-700' }}">
                    <i class="fas fa-calendar mr-2"></i>
                    Jadwal
                </a>
                <a href="{{ route('user.pengumuman') }}" class="flex items-center px-3 py-4 text-sm font-medium {{ request()->routeIs('user.pengumuman') ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-500 hover:text-gray-700' }}">
                    <i class="fas fa-bullhorn mr-2"></i>
                    Pengumuman
                </a>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
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
</body>
</html>
