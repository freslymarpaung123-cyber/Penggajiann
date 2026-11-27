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
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();

            $table->string('nip')->unique();
            $table->string('nama_karyawan');

            $table->enum('jenis_kelamin', ['L', 'P']);

            $table->foreignId('jabatan_id')
                  ->constrained('jabatans')
                  ->onDelete('cascade');

            $table->date('tanggal_masuk');

            $table->string('no_hp')->nullable();
            $table->string('email')->nullable();
            $table->text('alamat')->nullable();

            $table->enum('status', ['Aktif', 'Tidak Aktif'])
                  ->default('Aktif');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};