<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;
    protected $table = 'periode';

    public function pertanyaan()
    {
        return $this->hasMany(Pertanyaan::class);
    }
}
