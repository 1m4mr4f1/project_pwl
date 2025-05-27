<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';        // Nama tabel
    protected $primaryKey = 'nim';         // Primary key

    public $incrementing = false;          // karena nim bukan auto increment
    protected $keyType = 'string';         // karena nim adalah string

    protected $fillable = [                // kolom yang bisa diisi
        'nim', 'nama', 'prodi', 'status_aktif'
    ];
}

