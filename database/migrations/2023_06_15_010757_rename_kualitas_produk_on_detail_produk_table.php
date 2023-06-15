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
        DB::statement('ALTER TABLE detail_produk CHANGE kualitas_produk penggunaan_pupuk text');
        // Schema::table('detail_produk', function (Blueprint $table) {
        //     $table->renameColumn('kualitas_produk', 'penggunaan_pupuk');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE detail_produk CHANGE penggunaan_pupuk kualitas_produk text');
        // Schema::table('detail_produk', function (Blueprint $table) {
        //     $table->renameColumn('penggunaan_pupuk', 'kualitas_produk');
        // });
    }
};
