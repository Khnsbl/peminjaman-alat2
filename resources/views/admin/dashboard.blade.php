@extends('admin.layouts.app')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
    <!-- Total Users -->
    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-blue-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium">Total User</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalUsers }}</p>
            </div>
            <div class="text-blue-500 text-4xl">👥</div>
        </div>
    </div>

    <!-- Total Tools -->
    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-green-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium">Total Alat</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalAlat }}</p>
            </div>
            <div class="text-green-500 text-4xl">🔧</div>
        </div>
    </div>

    <!-- Total Categories -->
    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-purple-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium">Total Kategori</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalKategori }}</p>
            </div>
            <div class="text-purple-500 text-4xl">📁</div>
        </div>
    </div>

    <!-- Active Borrowing -->
    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-yellow-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium">Peminjaman Aktif</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ $peminjamanAktif }}</p>
            </div>
            <div class="text-yellow-500 text-4xl">📋</div>
        </div>
    </div>

    <!-- Damaged Tools -->
    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-red-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium">Alat Rusak Berat</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ $alatRusakBerat }}</p>
            </div>
            <div class="text-red-500 text-4xl">⚠️</div>
        </div>
    </div>

    <!-- Admin Users Count -->
    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-indigo-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium">Admin Users</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ \App\Models\User::where('role', 'admin')->count() }}</p>
            </div>
            <div class="text-indigo-500 text-4xl">🛡️</div>
        </div>
    </div>
</div>

<!-- Recent Activity -->
<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="bg-gradient-to-r from-indigo-600 to-indigo-800 px-6 py-4">
        <h2 class="text-xl font-bold text-white">Aktivitas Terbaru</h2>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">User</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Action</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Deskripsi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Waktu</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($recentActivities as $activity)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm">
                            <span class="font-medium text-gray-900">{{ $activity->user?->name ?? 'System' }}</span>
                        </td>
                        <td class="px-6 py-4 text-sm">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full
                                {{ $activity->action === 'create' ? 'bg-green-100 text-green-800' : '' }}
                                {{ $activity->action === 'update' ? 'bg-blue-100 text-blue-800' : '' }}
                                {{ $activity->action === 'delete' ? 'bg-red-100 text-red-800' : '' }}
                                {{ $activity->action === 'login' ? 'bg-purple-100 text-purple-800' : '' }}
                                {{ $activity->action === 'logout' ? 'bg-yellow-100 text-yellow-800' : '' }}
                            ">
                                {{ ucfirst($activity->action) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $activity->description }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{ $activity->timestamp->diffForHumans() }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                            Tidak ada aktivitas
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="bg-gray-50 px-6 py-4 border-t">
        <a href="{{ route('admin.activity-log.index') }}" class="text-indigo-600 hover:text-indigo-900 font-medium">
            Lihat semua aktivitas →
        </a>
    </div>
</div>
@endsection
