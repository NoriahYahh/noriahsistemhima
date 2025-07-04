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
        Schema::create('daftar_himas', function (Blueprint $table) {
              $table->id();
            $table->string('nama');
            $table->string('nim', 20)->unique();
            $table->string('prodi');
            $table->enum('jenkel', ['Laki-laki', 'Perempuan']);
            $table->string('pilihan1');
            $table->string('pilihan2');
            $table->string('file')->nullable(); // Path to uploaded file
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('notes')->nullable(); // Admin notes
            
            // Foreign Keys
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('jabatan_id')->nullable()->constrained('jabatans')->onDelete('set null');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_himas');
    }
};
