<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') | Villaveh Gameview</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Cormorant+Garamond:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .sidebar-active { background-color: #D4AF37; color: #0A2463; }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg flex-shrink-0 overflow-y-auto">
            <div class="p-6 border-b">
                <h1 class="text-2xl font-['Cormorant_Garamond'] font-bold text-luxe-blue">Admin Panel</h1>
                <p class="text-xs text-gray-500 mt-1">Villaveh Gameview</p>
            </div>
            <nav class="p-4 space-y-2">
                <a href="{{ url('Admin.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-amber-50 transition {{ request()->routeIs('admin.dashboard') ? 'sidebar-active' : '' }}">
                    <i class="fas fa-tachometer-alt w-5"></i> Dashboard
                </a>
                <a href="/Admin/bookings" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-amber-50 transition {{ request()->routeIs('admin.bookings') ? 'sidebar-active' : '' }}">
                    <i class="fas fa-calendar-check w-5"></i> Bookings
                </a>
                <a href="/Admin/rooms" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-amber-50 transition {{ request()->routeIs('admin.rooms') ? 'sidebar-active' : '' }}">
                    <i class="fas fa-bed w-5"></i> Rooms
                </a>
                <a href="{{ route('services.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-amber-50 transition {{ request()->routeIs('admin.services') ? 'sidebar-active' : '' }}">
                    <i class="fas fa-concierge-bell w-5"></i> Services
                </a>
                <a href="{{ route('blogs.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-amber-50 transition {{ request()->routeIs('admin.blog') ? 'sidebar-active' : '' }}">
                    <i class="fas fa-newspaper w-5"></i> Blog
                </a>
            </nav>
            <div class="absolute bottom-0 w-64 p-4 border-t">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center gap-3 text-gray-600 hover:text-red-600 w-full px-4 py-2">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto bg-gray-50">
            <div class="p-6">
                @yield('content')
            </div>
        </main>
    </div>

    @livewireScripts
</body>
</html>