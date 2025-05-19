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
        //
        Schema::create('calon_pengurus', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 255);
            $table->string('nim', 20)->unique();
            $table->string('prodi', 100);
            $table->enum('jenkel', ['Laki-laki', 'Perempuan']);
            $table->string('pilihan1', 100);
            $table->string('pilihan2', 100);
            $table->string('file')->nullable(); // Menyimpan nama file PDF
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
