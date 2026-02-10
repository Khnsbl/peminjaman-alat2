@extends('admin.layouts.app')

@section('title', 'Kelola User')
@section('page-title', 'Kelola User')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Daftar User</h2>
    <a href="{{ route('admin.users.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded transition">
        + Tambah User Baru
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal Dibuat</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($users as $user)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $user->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $user->email }}</td>
                        <td class="px-6 py-4 text-sm">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full
                                {{ $user->role === 'admin' ? 'bg-indigo-100 text-indigo-800' : 'bg-green-100 text-green-800' }}
                            ">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            {{ $user->created_at->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4 text-sm">
                            <a href="{{ route('admin.users.edit', $user) }}" class="text-indigo-600 hover:text-indigo-900 font-medium mr-4">
                                Edit
                            </a>
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 font-medium">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                            Tidak ada user
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="bg-gray-50 px-6 py-4 border-t">
        {{ $users->links() }}
    </div>
</div>
@endsection
