<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKriteria extends Model
{
    use HasFactory;
    protected $table = 'kriteria';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kriteria',
        'detail_kriteria'
    ];
    public $timestamps = false;
}
