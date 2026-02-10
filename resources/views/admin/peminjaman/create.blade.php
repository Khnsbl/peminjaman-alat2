@extends('admin.layouts.app')

@section('title', 'Tambah Peminjaman')
@section('page-title', 'Tambah Peminjaman Baru')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-lg shadow p-6">
        <form method="POST" action="{{ route('admin.peminjaman.store') }}" class="space-y-6">
            @csrf

            <div>
                <label for="user_id" class="block text-sm font-medium text-gray-700 mb-2">User</label>
                <select id="user_id" name="user_id" required 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('user_id') border-red-500 @enderror">
                    <option value="">Pilih User</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }} ({{ $user->email }})
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="alat_id" class="block text-sm font-medium text-gray-700 mb-2">Alat</label>
                <select id="alat_id" name="alat_id" required 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('alat_id') border-red-500 @enderror">
                    <option value="">Pilih Alat</option>
                    @foreach($alat as $item)
                        <option value="{{ $item->id }}" {{ old('alat_id') == $item->id ? 'selected' : '' }}>
                            {{ $item->nama_alat }} (tersedia: {{ $item->jumlah_tersedia }})
                        </option>
                    @endforeach
                </select>
                @error('alat_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="jumlah" class="block text-sm font-medium text-gray-700 mb-2">Jumlah</label>
                <input type="number" id="jumlah" name="jumlah" value="{{ old('jumlah') }}" required min="1"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('jumlah') border-red-500 @enderror">
                @error('jumlah')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="tanggal_peminjaman" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Peminjaman</label>
                <input type="date" id="tanggal_peminjaman" name="tanggal_peminjaman" value="{{ old('tanggal_peminjaman') }}" required 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('tanggal_peminjaman') border-red-500 @enderror">
                @error('tanggal_peminjaman')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="tanggal_pengembalian_rencana" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Pengembalian Rencana</label>
                <input type="date" id="tanggal_pengembalian_rencana" name="tanggal_pengembalian_rencana" value="{{ old('tanggal_pengembalian_rencana') }}" required 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('tanggal_pengembalian_rencana') border-red-500 @enderror">
                @error('tanggal_pengembalian_rencana')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-2">Keterangan</label>
                <textarea id="keterangan" name="keterangan" rows="4" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('keterangan') border-red-500 @enderror">{{ old('keterangan') }}</textarea>
                @error('keterangan')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4">
                <button type="submit" class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded transition">
                    Simpan Peminjaman
                </button>
                <a href="{{ route('admin.peminjaman.index') }}" class="flex-1 bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded transition text-center">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
