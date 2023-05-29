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
        Schema::create('detail_produk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_produk')->nullable(false);
            $table->string('kode_produk', 255)->nullable(false);
            $table->integer('jenis_produk')->nullable(false);
            $table->string('nama_produk', 255)->nullable(false);
            $table->string('nama_petani', 255)->nullable(false);
            $table->string('teknik_budidaya', 255)->nullable(false);
            $table->string('lokasi_tanam', 255)->nullable(false);
            $table->date('tanggal_tanam')->nullable(false);
            $table->integer('kualitas_produk')->nullable(false);
            $table->date('tanggal_expired')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_produk');
    }
};
