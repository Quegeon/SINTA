@extends('layout.master')

@section('content')
<div class="row">
    <div class="col-lg-6">
    </div>
    <div class="col-lg-6 d-flex justify-content-end align-items-center">
        <div class="me-4">
            <!--begin::Select-->
            <select name="status" data-control="select2" data-hide-search="true" class="form-select form-select-sm bg-body border-body w-125px">
                <option value="Active" selected="selected">Active</option>
                <option value="Approved">In Progress</option>
                <option value="Declined">To Do</option>
                <option value="In Progress">Completed</option>
            </select>
            <!--end::Select-->
        </div>
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_add_project">
            Tambah Project
        </button>
    </div>
</div>


<div class="row g-6 g-xl-9">
    @foreach ($projects as $project)
    <div class="col-md-4 col-xl-4">
        <div class="card">
            <div class="card-header border-0 pt-9">
                <div class="symbol symbol-50px w-50px bg-light">
                    <a href="{{ route('projects.show', $project->id) }}" class="text-decoration-none">
                        @if($project->gambar)
                            <img src="{{ asset('gambars/' . $project->gambar) }}" alt="Gambar Proyek" class="w-100" />
                        @else
                            Gambar tidak tersedia
                        @endif
                    </a>                       
                </div>
                <div class="card-toolbar">
                    <span class="badge badge-light-primary fw-bold me-auto px-4 py-2">{{ $project->status }}</span>
                </div>
            </div>
            <div class="card-body p-9">
                <div class="fs-3 fw-bold text-gray-900">{{ $project->nama_project }}</div>
                <p class="text-gray-500 fs-5 mt-1 mb-5">{{ $project->skala }}</p>
                <div class="d-flex flex-wrap mb-4">
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-2 px-3 me-4 mb-3">
                        <div class="fs-6 text-gray-800 fw-bold">{{ $project->tanggal_mulai }}</div>
                        <div class="text-gray-500">Tanggal Mulai</div>
                    </div>
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-2 px-3 mb-3">
                        <div class="fs-6 text-gray-800 fw-bold">{{ $project->tanggal_berakhir }}</div>
                        <div class="text-gray-500">Tanggal Selesai</div>
                    </div>
                </div>
                <div class="allocation-item">
                    <div class="icon"><i class="ki-outline ki-geolocation"></i>{{ $project->alokasi }}</div>
                </div>
                <div class="menu-item px-3">
                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus proyek ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger float-end btn-sm">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div> 
<div class="modal fade" id="kt_modal_add_project" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_project_header">
                <h2 class="fw-bold">Tambah Project</h2>
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
            </div>
            <div class="modal-body px-5 my-7">
                <form id="kt_modal_add_project_form" class="form" action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_project_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_project_header" data-kt-scroll-wrappers="#kt_modal_add_project_scroll" data-kt-scroll-offset="300px">
                        <div class="fv-row mb-7">
                            <label class="d-block fw-semibold fs-6 mb-5">Gambar</label>
                            <style>
                                .image-input-placeholder { 
                                    background-image: url('assets/media/svg/files/blank-image.svg'); 
                                }
                                [data-bs-theme="dark"] .image-input-placeholder { 
                                    background-image: url('assets/media/svg/files/blank-image-dark.svg'); 
                                }
                            </style>
                            <div class="image-input image-input-outline image-input-placeholder" data-kt-image-input="true">
                                <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{ old('gambar') ? asset('gambars/' . old('gambar')) : 'assets/media/svg/files/blank-image.svg' }}');"></div>
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <i class="ki-outline ki-pencil fs-7"></i>
                                    <input type="file" name="gambar_file" accept="image/*" />
                                    <input type="hidden" name="gambar" value="{{ old('gambar') }}" />
                                </label>
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                    <i class="ki-outline ki-cross fs-2"></i>
                                </span>
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                    <i class="ki-outline ki-cross fs-2"></i>
                                </span>
                            </div>
                            <div class="form-text">Masukan tipe file: png, jpg, jpeg.</div>
                        </div>                    
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Nama Project</label>
                            <input type="text" name="nama_project" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nama Project" required maxlength="100" />
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Alokasi</label>
                            <input type="text" name="alokasi" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Alokasi" required maxlength="100" />
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Skala</label>
                            <div class="d-flex flex-column">
                                <div class="d-flex fv-row mb-3">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input me-3" name="skala" type="radio" value="Industri Kecil" id="kt_modal_update_skala_option_0" checked />
                                        <label class="form-check-label" for="kt_modal_update_skala_option_0">
                                            <div class="fw-bold text-gray-800">Industi Kecil</div>
                                            <div class="text-gray-600">Proyek dengan skala kecil</div>
                                        </label>
                                    </div>
                                </div>
                                <div class='separator separator-dashed my-5'></div>
                                <div class="d-flex fv-row mb-3">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input me-3" name="skala" type="radio" value="Industri Menengah" id="kt_modal_update_skala_option_1" />
                                        <label class="form-check-label" for="kt_modal_update_skala_option_1">
                                            <div class="fw-bold text-gray-800">Industri Sedang</div>
                                            <div class="text-gray-600">Proyek dengan skala menengah</div>
                                        </label>
                                    </div>
                                </div>
                                <div class='separator separator-dashed my-5'></div>
                                <div class="d-flex fv-row mb-3">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input me-3" name="skala" type="radio" value="Industri Besar" id="kt_modal_update_skala_option_2" />
                                        <label class="form-check-label" for="kt_modal_update_skala_option_2">
                                            <div class="fw-bold text-gray-800">Industri Besar</div>
                                            <div class="text-gray-600">Proyek dengan skala besar</div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Status</label>
                            <select class="form-select" data-control="select2" data-placeholder="Select an option" name="status">
                                <option></option>
                                <option value="Draft">Draft</option>
                                <option value="Depelovment">Depelovment</option>
                                <option value="Maintenance">Maintenance</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Tanggal Mulai</label>
                            <input type="date" name="tanggal_mulai" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Tanggal Mulai" required />
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Tanggal Berakhir</label>
                            <input type="date" name="tanggal_berakhir" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Tanggal Berakhir" required />
                        </div>
                        <div class="text-center pt-10">
                            <button type="reset" class="btn btn-light me-3" data-kt-project-modal-action="cancel">Reset</button>
                            <button type="submit" class="btn btn-primary" data-kt-project-modal-action="submit">
                                <span class="indicator-label">Tambah</span>
                                <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
