@extends('layout.master')
@section('page-title', 'Detail Karyawan')
@section('breadcrumb', 'Detail Karyawan')
@section('content')
<div class="row">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detail Karyawan</h3>
        </div>
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <div class="symbol-label">
                        @if($karyawan->foto)
                            <img src="{{ asset('fotos/' . $karyawan->foto) }}" alt="Foto Karyawan" class="w-100" />
                        @else
                            <img src="{{ asset('assets/media/svg/files/blank-image.svg') }}" alt="Foto Karyawan" class="w-100" />
                        @endif
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <span class="fs-4 fw-bolder">{{ $karyawan->nama }}</span>
                    <span class="fs-6 text-gray-600">{{ $karyawan->username }}</span>
                </div>
            </div>
            <div class="separator separator-dashed my-7"></div>
            <div class="d-flex flex-wrap mb-7">
                <div class="me-7 mb-4">
                    <div class="fw-bold fs-6 text-muted">Role:</div>
                    <div class="fs-5 text-gray-800">
                        @if ($karyawan->role == 'Admin')
                            <span class="badge badge-light-danger">{{ $karyawan->role }}</span>
                        @elseif ($karyawan->role == 'Developer')
                            <span class="badge badge-light-primary">{{ $karyawan->role }}</span>
                        @elseif ($karyawan->role == 'Analyst')
                            <span class="badge badge-light-warning">{{ $karyawan->role }}</span>
                        @elseif ($karyawan->role == 'Support')
                            <span class="badge badge-light-info">{{ $karyawan->role }}</span>
                        @elseif ($karyawan->role == 'Full Stack')
                            <span class="badge badge-light-dark">{{ $karyawan->role }}</span>
                        @elseif ($karyawan->role == 'Project Manager')
                            <span class="badge badge-light-success">{{ $karyawan->role }}</span>
                        @else
                            <span class="badge badge-light">{{ $karyawan->role }}</span>
                        @endif
                    </div>
                </div>
                <div class="me-7 mb-4">
                    <div class="fw-bold fs-6 text-muted">No. Telepon:</div>
                    <div class="fs-5 text-gray-800">{{ $karyawan->no_telp }}</div>
                </div>
            </div>
            <div class="separator separator-dashed my-7"></div>
            <div class="text-end">
                <a href="{{ route('karyawans.index') }}" class="btn btn-light">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
