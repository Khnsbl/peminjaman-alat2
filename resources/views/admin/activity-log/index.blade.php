@extends('admin.layouts.app')

@section('title', 'Log Aktivitas')
@section('page-title', 'Log Aktivitas')

@section('content')
<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="p-6 border-b border-gray-200 bg-gradient-to-r from-indigo-600 to-indigo-800">
        <h2 class="text-xl font-bold text-white">Riwayat Aktivitas Sistem</h2>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">User</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Action</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Deskripsi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">IP Address</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Waktu</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($logs as $log)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">
                            {{ $log->user?->name ?? 'System' }}
                        </td>
                        <td class="px-6 py-4 text-sm">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full
                                {{ $log->action === 'create' ? 'bg-green-100 text-green-800' : '' }}
                                {{ $log->action === 'update' ? 'bg-blue-100 text-blue-800' : '' }}
                                {{ $log->action === 'delete' ? 'bg-red-100 text-red-800' : '' }}
                                {{ $log->action === 'login' ? 'bg-purple-100 text-purple-800' : '' }}
                                {{ $log->action === 'logout' ? 'bg-yellow-100 text-yellow-800' : '' }}
                            ">
                                {{ ucfirst($log->action) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            {{ $log->description }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600 font-mono text-xs">
                            {{ $log->ip_address ?? '-' }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            <span title="{{ $log->timestamp->format('d M Y H:i:s') }}">
                                {{ $log->timestamp->diffForHumans() }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                            Tidak ada log aktivitas
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="bg-gray-50 px-6 py-4 border-t">
        {{ $logs->links() }}
    </div>
</div>
@endsection
