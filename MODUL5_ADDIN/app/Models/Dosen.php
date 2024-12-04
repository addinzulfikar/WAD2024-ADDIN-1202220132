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

   

    // Menambahkan atribut ke dalam fillable
    protected $fillable = [
        'kode_dosen',  // Contoh kolom yang ingin Anda isi
        'nama_dosen',
        'nip',
        'email',
        'no_telepon',
    ];

}
