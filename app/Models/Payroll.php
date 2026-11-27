<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payroll extends Model
{
    protected $fillable = [
        'karyawan_id',
        'periode',
        'gaji_pokok',
        'tunjangan',
        'lembur',
        'potongan',
        'total_gaji',
        'status_pembayaran',
        'tanggal_bayar',
    ];

    protected $casts = [
        'tanggal_bayar' => 'date',
        'gaji_pokok' => 'decimal:2',
        'tunjangan' => 'decimal:2',
        'lembur' => 'decimal:2',
        'potongan' => 'decimal:2',
        'total_gaji' => 'decimal:2',
    ];

    public function karyawan(): BelongsTo
    {
        return $this->belongsTo(Karyawan::class);
    }
}