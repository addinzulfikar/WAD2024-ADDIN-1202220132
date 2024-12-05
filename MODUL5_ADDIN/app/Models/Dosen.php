<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HasFactory;
class Dosen extends Model
{
    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class, 'dosen_id');
    }

   

    protected $fillable = [
        'kode_dosen',  
        'nama_dosen',
        'nip',
        'email',
        'no_telepon',
    ];

}
