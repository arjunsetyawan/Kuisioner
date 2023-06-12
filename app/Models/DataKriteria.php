<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pertanyaan;

class DataKriteria extends Model
{
    use HasFactory;
    protected $table = 'kriteria';
    protected $primaryKey = 'id_kriteria';
    protected $fillable = [
        'kriteria',
        'detail_kriteria'
    ];
    public $timestamps = false;

    public function pertanyaan()
    {
        return $this->hasMany(Pertanyaan::class);
    }
}
