 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Peminjaman Alat</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gradient-to-b from-blue-600 to-blue-800 text-white overflow-y-auto">
            <div class="p-6 border-b border-blue-700">
                <h2 class="text-2xl font-bold">PEMINJAMAN ALAT</h2>
                <p class="text-blue-200 text-sm mt-1">User Dashboard</p>
            </div>

            <nav class="p-6 space-y-2">
                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-blue-700' : 'hover:bg-blue-700' }} transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 13h4v6H3v-6zM10 8h4v11h-4V8zM17 3h4v16h-4V3z" />
                    </svg>
                    <span>Dashboard</span>
                </a>

                <a href="#" class="flex items-center px-4 py-3 rounded-lg hover:bg-blue-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6m16 0l-8 5-8-5" />
                    </svg>
                    <span>Daftar Alat</span>
                </a>

                <a href="#" class="flex items-center px-4 py-3 rounded-lg hover:bg-blue-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6M9 16h6M9 8h6M7 3h10v4H7V3z" />
                    </svg>
                    <span>Riwayat Peminjaman</span>
                </a>

                <a href="#" class="flex items-center px-4 py-3 rounded-lg hover:bg-blue-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0a1.724 1.724 0 002.611 1.002c.867-.667 2.07.143 1.67 1.12a1.724 1.724 0 001.166 2.286c.96.287.96 1.676 0 1.963a1.724 1.724 0 00-1.166 2.286c.4.977-.803 1.787-1.67 1.12a1.724 1.724 0 00-2.611 1.002c-.299.921-1.602.921-1.902 0a1.724 1.724 0 00-2.611-1.002c-.867.667-2.07-.143-1.67-1.12a1.724 1.724 0 00-1.166-2.286c-.96-.287-.96-1.676 0-1.963a1.724 1.724 0 001.166-2.286c-.4-.977.803-1.787 1.67-1.12.98.753 2.354.12 2.611-1.002z" />
                    </svg>
                    <span>Pengaturan</span>
                </a>

                <hr class="border-blue-700 my-4">

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
                    <div class="w-10 h-10 bg-blue-600 rounded-full text-white flex items-center justify-center font-bold">
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
