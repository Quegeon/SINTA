@extends('layout.master')

@section('content')
<div class="container">
    <h1>Projects</h1>
    <a href="{{ route('projects.create') }}" class="btn btn-primary">Add Project</a>
    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-2">
            {{ $message }}
        </div>
    @endif
    <table class="table mt-2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Project</th>
                <th>Alokasi</th>
                <th>Skala</th>
                <th>Status</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Berakhir</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->nama_project }}</td>
                    <td>{{ $project->alokasi }}</td>
                    <td>{{ $project->skala }}</td>
                    <td>{{ $project->status }}</td>
                    <td>{{ $project->tanggal_mulai }}</td>
                    <td>{{ $project->tanggal_berakhir }}</td>
                    <td>
                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
