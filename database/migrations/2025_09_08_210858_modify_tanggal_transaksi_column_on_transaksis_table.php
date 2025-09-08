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
        Schema::table('transaksis', function (Blueprint $table) {
            // Ubah kolom tanggal_transaksi jadi datetime
            $table->dateTime('tanggal_transaksi')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
          Schema::table('transaksis', function (Blueprint $table) {
            // Balikin lagi kalau di-rollback
            $table->date('tanggal_transaksi')->change();
        });
    }
};
