<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Jika user adalah admin, arahkan ke admin dashboard
        if ($user && $user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        $totalAlat = Alat::count();
        $alatDipinjam = Peminjaman::where('status', 'dipinjam')->count();
        $alatTersedia = $totalAlat - $alatDipinjam;
        $peminjamanUser = Peminjaman::where('user_id', auth()->id())->latest()->limit(10)->get();

        return view('dashboard', compact(
            'totalAlat',
            'alatDipinjam',
            'alatTersedia',
            'peminjamanUser'
        ));
    }
}
