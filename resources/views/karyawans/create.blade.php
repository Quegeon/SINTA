@extends('layout.master')

@section('content')
<div class="container">
    <h1>Tambah Karyawan Baru</h1>

    <form action="{{ route('karyawans.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <input type="text" class="form-control" id="role" name="role" required>
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="mb-3">
            <label for="no_telp" class="form-label">No Telp</label>
            <input type="text" class="form-control" id="no_telp" name="no_telp" required>
        </div>

        <div class="mb-3">
            <label for="kinerja" class="form-label">Kinerja</label>
            <input type="text" class="form-control" id="kinerja" name="kinerja">
        </div>

        <div class="mb-3">
            <label for="jumlah_tugas_selesai" class="form-label">Jumlah Tugas Selesai</label>
            <input type="text" class="form-control" id="jumlah_tugas_selesai" name="jumlah_tugas_selesai">
        </div>

        <div class="mb-3">
            <label for="profile" class="form-label">Profile</label>
            <textarea class="form-control" id="profile" name="profile" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
