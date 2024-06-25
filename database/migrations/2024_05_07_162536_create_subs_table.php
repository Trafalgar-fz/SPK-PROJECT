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
        Schema::create('subs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_id', 11);
            $table->string('desc', 50);
            $table->string('nilai_awal', 50);
            $table->string('nilai_akhir', 50);
            $table->integer('bobot');
            $table->timestamps();
    
            // Menambahkan kunci asing
            $table->foreign('kode_id')->references('kode')->on('kriterias')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subs');
    }
};
