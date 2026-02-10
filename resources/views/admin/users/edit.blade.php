@extends('admin.layouts.app')

@section('title', 'Edit User')
@section('page-title', 'Edit User')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-lg shadow p-6">
        <form method="POST" action="{{ route('admin.users.update', $user) }}" class="space-y-6">
            @csrf
            @method('PATCH')

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('email') border-red-500 @enderror">
                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="role" class="block text-sm font-medium text-gray-700 mb-2">Role</label>
                <select id="role" name="role" required 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('role') border-red-500 @enderror">
                    <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>User</option>
                </select>
                @error('role')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4">
                <button type="submit" class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded transition">
                    Update User
                </button>
                <a href="{{ route('admin.users.index') }}" class="flex-1 bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded transition text-center">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
