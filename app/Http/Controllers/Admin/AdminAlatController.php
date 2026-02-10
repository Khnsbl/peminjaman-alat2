<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alat;
use App\Models\Kategori;
use Illuminate\Http\Request;

class AdminAlatController extends Controller
{
    public function index()
    {
        $alat = Alat::with('kategori')->paginate(10);
        return view('admin.alat.index', compact('alat'));
    }

    public function create()
    {
        $kategori = Kategori::where('status', 'aktif')->get();
        return view('admin.alat.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_alat' => 'required|string|unique:alat',
            'nama_alat' => 'required|string',
            'kategori_id' => 'required|exists:kategori,id',
            'jumlah' => 'required|integer|min:1',
            'deskripsi' => 'nullable|string',
            'kondisi' => 'required|in:baik,rusak ringan,rusak berat',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $validated['jumlah_tersedia'] = $validated['jumlah'];
        Alat::create($validated);

        return redirect()->route('admin.alat.index')->with('success', 'Alat berhasil ditambahkan');
    }

    public function edit(Alat $alat)
    {
        $kategori = Kategori::where('status', 'aktif')->get();
        return view('admin.alat.edit', compact('alat', 'kategori'));
    }

    public function update(Request $request, Alat $alat)
    {
        $validated = $request->validate([
            'kode_alat' => 'required|string|unique:alat,kode_alat,' . $alat->id,
            'nama_alat' => 'required|string',
            'kategori_id' => 'required|exists:kategori,id',
            'jumlah' => 'required|integer|min:1',
            'deskripsi' => 'nullable|string',
            'kondisi' => 'required|in:baik,rusak ringan,rusak berat',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $alat->update($validated);

        return redirect()->route('admin.alat.index')->with('success', 'Alat berhasil diubah');
    }

    public function destroy(Alat $alat)
    {
        $alat->delete();
        return redirect()->route('admin.alat.index')->with('success', 'Alat berhasil dihapus');
    }
}
