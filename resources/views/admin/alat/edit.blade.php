@extends('admin.layouts.app')

@section('title', 'Edit Alat')
@section('page-title', 'Edit Alat')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-lg shadow p-6">
        <form method="POST" action="{{ route('admin.alat.update', $alat) }}" class="space-y-6">
            @csrf
            @method('PATCH')

            <div>
                <label for="kode_alat" class="block text-sm font-medium text-gray-700 mb-2">Kode Alat</label>
                <input type="text" id="kode_alat" name="kode_alat" value="{{ old('kode_alat', $alat->kode_alat) }}" required 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('kode_alat') border-red-500 @enderror">
                @error('kode_alat')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="nama_alat" class="block text-sm font-medium text-gray-700 mb-2">Nama Alat</label>
                <input type="text" id="nama_alat" name="nama_alat" value="{{ old('nama_alat', $alat->nama_alat) }}" required 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('nama_alat') border-red-500 @enderror">
                @error('nama_alat')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="kategori_id" class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                <select id="kategori_id" name="kategori_id" required 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('kategori_id') border-red-500 @enderror">
                    @foreach($kategori as $kat)
                        <option value="{{ $kat->id }}" {{ old('kategori_id', $alat->kategori_id) == $kat->id ? 'selected' : '' }}>
                            {{ $kat->nama_kategori }}
                        </option>
                    @endforeach
                </select>
                @error('kategori_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="jumlah" class="block text-sm font-medium text-gray-700 mb-2">Jumlah</label>
                <input type="number" id="jumlah" name="jumlah" value="{{ old('jumlah', $alat->jumlah) }}" required min="1"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('jumlah') border-red-500 @enderror">
                @error('jumlah')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="4" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('deskripsi') border-red-500 @enderror">{{ old('deskripsi', $alat->deskripsi) }}</textarea>
                @error('deskripsi')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="kondisi" class="block text-sm font-medium text-gray-700 mb-2">Kondisi</label>
                <select id="kondisi" name="kondisi" required 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('kondisi') border-red-500 @enderror">
                    <option value="baik" {{ old('kondisi', $alat->kondisi) === 'baik' ? 'selected' : '' }}>Baik</option>
                    <option value="rusak ringan" {{ old('kondisi', $alat->kondisi) === 'rusak ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                    <option value="rusak berat" {{ old('kondisi', $alat->kondisi) === 'rusak berat' ? 'selected' : '' }}>Rusak Berat</option>
                </select>
                @error('kondisi')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <select id="status" name="status" required 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('status') border-red-500 @enderror">
                    <option value="aktif" {{ old('status', $alat->status) === 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ old('status', $alat->status) === 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
                @error('status')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4">
                <button type="submit" class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded transition">
                    Update Alat
                </button>
                <a href="{{ route('admin.alat.index') }}" class="flex-1 bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded transition text-center">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
