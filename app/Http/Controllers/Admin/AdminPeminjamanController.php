<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\User;
use App\Models\Alat;
use Illuminate\Http\Request;

class AdminPeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with(['user', 'alat'])->paginate(10);
        return view('admin.peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $users = User::where('role', 'user')->get();
        $alat = Alat::where('status', 'aktif')->where('jumlah_tersedia', '>', 0)->get();
        return view('admin.peminjaman.create', compact('users', 'alat'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'alat_id' => 'required|exists:alat,id',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian_rencana' => 'required|date|after:tanggal_peminjaman',
            'jumlah' => 'required|integer|min:1',
            'keterangan' => 'nullable|string',
        ]);

        Peminjaman::create($validated);

        // Update jumlah tersedia
        $alat = Alat::find($validated['alat_id']);
        $alat->decrement('jumlah_tersedia', $validated['jumlah']);

        return redirect()->route('admin.peminjaman.index')->with('success', 'Peminjaman berhasil ditambahkan');
    }

    public function edit(Peminjaman $peminjaman)
    {
        $users = User::where('role', 'user')->get();
        $alat = Alat::where('status', 'aktif')->get();
        return view('admin.peminjaman.edit', compact('peminjaman', 'users', 'alat'));
    }

    public function update(Request $request, Peminjaman $peminjaman)
    {
        $validated = $request->validate([
            'tanggal_pengembalian_aktual' => 'nullable|date',
            'status' => 'required|in:dipinjam,dikembalikan,hilang',
            'keterangan' => 'nullable|string',
        ]);

        $oldStatus = $peminjaman->status;
        $peminjaman->update($validated);

        // Jika status berubah ke dikembalikan, tambah jumlah tersedia
        if ($oldStatus !== 'dikembalikan' && $validated['status'] === 'dikembalikan') {
            $alat = Alat::find($peminjaman->alat_id);
            $alat->increment('jumlah_tersedia', $peminjaman->jumlah);
        }

        return redirect()->route('admin.peminjaman.index')->with('success', 'Peminjaman berhasil diubah');
    }

    public function destroy(Peminjaman $peminjaman)
    {
        // Kembalikan jumlah tersedia jika masih dipinjam
        if ($peminjaman->status === 'dipinjam') {
            $alat = Alat::find($peminjaman->alat_id);
            $alat->increment('jumlah_tersedia', $peminjaman->jumlah);
        }

        $peminjaman->delete();
        return redirect()->route('admin.peminjaman.index')->with('success', 'Peminjaman berhasil dihapus');
    }
}
