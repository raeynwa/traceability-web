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
            $table->renameColumn('kualitas_produk', 'penggunaan_pupuk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_produk', function (Blueprint $table) {
            $table->renameColumn('penggunaan_pupuk', 'kualitas_produk');
        });
    }
};
