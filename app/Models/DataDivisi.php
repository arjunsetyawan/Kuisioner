<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDivisi extends Model
{
    use HasFactory;
    protected $table = 'divisi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_divisi'
    ];
}
