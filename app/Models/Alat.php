<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alat extends Model
{
    use HasFactory;

    protected $table = 'alat';

    protected $fillable = [
        'kode_alat',
        'nama_alat',
        'kategori_id',
        'jumlah',
        'jumlah_tersedia',
        'deskripsi',
        'kondisi',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'alat_id');
    }
}
