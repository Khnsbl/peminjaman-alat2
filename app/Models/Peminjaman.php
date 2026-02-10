<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';

    protected $fillable = [
        'user_id',
        'alat_id',
        'tanggal_peminjaman',
        'tanggal_pengembalian_rencana',
        'tanggal_pengembalian_aktual',
        'jumlah',
        'status',
        'keterangan',
    ];

    protected $casts = [
        'tanggal_peminjaman' => 'date',
        'tanggal_pengembalian_rencana' => 'date',
        'tanggal_pengembalian_aktual' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function alat()
    {
        return $this->belongsTo(Alat::class, 'alat_id');
    }
}
