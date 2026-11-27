<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penggajian extends Model
{
    use HasFactory;

    protected $table = 'penggajians';

    protected $fillable = [
        'pegawai_id',
        'tanggal_gaji',
        'gaji_pokok',
        'tunjangan',
        'potongan',
        'total_gaji',
    ];

    /**
     * Relasi ke Pegawai
     */
    public function pegawai(): BelongsTo
    {
        return $this->belongsTo(Karyawan::class, 'pegawai_id', 'id');
    }

    public function karyawan(): BelongsTo
    {
        return $this->belongsTo(Karyawan::class, 'pegawai_id', 'id');
    }
}
