<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alat', function (Blueprint $table) {
            $table->id();
            $table->string('kode_alat')->unique();
            $table->string('nama_alat');
            $table->unsignedBigInteger('kategori_id');
            $table->integer('jumlah');
            $table->integer('jumlah_tersedia');
            $table->text('deskripsi')->nullable();
            $table->enum('kondisi', ['baik', 'rusak ringan', 'rusak berat'])->default('baik');
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->timestamps();
            
            $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alat');
    }
};
