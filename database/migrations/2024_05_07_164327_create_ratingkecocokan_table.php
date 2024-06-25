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
        Schema::create('ratingkecocokan', function (Blueprint $table) {
            $table->id();
            $table->string('id_alternatif', 50);
            $table->string('id_kriteria', 50);
            $table->string('bobot', 11);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratingkecocokan');
    }
};