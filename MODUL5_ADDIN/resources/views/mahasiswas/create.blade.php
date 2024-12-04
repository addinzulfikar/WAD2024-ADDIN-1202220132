@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Mahasiswa</h1>
    <form action="{{ route('mahasiswas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" name="nim" id="nim" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="nama_mahasiswa" class="form-label">Nama</label>
            <input type="text" name="nama_mahasiswa" id="nama_mahasiswa" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <input type="text" name="jurusan" id="jurusan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="dosen_id" class="form-label">Dosen Wali</label>
            <select name="dosen_id" id="dosen_id" class="form-control" required>
                @foreach($dosens as $dosen)
                    <option value="{{ $dosen->id }}">{{ $dosen->nama_dosen }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

</div>
@endsection
