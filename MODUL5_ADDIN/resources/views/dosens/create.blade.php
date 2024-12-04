@extends('layouts.app')

@section('title', 'Tambah Dosen')

@section('content')
    <h1>Tambah Dosen Baru</h1>
    <form action="{{ route('dosens.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="kode_dosen">Kode Dosen</label>
            <input type="text" name="kode_dosen" id="kode_dosen" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nama_dosen">Nama Dosen</label>
            <input type="text" name="nama_dosen" id="nama_dosen" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nip">NIP</label>
            <input type="text" name="nip" id="nip" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="no_telepon">No Telepon</label>
            <input type="text" name="no_telepon" id="no_telepon" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
@endsection
