@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Mahasiswa</h1>
    <form action="{{ route('mahasiswas.update', $mahasiswa->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" name="nim" id="nim" class="form-control" value="{{ old('nim', $mahasiswa->nim) }}" required>
        </div>

        <div class="mb-3">
            <label for="nama_mahasiswa" class="form-label">Nama</label>
            <input type="text" name="nama_mahasiswa" id="nama_mahasiswa" class="form-control" value="{{ old('nama_mahasiswa', $mahasiswa->nama_mahasiswa) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $mahasiswa->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <input type="text" name="jurusan" id="jurusan" class="form-control" value="{{ old('jurusan', $mahasiswa->jurusan) }}" required>
        </div>

        <div class="mb-3">
            <label for="dosen_id" class="form-label">Dosen Wali</label>
            <select name="dosen_id" id="dosen_id" class="form-control" required>
                @foreach($dosens as $dosen)
                    <option value="{{ $dosen->id }}" {{ old('dosen_id', $mahasiswa->dosen_id) == $dosen->id ? 'selected' : '' }}>
                        {{ $dosen->nama_dosen }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>


</div>
@endsection
