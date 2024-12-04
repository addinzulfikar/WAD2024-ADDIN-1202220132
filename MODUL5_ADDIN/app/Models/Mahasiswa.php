<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $guarded = [];  // This will allow all fields to be mass-assigned
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

    // Add these fields to the fillable array
    protected $fillable = [
        'nim',              // Corresponding to column 'nim'
        'nama_mahasiswa',   // Corresponding to column 'nama_mahasiswa'
        'email',            // Corresponding to column 'email'
        'jurusan',          // Corresponding to column 'jurusan'
        'dosen_id',         // Corresponding to column 'dosen_id'
    ];
}
