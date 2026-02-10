<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('alat_id');
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_pengembalian_rencana');
            $table->date('tanggal_pengembalian_aktual')->nullable();
            $table->integer('jumlah');
            $table->enum('status', ['dipinjam', 'dikembalikan', 'hilang'])->default('dipinjam');
            $table->text('keterangan')->nullable();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('alat_id')->references('id')->on('alat')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
