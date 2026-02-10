@extends('layouts.user')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- Total Alat -->
    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-blue-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium">Total Alat</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalAlat }}</p>
            </div>
            <div class="text-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6m16 0l-8 5-8-5" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Alat Sedang Dipinjam -->
    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-yellow-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium">Sedang Dipinjam</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ $alatDipinjam }}</p>
            </div>
            <div class="text-yellow-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6M9 16h6M9 8h6M7 3h10v4H7V3z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Alat Tersedia -->
    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-green-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium">Alat Tersedia</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ $alatTersedia }}</p>
            </div>
            <div class="text-green-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Riwayat Peminjaman -->
<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="bg-gradient-to-r from-blue-600 to-blue-800 px-6 py-4">
        <h2 class="text-xl font-bold text-white">Riwayat Peminjaman Saya</h2>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Alat</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal Peminjaman</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal Kembali</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($peminjamanUser as $peminjaman)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">
                            {{ $peminjaman->alat?->nama ?? '-' }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            {{ $peminjaman->tanggal_peminjaman ? $peminjaman->tanggal_peminjaman->format('d M Y') : '-' }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            {{ $peminjaman->tanggal_kembali ? $peminjaman->tanggal_kembali->format('d M Y') : '-' }}
                        </td>
                        <td class="px-6 py-4 text-sm">
                            @if($peminjaman->status === 'dipinjam')
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Sedang Dipinjam
                                </span>
                            @elseif($peminjaman->status === 'selesai')
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                    Selesai
                                </span>
                            @else
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">
                                    {{ ucfirst($peminjaman->status) }}
                                </span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                            Anda belum memiliki riwayat peminjaman
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection