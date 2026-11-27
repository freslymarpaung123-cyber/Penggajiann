<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('absensis', 'karyawan_id')) {
            Schema::table('absensis', function (Blueprint $table) {
                $table->unsignedBigInteger('karyawan_id')
                      ->nullable()
                      ->after('id');
            });
        }

        DB::table('absensis')
            ->whereNull('karyawan_id')
            ->update([
                'karyawan_id' => DB::raw('pegawai_id'),
            ]);

        DB::statement(
            'UPDATE absensis AS a JOIN pegawais AS p ON a.pegawai_id = p.id JOIN karyawans AS k ON p.nip = k.nip SET a.karyawan_id = k.id'
        );

        DB::table('absensis')
            ->whereNotNull('karyawan_id')
            ->whereNotExists(function ($query) {
                $query->select(DB::raw(1))
                      ->from('karyawans')
                      ->whereColumn('karyawans.id', 'absensis.karyawan_id');
            })
            ->update(['karyawan_id' => null]);

        if (! $this->hasForeignKey('absensis', 'absensis_karyawan_id_foreign')) {
            Schema::table('absensis', function (Blueprint $table) {
                $table->foreign('karyawan_id')
                      ->references('id')
                      ->on('karyawans')
                      ->cascadeOnDelete();
            });
        }
    }

    public function down(): void
    {
        Schema::table('absensis', function (Blueprint $table) {
            if ($this->hasForeignKey('absensis', 'absensis_karyawan_id_foreign')) {
                $table->dropForeign(['karyawan_id']);
            }

            if (Schema::hasColumn('absensis', 'karyawan_id')) {
                $table->dropColumn('karyawan_id');
            }
        });
    }

    protected function hasForeignKey(string $table, string $foreign): bool
    {
        $database = DB::getDatabaseName();

        $result = DB::selectOne(
            'SELECT COUNT(*) AS count FROM information_schema.TABLE_CONSTRAINTS WHERE CONSTRAINT_SCHEMA = ? AND TABLE_NAME = ? AND CONSTRAINT_NAME = ? AND CONSTRAINT_TYPE = ? ',
            [$database, $table, $foreign, 'FOREIGN KEY']
        );

        return $result->count > 0;
    }
};