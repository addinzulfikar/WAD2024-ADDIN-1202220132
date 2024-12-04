<?php
namespace App\Http\Controllers;


use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dosens = Dosen::all();
        return view('dosens.index', compact('dosens'));
    }

    public function create()
    {
        return view('dosens.create');
    }

    public function store(Request $request)
    {
        // Validasi data sebelum disimpan
        $request->validate([
            'kode_dosen' => 'required|string|max:255',
            'nama_dosen' => 'required|string|max:255',
            'nip' => 'required|string|max:20',
            'email' => 'required|email',
            'no_telepon' => 'nullable|string|max:15',
        ]);

        // Menyimpan data menggunakan mass assignment
        Dosen::create($request->all());

        return redirect()->route('dosens.index');
    }

    public function edit(Dosen $dosen)
    {
        return view('dosens.edit', compact('dosen'));
    }

    public function update(Request $request, Dosen $dosen)
    {
        $request->validate([
            'email' => 'required|email|unique:dosens,email,' . $dosen->id,
        ]);

        $dosen->update($request->all());
        return redirect()->route('dosens.index')->with('success', 'Dosen updated successfully');
    }

    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return redirect()->route('dosens.index')->with('success', 'Dosen deleted successfully');
    }
}
