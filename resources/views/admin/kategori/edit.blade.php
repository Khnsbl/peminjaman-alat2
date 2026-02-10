@extends('admin.layouts.app')

@section('title', 'Edit Kategori')
@section('page-title', 'Edit Kategori')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-lg shadow p-6">
        <form method="POST" action="{{ route('admin.kategori.update', $kategori) }}" class="space-y-6">
            @csrf
            @method('PATCH')

            <div>
                <label for="nama_kategori" class="block text-sm font-medium text-gray-700 mb-2">Nama Kategori</label>
                <input type="text" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori', $kategori->nama_kategori) }}" required 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('nama_kategori') border-red-500 @enderror">
                @error('nama_kategori')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="4" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('deskripsi') border-red-500 @enderror">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
                @error('deskripsi')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <select id="status" name="status" required 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('status') border-red-500 @enderror">
                    <option value="aktif" {{ old('status', $kategori->status) === 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ old('status', $kategori->status) === 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
                @error('status')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4">
                <button type="submit" class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded transition">
                    Update Kategori
                </button>
                <a href="{{ route('admin.kategori.index') }}" class="flex-1 bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded transition text-center">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
