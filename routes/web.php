<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminKategoriController;
use App\Http\Controllers\Admin\AdminAlatController;
use App\Http\Controllers\Admin\AdminPeminjamanController;
use App\Http\Controllers\Admin\AdminActivityLogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view ('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    // Users Management
    Route::resource('users', AdminUserController::class);
    
    // Category Management
    Route::resource('kategori', AdminKategoriController::class);
    
    // Tools Management
    Route::resource('alat', AdminAlatController::class);
    
    // Borrowing Management
    Route::resource('peminjaman', AdminPeminjamanController::class);
    
    // Activity Logs
    Route::get('activity-log', [AdminActivityLogController::class, 'index'])->name('activity-log.index');
});

require __DIR__.'/auth.php';
