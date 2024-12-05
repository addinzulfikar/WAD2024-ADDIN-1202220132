<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
   
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

    
    protected $fillable = [
        'nim',              
        'nama_mahasiswa',   
        'email',           
        'jurusan',          
        'dosen_id',         
    ];
}
