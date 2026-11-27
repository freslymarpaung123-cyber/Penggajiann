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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();

            // Relasi ke tabel karyawans
            $table->foreignId('karyawan_id')
                  ->constrained('karyawans')
                  ->onDelete('cascade');

            // Periode penggajian, contoh: 2026-07
            $table->string('periode', 7);

            // Komponen gaji
            $table->decimal('gaji_pokok', 15, 2);
            $table->decimal('tunjangan', 15, 2)->default(0);
            $table->decimal('lembur', 15, 2)->default(0);
            $table->decimal('potongan', 15, 2)->default(0);

            // Total gaji
            $table->decimal('total_gaji', 15, 2);

            // Status pembayaran
            $table->enum('status_pembayaran', [
                'Belum Dibayar',
                'Sudah Dibayar'
            ])->default('Belum Dibayar');

            // Tanggal pembayaran
            $table->date('tanggal_bayar')->nullable();

            $table->timestamps();

            // Satu karyawan tidak boleh mempunyai
            // dua penggajian pada periode yang sama
            $table->unique(['karyawan_id', 'periode']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};