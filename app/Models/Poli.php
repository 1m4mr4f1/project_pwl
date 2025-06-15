<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Poli extends Model
{
    use HasFactory;

    protected $table = 'poli';
    protected $primaryKey = 'id_poli';
    public $incrementing = false; // karena id_poli bukan auto-increment
    protected $keyType = 'string'; // karena id_poli = varchar
    public $timestamps = false;

    protected $fillable = [
        'id_poli',
        'nama_poli',
    ];

    // Tambahkan relasi ke Dokter
    public function dokters()
    {
        return $this->hasMany(Dokter::class, 'id_poli', 'id_poli');
    }
}
