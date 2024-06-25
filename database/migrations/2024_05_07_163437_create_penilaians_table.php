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
        Schema::create('penilaians', function (Blueprint $table) {
            $table->bigInteger('id', 10);
            $table->integer('id_alternatif');
            $table->string('id_kriteria', 11);
            $table->string('nilai', 50);
            $table->bigInteger('id_sub')->unsigned();
            
            // Menambahkan kunci asing
            $table->foreign('id_alternatif')->references('nisn')->on('siswas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_kriteria')->references('kode')->on('kriterias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_sub')->references('id')->on('subs')->onDelete('cascade')->onUpdate('cascade');
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaians');
    }
};
