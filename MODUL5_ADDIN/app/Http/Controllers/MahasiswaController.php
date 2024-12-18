<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::with('dosen')->get();
        return view('mahasiswas.index', compact('mahasiswas'));
    }

    public function create()
    {
        $dosens = Dosen::all();
        return view('mahasiswas.create', compact('dosens'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|unique:mahasiswas',
            'nama_mahasiswa' => 'required',
            'email' => 'required|email|unique:mahasiswas',
            'jurusan' => 'required',
            'dosen_id' => 'required|exists:dosens,id',
        ]);
    
       
        Mahasiswa::create([
            'nim' => $validated['nim'],
            'nama_mahasiswa' => $validated['nama_mahasiswa'],
            'email' => $validated['email'],
            'jurusan' => $validated['jurusan'],
            'dosen_id' => $validated['dosen_id'],
        ]);
    
        return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa berhasil ditambahkan!');
    }
    
                                                

    

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $dosens = Dosen::all(); 
        return view('mahasiswas.edit', compact('mahasiswa', 'dosens'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
    
        $validated = $request->validate([
            'nim' => 'required|unique:mahasiswas,nim,' . $mahasiswa->id,  
            'nama_mahasiswa' => 'required',
            'email' => 'required|email|unique:mahasiswas,email,' . $mahasiswa->id,  
            'jurusan' => 'required',
            'dosen_id' => 'required|exists:dosens,id', 
        ]);
    

        $mahasiswa->update([
            'nim' => $validated['nim'],
            'nama_mahasiswa' => $validated['nama_mahasiswa'],
            'email' => $validated['email'],
            'jurusan' => $validated['jurusan'],
            'dosen_id' => $validated['dosen_id'],
        ]);
    
       
        return redirect()->route('mahasiswas.index')->with('success', 'Data mahasiswa berhasil diperbarui!');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswas.index');
    }
}
