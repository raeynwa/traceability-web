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
        Schema::table('detail_produk', function (Blueprint $table) {
            $table->string('gambar_1', 255)->nullable(true);
            $table->string('gambar_2', 255)->nullable(true);
            $table->string('gambar_3', 255)->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_produk', function (Blueprint $table) {
            $table->dropColumn('gambar_1');
            $table->dropColumn('gambar_2');
            $table->dropColumn('gambar_3');
        });
    }
};
