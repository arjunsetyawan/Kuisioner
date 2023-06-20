<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DataKriteria;

class Pertanyaan extends Model
{
    use HasFactory;
    protected $table = 'pertanyaan';
    protected $primaryKey = 'id';
    protected $fillable = ['kriteria_id', 'nama_pertanyaan', 'periode_id'];
    public $timestamps = false;

    public function datakriteria()
    {
        return $this->belongsTo(DataKriteria::class);
    }
}
