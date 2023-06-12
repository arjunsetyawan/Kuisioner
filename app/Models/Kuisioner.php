<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuisioner extends Model
{
    use HasFactory;
    protected $table = 'hasil';
    protected $fillable = [
        'karyawan_id',
        'karyawan_id2',
        'tanggal_pengisian',
        'attitude',
        'kedisiplinan',
        'inisiatif',
        'leadership',
        'kerjasama',
        'kehadiran',
        'tanggungjawab',
        'komunikasi',
        'value_essay',
        'periode_id',
    ];
    public $timestamps = false;
}
