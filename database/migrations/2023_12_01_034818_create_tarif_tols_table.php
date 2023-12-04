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
            $table->unsignedBigInteger('asal_id');
            $table->unsignedBigInteger('tujuan_id');
            $table->unsignedBigInteger('golongan_id');
            $table->integer('harga');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('asal_id')->references('id')->on('asal_tols')->onDelete('cascade');
            $table->foreign('tujuan_id')->references('id')->on('tujuan_tols')->onDelete('cascade');
            $table->foreign('golongan_id')->references('id')->on('golongan_tols')->onDelete('cascade');
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