<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'nama',
        'jenis_kelamin',
        'alamat',
        'no_hp',
        'jabatan_id',
    ];

    public function jabatan(): BelongsTo
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function penggajians(): HasMany
    {
        return $this->hasMany(Penggajian::class);
    }

    public function absensis(): HasMany
    {
        return $this->hasMany(Absensi::class);
    }
}