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
        Schema::create('dokumens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('divisi_id');
            $table->unsignedBigInteger('kategori_id');
            $table->string('judul');
            $table->string('file');
            $table->date('tanggal');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('divisi_id')->references('id')->on('divisis')->onDelete('cascade');
            $table->foreign('kategori_id')->references('id')->on('kategori_dokumens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumens');
    }
};