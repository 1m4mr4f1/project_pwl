<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokter';
    protected $primaryKey = 'id_dokter';
    public $timestamps = false;
public function poli()
{
    return $this->belongsTo(Poli::class, 'id_poli', 'id_poli');
}

    protected $fillable = ['nama', 'spesialis', 'deskripsi', 'foto', 'id_poli'];
}
