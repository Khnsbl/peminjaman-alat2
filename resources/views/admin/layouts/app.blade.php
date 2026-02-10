<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Peminjaman Alat</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gradient-to-b from-indigo-600 to-indigo-800 text-white overflow-y-auto">
            <div class="p-6 border-b border-indigo-700">
                <h2 class="text-2xl font-bold">Admin Panel</h2>
                <p class="text-indigo-200 text-sm mt-1">Peminjaman Alat</p>
            </div>

            <nav class="p-6 space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-700' : 'hover:bg-indigo-700' }} transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 13h4v6H3v-6zM10 8h4v11h-4V8zM17 3h4v16h-4V3z" />
                    </svg>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.users.index') }}" class="flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('admin.users.*') ? 'bg-indigo-700' : 'hover:bg-indigo-700' }} transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-4-4h-1" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20H4v-2a4 4 0 014-4h1" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7a4 4 0 110-8 4 4 0 010 8z" />
                    </svg>
                    <span>Kelola User</span>
                </a>

                <a href="{{ route('admin.kategori.index') }}" class="flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('admin.kategori.*') ? 'bg-indigo-700' : 'hover:bg-indigo-700' }} transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h5l2 3h9v9a2 2 0 01-2 2H5a2 2 0 01-2-2V7z" />
                    </svg>
                    <span>Kategori</span>
                </a>

                <a href="{{ route('admin.alat.index') }}" class="flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('admin.alat.*') ? 'bg-indigo-700' : 'hover:bg-indigo-700' }} transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0-1.657 1.343-3 3-3h4" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 21v-4a4 4 0 014-4h0a4 4 0 014 4v4" />
                    </svg>
                    <span>Kelola Alat</span>
                </a>

                <a href="{{ route('admin.peminjaman.index') }}" class="flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('admin.peminjaman.*') ? 'bg-indigo-700' : 'hover:bg-indigo-700' }} transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6M9 16h6M9 8h6M7 3h10v4H7V3z" />
                    </svg>
                    <span>Data Peminjaman</span>
                </a>

                <a href="{{ route('admin.activity-log.index') }}" class="flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('admin.activity-log.*') ? 'bg-indigo-700' : 'hover:bg-indigo-700' }} transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3M3 11h18M5 21h14a2 2 0 002-2V7H3v12a2 2 0 002 2z" />
                    </svg>
                    <span>Log Aktivitas</span>
                </a>

                <hr class="border-indigo-700 my-4">

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center px-4 py-3 rounded-lg hover:bg-red-600 transition text-left">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8v8" />
                        </svg>
                        <span>Logout</span>
                    </button>
                </form>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <div class="bg-white border-b border-gray-200 px-8 py-4 flex justify-between items-center">
                <h1 class="text-3xl font-bold text-gray-800">@yield('page-title', 'Dashboard')</h1>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">{{ Auth::user()->name }}</span>
                    <div class="w-10 h-10 bg-indigo-600 rounded-full text-white flex items-center justify-center font-bold">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                </div>
            </div>

            <!-- Page Content -->
            <div class="flex-1 overflow-auto p-8">
                @if ($message = Session::get('success'))
                    <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                        <p class="font-bold">Berhasil!</p>
                        <p>{{ $message }}</p>
                    </div>
                @endif

                @if ($message = Session::get('error'))
                    <div class="mb-6 bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
                        <p class="font-bold">Error!</p>
                        <p>{{ $message }}</p>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
