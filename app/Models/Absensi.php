<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensis';

    protected $fillable = [
        'pegawai_id',
        'tanggal',
        'jam_masuk',
        'jam_keluar',
        'status',
    ];


    public function pegawai(): BelongsTo
    {
        return $this->belongsTo(
            Karyawan::class,
            'pegawai_id',
            'id'
        );
    }

    public function karyawan(): BelongsTo
    {
        return $this->belongsTo(
            Karyawan::class,
            'pegawai_id',
            'id'
        );
    }
}
