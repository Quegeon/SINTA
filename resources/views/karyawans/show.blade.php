@extends('layout.master')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail Karyawan</h3>
                <a href="{{ route('karyawans.edit', $karyawan->id) }}" class="btn btn-primary">Edit</a>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="symbol symbol-circle symbol-100px overflow-hidden me-5">
                        @if($karyawan->foto)
                            <img src="{{ asset('fotos/' . $karyawan->foto) }}" alt="Foto" class="w-100" />
                        @endif
                    </div>
                    <div>
                        <h4>{{ $karyawan->nama }}</h4>
                        <p>{{ $karyawan->username }}</p>
                    </div>
                </div>
                <p><strong>Role:</strong> {{ $karyawan->role }}</p>
                <p><strong>No Telp:</strong> {{ $karyawan->no_telp }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
