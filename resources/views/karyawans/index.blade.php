@extends('layout.master')

@section('content')
<div class="row">
    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <div class="d-flex align-items-center position-relative my-1">
                    <i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
                    <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Cari Karyawan" />
                </div>
            </div>
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <!--begin::Filter-->
                    <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    <i class="ki-outline ki-filter fs-2"></i>Filter</button>
                    <!--begin::Menu 1-->
                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                        <!--begin::Header-->
                        <div class="px-7 py-5">
                            <div class="fs-5 text-gray-900 fw-bold">Opsi Filter</div>
                        </div>
                        <div class="separator border-gray-200"></div>
                        <div class="px-7 py-5" data-kt-user-table-filter="form">
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <label class="form-label fs-6 fw-semibold">Role:</label>
                                <select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="role" data-hide-search="true">
                                    <option></option>
                                    <option value="Administrator">Admin</option>
                                    <option value="Analyst">Analyst</option>
                                    <option value="Developer">Developer</option>
                                    <option value="Support">Support</option>
                                    <option value="Trial">Full Stack</option>
                                </select>
                            </div>
                           
                            <div class="mb-10">
                                <label class="form-label fs-6 fw-semibold">Two Step Verification:</label>
                                <select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="two-step" data-hide-search="true">
                                    <option></option>
                                    <option value="Enabled">Enabled</option>
                                </select>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
                                <button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
                    <i class="ki-outline ki-plus fs-2"></i>Tambah Karyawan</button>
                </div>
                <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <div class="modal-content">
                            <div class="modal-header" id="kt_modal_add_user_header">
                                <h2 class="fw-bold">Add Karyawan</h2>
                                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                </div>
                            </div>
                            <div class="modal-body px-5 my-7">
                                <form id="kt_modal_add_user_form" class="form" action="{{ route('karyawans.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                                        <div class="fv-row mb-7">
                                            <label class="d-block fw-semibold fs-6 mb-5">Foto</label>
                                            <style>
                                                .image-input-placeholder { 
                                                    background-image: url('assets/media/svg/files/blank-image.svg'); 
                                                }
                                                [data-bs-theme="dark"] .image-input-placeholder { 
                                                    background-image: url('assets/media/svg/files/blank-image-dark.svg'); 
                                                }
                                            </style>
                                            <div class="image-input image-input-outline image-input-placeholder" data-kt-image-input="true">
                                                <div class="image-input-wrapper w-125px h-125px" style="background-image: url();"></div>
                                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                                    <i class="ki-outline ki-pencil fs-7"></i>
                                                    <input type="file" name="foto" accept=".png, .jpg, .jpeg" />
                                                    <input type="hidden" name="foto" />
                                                </label>
                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                                    <i class="ki-outline ki-cross fs-2"></i>
                                                </span>
                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                                    <i class="ki-outline ki-cross fs-2"></i>
                                                </span>
                                            </div>
                                            <div class="form-text">Masukan tipe file:png,jpg,jpges.</div>
                                        </div>
                                        <div class="fv-row mb-7">
                                            <label class="required fw-semibold fs-6 mb-2">Full Name</label>
                                            <input type="text" name="nama" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name" required maxlength="100" />
                                        </div>
                                        <div class="fv-row mb-7">
                                            <label class="required fw-semibold fs-6 mb-2">Username</label>
                                            <input type="text" name="username" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Username" />
                                        </div>
                                        <div class="mb-5">
                                            <label class="required fw-semibold fs-6 mb-5">Role</label>
                                            <div class="d-flex fv-row">
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input me-3" name="role" type="radio" value="Admin" id="kt_modal_update_role_option_0" checked='checked' />
                                                    <label class="form-check-label" for="kt_modal_update_role_option_0">
                                                        <div class="fw-bold text-gray-800">Admin</div>
                                                        <div class="text-gray-600"> pengguna yang memiliki hak akses tertinggi dan bertanggung jawab untuk mengelola dan mengawasi berbagai aspek aplikasi</div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class='separator separator-dashed my-5'></div>
                                            <div class="d-flex fv-row">
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input me-3" name="role" type="radio" value="Developer" id="kt_modal_update_role_option_1" />
                                                    <label class="form-check-label" for="kt_modal_update_role_option_1">
                                                        <div class="fw-bold text-gray-800">Developer</div>
                                                        <div class="text-gray-600">individu yang bertanggung jawab untuk merancang, membangun, menguji, dan memelihara perangkat lunak atau aplikasi</div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class='separator separator-dashed my-5'></div>
                                            <div class="d-flex fv-row">
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input me-3" name="role" type="radio" value="Analiyst" id="kt_modal_update_role_option_2" />
                                                    <label class="form-check-label" for="kt_modal_update_role_option_2">
                                                        <div class="fw-bold text-gray-800">Analis</div>
                                                        <div class="text-gray-600">individu yang bertugas menganalisis data, proses, sistem, dan tren untuk memberikan wawasan dan rekomendasi yang membantu dalam pengambilan keputusan</div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class='separator separator-dashed my-5'></div>
                                            <div class="d-flex fv-row">
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input me-3" name="role" type="radio" value="Support" id="kt_modal_update_role_option_3" />
                                                    <label class="form-check-label" for="kt_modal_update_role_option_3">
                                                        <div class="fw-bold text-gray-800">Support</div>
                                                        <div class="text-gray-600">bantuan yang diberikan kepada pengguna atau pelanggan untuk membantu mereka mengatasi masalah, menjawab pertanyaan, dan memastikan mereka dapat menggunakan produk atau layanan dengan efektif.</div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class='separator separator-dashed my-5'></div>
                                            <div class="d-flex fv-row">
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input me-3" name="role" type="radio" value="Full Stack" id="kt_modal_update_role_option_4" />
                                                    <label class="form-check-label" for="kt_modal_update_role_option_4">
                                                        <div class="fw-bold text-gray-800">Dokumentasi</div>
                                                        <div class="text-gray-600"> semua bentuk catatan tertulis, manual, panduan, dan informasi lainnya yang mendokumentasikan berbagai aspek dari perangkat lunak, sistem, proses, atau produk</div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>                                                                             
                                        <div class="fv-row mb-7">
                                            <label class="required fw-semibold fs-6 mb-2">Password</label>
                                            <input type="password" name="password" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Password" required maxlength="100" />
                                        </div>
                                        <div class="fv-row mb-7">
                                            <label class="required fw-semibold fs-6 mb-2">No. Telp</label>
                                            <input type="text" name="no_telp" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="No. Telp" required maxlength="100" />
                                        </div>
                                    </div>
                                    <div class="text-center pt-10">
                                        <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Reset</button>
                                        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                            <span class="indicator-label">Tambah</span>
                                            <span class="indicator-progress">Please wait... 
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body py-4">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                <thead>
                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">
                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1" />
                            </div>
                        </th>
                        <th class="min-w-125px">Nama</th>
                        <th class="min-w-125px">Password</th>
                        <th class="min-w-125px">Role</th>
                        <th class="min-w-125px">No Telpon</th>
                        <th class="text-end min-w-100px">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 fw-semibold">
                    @foreach ($karyawans as $karyawan)
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="{{ $karyawan->id }}" />
                            </div>
                        </td>
                        <td class="d-flex align-items-center">
                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                <a href="{{ route('karyawans.show', $karyawan->id) }}">
                                    <div class="symbol-label">
                                        @if($karyawan->foto)
                                            <img src="{{ asset('fotos/' . $karyawan->foto) }}" alt="Foto" class="w-100" />
                                        @endif
                                    </div>
                                </a>
                            </div>
                            <div class="d-flex flex-column">
                                <a href="{{ route('karyawans.show', $karyawan->id) }}" class="text-gray-800 text-hover-primary mb-1">{{ $karyawan->nama }}</a>
                                <span>{{$karyawan->username}}</span>
                            </div> 
                        </td>
                        <td>********</td>
                        <td><span class="badge badge-light-info">{{ $karyawan->role }}</span></td>
                        <td>{{ $karyawan->no_telp }}</td>
                        <td class="text-end">
                            <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Aksi 
                            <i class="ki-outline ki-down fs-5 ms-1"></i></a>
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <div class="menu-item px-3">
                                    <a href="/karyawan/{{$karyawan}}/edit" class="menu-link px-3">Edit</a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="/karyawan/{{$karyawan}}/delete" class="menu-link px-3">Hapus</a>
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
@endsection

