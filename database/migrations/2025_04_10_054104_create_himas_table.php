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
        Schema::create('himas', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('nama');
            $table->text('visi');
            $table->text('misi');
            $table->text('alur')->nullable();
             $table->boolean('pendaftaran_dibuka')->default(false); 
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('himas');
    }
};
