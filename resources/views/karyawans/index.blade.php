@extends('layout.master') 

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Daftar Karyawan</h3>
                    <a href="{{route('karyawans.create')}}" type="submit" class="btn btn-success">
                        <i class="fas fa-plus-circle"></i> Tambah Karyawan
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped gy-7 gs-7">
                            <thead>
                                <tr class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
                                    <th>Nama</th>
                                    <th>Role</th>
                                    <th>Username</th>
                                    <th>No Telp</th>
                                    <th>Kinerja</th>
                                    <th>Jumlah Tugas Selesai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Loop untuk menampilkan data proyek -->
                                @foreach ($karyawans as $karyawan)
                                <tr>
                                    <td>{{ $karyawan->nama }}</td>
                                    <td>{{ $karyawan->role }}</td>
                                    <td>{{ $karyawan->username }}</td>
                                    <td>{{ $karyawan->no_telp }}</td>
                                    <td class="text-success">{{ $karyawan->kinerja }}</td>
                                    <td>{{ $karyawan->jumlah_tugas_selesai }}</td>
                                    <td>
                                        <a href="{{ route('karyawans.edit', $karyawan->id) }}" class="btn btn-warning"><i class="ki-outline ki-pencil"></i></a>
                                        <form action="{{ route('karyawans.destroy', $karyawan->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="ki-outline ki-eraser"></i></button>
                                        </form>                                
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
