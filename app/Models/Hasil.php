<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;
    protected $table = "hasil";

    public function users()
    {
        return $this->belongsTo(User::class, 'karyawan_id2');
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
