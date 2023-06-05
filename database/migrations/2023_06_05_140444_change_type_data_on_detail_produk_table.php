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
            $table->text('teknik_budidaya')->change();
            $table->text('lokasi_tanam')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_produk', function (Blueprint $table) {
            $table->string('teknik_budidaya', 255)->change();
            $table->string('lokasi_tanam', 255)->change();
        });
    }
};
