<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawans';

    protected $fillable = [
        'nip',
        'nama_karyawan',
        'jenis_kelamin',
        'jabatan_id',
        'tanggal_masuk',
        'no_hp',
        'email',
        'alamat',
        'status',
    ];

    protected $casts = [
        'tanggal_masuk' => 'date',
    ];

    /**
     * Relasi ke Jabatan
     */
    public function jabatan(): BelongsTo
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }

    /**
     * Relasi ke Absensi
     */
    public function absensis(): HasMany
    {
        return $this->hasMany(Absensi::class, 'pegawai_id');
    }

    /**
     * Relasi ke Penggajian
     */
    public function penggajians(): HasMany
    {
        return $this->hasMany(Penggajian::class, 'pegawai_id');
    }
}