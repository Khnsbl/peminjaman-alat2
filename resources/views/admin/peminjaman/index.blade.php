@extends('admin.layouts.app')

@section('title', 'Data Peminjaman')
@section('page-title', 'Data Peminjaman')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Daftar Peminjaman</h2>
    <a href="{{ route('admin.peminjaman.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded transition">
        + Tambah Peminjaman Baru
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">User</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Alat</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jumlah</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tgl Peminjaman</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tgl Pengembalian</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($peminjaman as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $item->user->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $item->alat->nama_alat }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $item->jumlah }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $item->tanggal_peminjaman->format('d M Y') }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            @if($item->tanggal_pengembalian_aktual)
                                {{ $item->tanggal_pengembalian_aktual->format('d M Y') }}
                            @else
                                <em>Belum dikembalikan</em>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full
                                {{ $item->status === 'dipinjam' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                {{ $item->status === 'dikembalikan' ? 'bg-green-100 text-green-800' : '' }}
                                {{ $item->status === 'hilang' ? 'bg-red-100 text-red-800' : '' }}
                            ">
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm">
                            <a href="{{ route('admin.peminjaman.edit', $item) }}" class="text-indigo-600 hover:text-indigo-900 font-medium mr-4">
                                Edit
                            </a>
                            <form action="{{ route('admin.peminjaman.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin?');">
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
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                            Tidak ada peminjaman
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="bg-gray-50 px-6 py-4 border-t">
        {{ $peminjaman->links() }}
    </div>
</div>
@endsection
