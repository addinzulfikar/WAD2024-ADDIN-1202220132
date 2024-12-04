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
        $dosens = Dosen::all(); // Ambil daftar dosen
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
    
        // Menyimpan data mahasiswa ke database
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
        $dosens = Dosen::all(); // Ambil daftar dosen
        return view('mahasiswas.edit', compact('mahasiswa', 'dosens'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'nim' => 'required|unique:mahasiswas,nim,' . $mahasiswa->id,  // Pastikan NIM unik, kecuali untuk mahasiswa yang sedang diperbarui
            'nama_mahasiswa' => 'required',
            'email' => 'required|email|unique:mahasiswas,email,' . $mahasiswa->id,  // Pastikan email unik, kecuali untuk mahasiswa yang sedang diperbarui
            'jurusan' => 'required',
            'dosen_id' => 'required|exists:dosens,id',  // Validasi dosen_id yang valid
        ]);
    
        // Update data mahasiswa
        $mahasiswa->update([
            'nim' => $validated['nim'],
            'nama_mahasiswa' => $validated['nama_mahasiswa'],
            'email' => $validated['email'],
            'jurusan' => $validated['jurusan'],
            'dosen_id' => $validated['dosen_id'],
        ]);
    
        // Redirect ke halaman daftar mahasiswa dengan pesan sukses
        return redirect()->route('mahasiswas.index')->with('success', 'Data mahasiswa berhasil diperbarui!');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswas.index');
    }
}
