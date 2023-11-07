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
        Schema::create('tarif_tols', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('asal');
            $table->string('tujuan');
            $table->integer('gol1');
            $table->integer('gol2');
            $table->integer('gol3');
            $table->integer('gol4');
            $table->integer('gol5');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarif_tols');
    }
};