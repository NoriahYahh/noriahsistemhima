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
        Schema::create('data_penguruses', function (Blueprint $table) {
            $table->id();
            $table->string("nama");
            $table->string("nrp");
            $table->foreignId("jabatan_id")->constrained()->onDelete('cascade');
            $table->string("periode");
            $table->string("image");
            $table->foreignId("user_id")->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_penguruses');
    }
};
