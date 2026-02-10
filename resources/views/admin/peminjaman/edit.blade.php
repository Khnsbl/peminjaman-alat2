@extends('admin.layouts.app')

@section('title', 'Edit Peminjaman')
@section('page-title', 'Edit Peminjaman')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-lg shadow p-6">
        <form method="POST" action="{{ route('admin.peminjaman.update', $peminjaman) }}" class="space-y-6">
            @csrf
            @method('PATCH')

            <div>
                <label for="user" class="block text-sm font-medium text-gray-700 mb-2">User</label>
                <input type="text" id="user" value="{{ $peminjaman->user->name }}" disabled
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100">
            </div>

            <div>
                <label for="alat" class="block text-sm font-medium text-gray-700 mb-2">Alat</label>
                <input type="text" id="alat" value="{{ $peminjaman->alat->nama_alat }}" disabled
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100">
            </div>

            <div>
                <label for="jumlah" class="block text-sm font-medium text-gray-700 mb-2">Jumlah</label>
                <input type="text" id="jumlah" value="{{ $peminjaman->jumlah }}" disabled
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100">
            </div>

            <div>
                <label for="tanggal_peminjaman" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Peminjaman</label>
                <input type="text" id="tanggal_peminjaman" value="{{ $peminjaman->tanggal_peminjaman->format('d M Y') }}" disabled
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100">
            </div>

            <div>
                <label for="tanggal_pengembalian_rencana" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Pengembalian Rencana</label>
                <input type="text" id="tanggal_pengembalian_rencana" value="{{ $peminjaman->tanggal_pengembalian_rencana->format('d M Y') }}" disabled
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100">
            </div>

            <div>
                <label for="tanggal_pengembalian_aktual" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Pengembalian Aktual</label>
                <input type="date" id="tanggal_pengembalian_aktual" name="tanggal_pengembalian_aktual" value="{{ old('tanggal_pengembalian_aktual', $peminjaman->tanggal_pengembalian_aktual?->format('Y-m-d')) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <select id="status" name="status" required 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('status') border-red-500 @enderror">
                    <option value="dipinjam" {{ old('status', $peminjaman->status) === 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                    <option value="dikembalikan" {{ old('status', $peminjaman->status) === 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                    <option value="hilang" {{ old('status', $peminjaman->status) === 'hilang' ? 'selected' : '' }}>Hilang</option>
                </select>
                @error('status')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-2">Keterangan</label>
                <textarea id="keterangan" name="keterangan" rows="4" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('keterangan') border-red-500 @enderror">{{ old('keterangan', $peminjaman->keterangan) }}</textarea>
                @error('keterangan')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4">
                <button type="submit" class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded transition">
                    Update Peminjaman
                </button>
                <a href="{{ route('admin.peminjaman.index') }}" class="flex-1 bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded transition text-center">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
