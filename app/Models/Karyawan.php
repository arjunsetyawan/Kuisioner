<?php

namespace App\Models;

use App\Models\Divisi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }
}
