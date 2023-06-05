<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;
    protected $table = 'karyawan';
    protected $fillable = ['nama', 'tanggal_masuk', 'tempat_lahir', 'tanggal_lahir', 'gender', 'alamat', 'divisi_id', 'no_telp' , 'user_id'];
    public $timestamps = false;
}
