@extends('admin.layouts.app')

@section('title', 'Kelola Kategori')
@section('page-title', 'Kelola Kategori')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Daftar Kategori</h2>
    <a href="{{ route('admin.kategori.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded transition">
        + Tambah Kategori Baru
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Kategori</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Deskripsi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal Dibuat</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($kategori as $kat)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $kat->nama_kategori }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ Str::limit($kat->deskripsi, 50) }}</td>
                        <td class="px-6 py-4 text-sm">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full
                                {{ $kat->status === 'aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}
                            ">
                                {{ ucfirst($kat->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            {{ $kat->created_at->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4 text-sm">
                            <a href="{{ route('admin.kategori.edit', $kat) }}" class="text-indigo-600 hover:text-indigo-900 font-medium mr-4">
                                Edit
                            </a>
                            <form action="{{ route('admin.kategori.destroy', $kat) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin?');">
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
                            Tidak ada kategori
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="bg-gray-50 px-6 py-4 border-t">
        {{ $kategori->links() }}
    </div>
</div>
@endsection
