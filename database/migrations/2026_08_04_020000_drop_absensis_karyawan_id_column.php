<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('absensis', 'karyawan_id')) {
            Schema::table('absensis', function (Blueprint $table) {
                $table->dropForeign(['karyawan_id']);
                $table->dropColumn('karyawan_id');
            });
        }
    }

    public function down(): void
    {
        if (! Schema::hasColumn('absensis', 'karyawan_id')) {
            Schema::table('absensis', function (Blueprint $table) {
                $table->unsignedBigInteger('karyawan_id')->nullable()->after('id');
                $table->foreign('karyawan_id')
                      ->references('id')
                      ->on('karyawans')
                      ->cascadeOnDelete();
            });
        }
    }
};
