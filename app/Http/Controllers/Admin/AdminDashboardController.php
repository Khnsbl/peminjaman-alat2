<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Alat;
use App\Models\Kategori;
use App\Models\Peminjaman;
use App\Models\ActivityLog;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalAlat = Alat::count();
        $totalKategori = Kategori::count();
        $peminjamanAktif = Peminjaman::where('status', 'dipinjam')->count();
        $alatRusakBerat = Alat::where('kondisi', 'rusak berat')->count();
        $recentActivities = ActivityLog::latest()->limit(10)->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalAlat',
            'totalKategori',
            'peminjamanAktif',
            'alatRusakBerat',
            'recentActivities'
        ));
    }
}
