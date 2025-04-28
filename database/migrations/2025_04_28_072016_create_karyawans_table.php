<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_karyawan');
            $table->string('bidang_keahlian');
            $table->string('email')->unique();
            $table->string('nomor_telepon');
            $table->date('tanggal_mulai')->default(date('Y-m-d'));
            $table->integer('durasi_kontrak');
            $table->enum('status', ['aktif', 'tidak_aktif', 'selesai']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
