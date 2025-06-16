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
        Schema::create('laporan_kegiatans', function (Blueprint $table) {
            $table->id();
            $table->string('name');           // Nama kegiatan
            $table->date('tanggal');          // Tanggal kegiatan
            $table->text('keterangan')->nullable(); // Keterangan kegiatan (boleh kosong)
            $table->string('video')->nullable();    // File video (opsional)
            $table->string('image')->nullable();    // Gambar thumbnail (opsional)
            $table->string('status');         // Status kegiatan (misal: "selesai", "berlangsung", dll)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->timestamps();             // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_kegiatans');
    }
};
