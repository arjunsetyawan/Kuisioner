<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ajuan extends Model
{
    use HasFactory;
    protected $table = "ajuan";
    protected $primaryKey = 'id';
    protected $fillable = [
        'username',
        'email',
        'password',
        'role_id',
        'status_akun',
        'status_ajuan'
    ];
}
