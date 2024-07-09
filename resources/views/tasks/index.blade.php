@extends('layout.master')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="card">
            <div class="card-header border-0 pt-6">
                <div class="card-title">
                    <div class="d-flex align-items-center position-relative my-1">
                        <i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
                        <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Cari Proyek" />
                    </div>
                </div>
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_add_task">
                <i class="ki-outline ki-plus fs-2"></i>Tambah Karyawan</button>             
            </div>
            <div class="card-body py-4">
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_projects">
                    <thead>
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                            <th class="w-10px pe-2">
                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                    <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_projects .form-check-input" value="1" />
                                </div>
                            </th>
                            <th class="min-w-125px">Judul</th>
                            <th class="min-w-125px">Pembuat</th>
                            <th class="min-w-125px">Penerima</th>
                            <th class="min-w-125px">Status</th>
                            <th class="min-w-125px">Tgl Dibuat</th>
                            <th class="min-w-125px">Deadline</th>
                            <th class="min-w-125px">Urgensi</th>
                            <th class="text-end min-w-100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold">
                        <!-- Looping data tasks -->
                        @foreach ($tasks as $task)
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="{{ $task->id }}" />
                                </div>
                            </td>
                            <td>{{ $task->judul }}</td>
                            <td>{{ $task->pembuat }}</td>
                            <td>{{ $task->penerima }}</td>
                            <td>{{ $task->status }}</td>
                            <td>{{ $task->tgl_dibuat }}</td>
                            <td>{{ $task->deadline }}</td>
                            <td>{{ $task->urugensi }}</td>
                            <td class="text-end">
                                <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    Aksi <i class="ki-outline ki-down fs-5 ms-1"></i>
                                </a>
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <div class="menu-item px-3">
                                        <a href="/tasks/{{ $task->id }}/edit" class="menu-link px-3">Edit</a>
                                    </div>
                                    <div class="menu-item px-3">
                                        <a href="/tasks/{{ $task->id }}/delete" class="menu-link px-3">Hapus</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="kt_modal_add_task" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header" id="kt_modal_add_task_header">
                    <h2 class="fw-bold">Tambah Task</h2>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>
                <div class="modal-body px-5 my-7">
                    <form id="kt_modal_add_task_form" class="form" action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_task_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_task_header" data-kt-scroll-wrappers="#kt_modal_add_task_scroll" data-kt-scroll-offset="300px">
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Judul</label>
                                <input type="text" name="judul" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Judul" required maxlength="100" />
                            </div>
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Pembuat</label>
                                <input type="text" name="pembuat" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Pembuat" />
                            </div>
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Penerima</label>
                                <input type="text" name="penerima" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Penerima" />
                            </div>
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Status</label>
                                <input type="text" name="status" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Status" />
                            </div>
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Tanggal Dibuat</label>
                                <input type="date" name="tgl_dibuat" class="form-control form-control-solid mb-3 mb-lg-0" required />
                            </div>
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Deadline</label>
                                <input type="date" name="deadline" class="form-control form-control-solid mb-3 mb-lg-0" required />
                            </div>
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Urgensi</label>
                                <input type="text" name="urgensi" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Urgensi" maxlength="100" />
                            </div>
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control form-control-solid mb-3 mb-lg-0" rows="5" placeholder="Deskripsi" required></textarea>
                            </div>
                        </div>
                        <div class="text-center pt-10">
                            <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Reset</button>
                            <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                <span class="indicator-label">Tambah</span>
                                <span class="indicator-progress">Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    
</div>
@endsection
