<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin';

    protected $fillable = ['username', 'email', 'password'];

    // Untuk hashing password
    protected $hidden = [
        'password',
    ];
}
