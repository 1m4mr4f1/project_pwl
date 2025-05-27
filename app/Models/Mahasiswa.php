<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';           // Nama tabel
    protected $primaryKey = 'nim';            // Primary key bukan 'id'
    public $incrementing = false;             // Karena 'nim' bukan auto-increment
    protected $keyType = 'string';            // 'nim' bertipe string (varchar)

    public $timestamps = false;               // Nonaktifkan timestamps (created_at, updated_at)

    protected $fillable = [                   // Field yang bisa diisi melalui mass assignment
        'nim', 'nama', 'prodi', 'status_aktif'
    ];
}
