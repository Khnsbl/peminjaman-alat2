<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class AdminKategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::paginate(10);
        return view('admin.kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|unique:kategori',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        Kategori::create($validated);

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit(Kategori $kategori)
    {
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|unique:kategori,nama_kategori,' . $kategori->id,
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $kategori->update($validated);

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil diubah');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil dihapus');
    }
}
