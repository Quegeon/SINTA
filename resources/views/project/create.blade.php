@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Project</h1>
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_project">Nama Project:</label>
            <input type="text" class="form-control" id="nama_project" name="nama_project" required>
        </div>
        <div class="form-group">
            <label for="alokasi">Alokasi:</label>
            <input type="number" class="form-control" id="alokasi" name="alokasi" required>
        </div>
        <div class="form-group">
            <label for="skala">Skala:</label>
            <input type="text" class="form-control" id="skala" name="skala" required>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" class="form-control" id="status" name="status" required>
        </div>
        <div class="form-group">
            <label for="tanggal_mulai">Tanggal Mulai:</label>
            <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
        </div>
        <div class="form-group">
            <label for="tanggal_berakhir">Tanggal Berakhir:</label>
            <input type="date" class="form-control" id="tanggal_berakhir" name="tanggal_berakhir" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
