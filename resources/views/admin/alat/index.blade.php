@extends('admin.layouts.app')

@section('title', 'Kelola Alat')
@section('page-title', 'Kelola Alat')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Daftar Alat</h2>
    <a href="{{ route('admin.alat.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded transition">
        + Tambah Alat Baru
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kode</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Alat</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kategori</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jumlah</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tersedia</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kondisi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($alat as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $item->kode_alat }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $item->nama_alat }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $item->kategori->nama_kategori }}</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $item->jumlah }}</td>
                        <td class="px-6 py-4 text-sm font-medium {{ $item->jumlah_tersedia === 0 ? 'text-red-600' : 'text-green-600' }}">
                            {{ $item->jumlah_tersedia }}
                        </td>
                        <td class="px-6 py-4 text-sm">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full
                                {{ $item->kondisi === 'baik' ? 'bg-green-100 text-green-800' : '' }}
                                {{ $item->kondisi === 'rusak ringan' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                {{ $item->kondisi === 'rusak berat' ? 'bg-red-100 text-red-800' : '' }}
                            ">
                                {{ ucfirst($item->kondisi) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full
                                {{ $item->status === 'aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}
                            ">
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm">
                            <a href="{{ route('admin.alat.edit', $item) }}" class="text-indigo-600 hover:text-indigo-900 font-medium mr-4">
                                Edit
                            </a>
                            <form action="{{ route('admin.alat.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin?');">
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
                        <td colspan="8" class="px-6 py-4 text-center text-gray-500">
                            Tidak ada alat
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="bg-gray-50 px-6 py-4 border-t">
        {{ $alat->links() }}
    </div>
</div>
@endsection
