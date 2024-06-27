@extends('layout.master')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detail Proyek</h3>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <td>{{ $project->id }}</td>
                </tr>
                <tr>
                    <th>Nama Proyek</th>
                    <td>{{ $project->nama_project }}</td>
                </tr>
                <tr>
                    <th>Alokasi</th>
                    <td>{{ $project->alokasi }}</td>
                </tr>
                <tr>
                    <th>Skala</th>
                    <td>{{ $project->skala }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $project->status }}</td>
                </tr>
                <tr>
                    <th>Tanggal Mulai</th>
                    <td>{{ $project->tanggal_mulai }}</td>
                </tr>
                <tr>
                    <th>Tanggal Berakhir</th>
                    <td>{{ $project->tanggal_berakhir }}</td>
                </tr>
            </table>
            <a href="{{ route('projects.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
    </div>
</div>
@endsection