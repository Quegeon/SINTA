@extends('layout.master') 

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Daftar Proyek</h3>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahProject">
                        <i class="fas fa-plus-circle"></i> Tambah Proyek
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped gy-7 gs-7">
                            <thead>
                                <tr class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
                                    <th>ID</th>
                                    <th>Nama Proyek</th>
                                    <th>Alokasi</th>
                                    <th>Skala</th>
                                    <th>Status</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Berakhir</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Loop untuk menampilkan data proyek -->
                                @foreach ($projects as $project)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $project->nama_project }}</td>
                                    <td>{{ $project->alokasi }}</td>
                                    <td><span class="badge badge-success">{{ $project->skala }}</span></td>
                                    <td><span class="badge badge-dark">{{ $project->status }}</span></td>
                                    <td>{{ $project->tanggal_mulai }}</td>
                                    <td>{{ $project->tanggal_berakhir }}</td>
                                    <td>
                                        <a href="{{ route('projects.show', $project->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
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

<div class="modal fade" tabindex="-1" id="modalTambahProject">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Tambah Proyek</h3>
                <!-- Tombol Close -->
                <button type="button" class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form action="{{ route('projects.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <!-- Isi Form untuk menambahkan proyek -->
                    <label for="nama_project">Nama Proyek</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="ki-solid ki-briefcase"></i></span>                   
                        <input type="text" class="form-control" id="nama_project" name="nama_project" placeholder="Nama Proyek" required>
                    </div>
                    <label for="skala">Skala</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="ki-solid ki-focus"></i></span>
                        <div class="overflow-hidden flex-grow-1">
                            <select class="form-select rounded-start-0" data-control="select2" data-placeholder="Skala" name="skala">
                                <option></option>
                                <option value="industri kecil">Industri Kecil</option>
                                <option value="industri sedang">Industri Sedang</option>
                                <option value="industri besar">Industri Besar</option>
                            </select>
                        </div> 
                    </div>
                    <label for="alokasi">Alokasi</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="ki-solid ki-geolocation"></i></span>
                        <input type="text" class="form-control" id="alokasi" name="alokasi" placeholder="Alokasi" required>
                    </div>
                    <label for="status">Status</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="ki-solid ki-chart-line"></i></span>
                        <div class="overflow-hidden flex-grow-1">
                            <select class="form-select rounded-start-0" data-control="select2" data-placeholder="Status" name="status">
                                <option></option>
                                <option value="rendah">Rendah</option>
                                <option value="normal">Normal</option>
                                <option value="tinggi">Tinggi</option>
                            </select>
                        </div>                    
                    </div>
                    <label for="tanggal_mulai">Tanggal Mulai</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        <input class="form-control" placeholder="Pick a date" id="kt_datepicker_1" name="tanggal_mulai"/>
                    </div>
                    <label for="tanggal_berakhir">Tanggal Berakhir</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        <input class="form-control" placeholder="Pick a date" id="kt_datepicker_1" name="tanggal_berakhir"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    
</script>


@endsection
