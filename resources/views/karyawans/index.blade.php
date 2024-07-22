@extends('layout.master')
@section('page-title', 'Karyawan')
@section('breadcrumb', 'Karyawan')
@section('content')
<div class="row">
    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <div class="d-flex align-items-center position-relative my-1">
                    <i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
                    <input type="text" id="searchKaryawan" class="form-control form-control-solid w-250px ps-13" placeholder="Cari Karyawan" />
                </div>
            </div>
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
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
                                                <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{ old('gambar') ? asset('gambars/' . old('gambar')) : 'assets/media/svg/files/blank-image.svg' }}"></div>
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
                                                    <input class="form-check-input me-3" name="role" type="radio" value="Analyst" id="kt_modal_update_role_option_2" />
                                                    <label class="form-check-label" for="kt_modal_update_role_option_2">
                                                        <div class="fw-bold text-gray-800">Analyst</div>
                                                        <div class="text-gray-600">individu yang bertanggung jawab untuk menganalisis data, mengidentifikasi tren, dan memberikan wawasan yang mendukung pengambilan keputusan bisnis</div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class='separator separator-dashed my-5'></div>
                                            <div class="d-flex fv-row">
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input me-3" name="role" type="radio" value="Support" id="kt_modal_update_role_option_3" />
                                                    <label class="form-check-label" for="kt_modal_update_role_option_3">
                                                        <div class="fw-bold text-gray-800">Support</div>
                                                        <div class="text-gray-600">tim dukungan teknis yang bertugas membantu pengguna akhir dalam mengatasi masalah teknis atau pertanyaan terkait produk atau layanan yang mereka gunakan</div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class='separator separator-dashed my-5'></div>
                                            <div class="d-flex fv-row">
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input me-3" name="role" type="radio" value="Project Manager" id="kt_modal_update_role_option_4" />
                                                    <label class="form-check-label" for="kt_modal_update_role_option_4">
                                                        <div class="fw-bold text-gray-800">Project Manager</div>
                                                        <div class="text-gray-600">Memimpin tim proyek dan memastikan kolaborasi yang efektif</div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="fv-row mb-7 mt-4">
                                                <label class="required fw-semibold fs-6 mb-2">Password</label>
                                                <input type="password" name="password" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Password" required maxlength="100" />
                                            </div>
                                            <div class="fv-row mb-7">
                                                <label class="required fw-semibold fs-6 mb-2">No. Telp</label>
                                                <input type="number" name="no_telp" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="No. Telp" required maxlength="100" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center pt-15">
                                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Discard</button>
                                        <button type="submit" class="btn btn-primary">
                                            <span class="indicator-label">Submit</span>
                                            <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="kt_modal_edit_user" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <div class="modal-content">
                            <div class="modal-header" id="kt_modal_edit_user_header">
                                <h2 class="fw-bold">Edit Karyawan</h2>
                                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                </div>
                            </div>
                            <div class="modal-body px-5 my-7">
                                <form id="kt_modal_edit_user_form" class="form" action="update" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" id="edit_user_id">
                                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_edit_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_edit_user_header" data-kt-scroll-wrappers="#kt_modal_edit_user_scroll" data-kt-scroll-offset="300px">
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
                                                <div class="image-input-wrapper w-125px h-125px" id="edit_image_preview" style="background-image: url('assets/media/svg/files/blank-image.svg')"></div>
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
                                            <input type="text" name="nama" id="edit_nama" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name" required maxlength="100" />
                                        </div>
                                        <div class="fv-row mb-7">
                                            <label class="required fw-semibold fs-6 mb-2">Username</label>
                                            <input type="text" name="username" id="edit_username" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Username" />
                                        </div>
                                        <div class="mb-5">
                                            <label class="required fw-semibold fs-6 mb-5">Role</label>
                                            <div class="d-flex fv-row">
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input me-3" name="role" type="radio" value="Admin" id="edit_role_admin" />
                                                    <label class="form-check-label" for="edit_role_admin">
                                                        <div class="fw-bold text-gray-800">Admin</div>
                                                        <div class="text-gray-600"> pengguna yang memiliki hak akses tertinggi dan bertanggung jawab untuk mengelola dan mengawasi berbagai aspek aplikasi</div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class='separator separator-dashed my-5'></div>
                                            <div class="d-flex fv-row">
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input me-3" name="role" type="radio" value="Developer" id="edit_role_developer" />
                                                    <label class="form-check-label" for="edit_role_developer">
                                                        <div class="fw-bold text-gray-800">Softwer Developer</div>
                                                        <div class="text-gray-600">individu yang bertanggung jawab untuk merancang, membangun, menguji, dan memelihara perangkat lunak atau aplikasi</div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class='separator separator-dashed my-5'></div>
                                            <div class="d-flex fv-row">
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input me-3" name="role" type="radio" value="Analyst" id="edit_role_analyst" />
                                                    <label class="form-check-label" for="edit_role_analyst">
                                                        <div class="fw-bold text-gray-800">Analyst</div>
                                                        <div class="text-gray-600">individu yang bertanggung jawab untuk menganalisis data, mengidentifikasi tren, dan memberikan wawasan yang mendukung pengambilan keputusan bisnis</div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class='separator separator-dashed my-5'></div>
                                            <div class="d-flex fv-row">
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input me-3" name="role" type="radio" value="Support" id="edit_role_support" />
                                                    <label class="form-check-label" for="edit_role_support">
                                                        <div class="fw-bold text-gray-800">Support</div>
                                                        <div class="text-gray-600">tim dukungan teknis yang bertugas membantu pengguna akhir dalam mengatasi masalah teknis atau pertanyaan terkait produk atau layanan yang mereka gunakan</div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class='separator separator-dashed my-5'></div>
                                            <div class="d-flex fv-row">
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input me-3" name="role" type="radio" value="Project Manager" id="edit_role_trial" />
                                                    <label class="form-check-label" for="edit_role_trial">
                                                        <div class="fw-bold text-gray-800">Project Manager</div>
                                                        <div class="text-gray-600">Memimpin tim proyek dan memastikan kolaborasi yang efektif.</div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="fv-row mb-7">
                                                <label class="required fw-semibold fs-6 mb-2 mt-4">Password</label>
                                                <input type="password" name="password" id="edit_password" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Password" required maxlength="100" />
                                            </div>
                                            <div class="fv-row mb-7">
                                                <label class="required fw-semibold fs-6 mb-2">No. Telp</label>
                                                <input type="number" name="no_telp" id="edit_no_telp" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="No. Telp" required maxlength="100" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center pt-15">
                                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Discard</button>
                                        <button type="submit" class="btn btn-primary">
                                            <span class="indicator-label">Submit</span>
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
        <div class="card-body pt-0">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="karyawanTable" id="kt_table_users">
                <thead>
                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                        <th class="min-w-125px">Nama</th>
                        <th class="min-w-125px">Password</th>
                        <th class="min-w-125px">Role</th>
                        <th class="min-w-125px">No Telpon</th>
                        <th class="text-end min-w-100px">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 fw-semibold">
                    @foreach($karyawans as $karyawan)
                    <tr>
                        <td class="d-flex align-items-center">
                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                <a href="{{ route('karyawans.show', ['id' => $karyawan->id]) }}">
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
                        <td>
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
                        </td>                        
                        <td>{{ $karyawan->no_telp }}</td>
                        <td class="text-end">
                            <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions 
                            <i class="ki-outline ki-down fs-5 ms-1"></i></a>
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <div class="menu-item px-3">
                                    <a href="#" class="btn  menu-link px-3 btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_user" onclick="editUser('{{ $karyawan->id }}', '{{ $karyawan->nama }}', '{{ $karyawan->username }}', '{{ $karyawan->password }}', '{{ $karyawan->role }}', '{{ $karyawan->foto }}', '{{ $karyawan->no_telp }}')">
                                     Edit
                                    </a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="{{route('karyawans.destroy', $karyawan->id)}}" class="menu-link px-3" data-kt-users-table-filter="delete_row">Delete</a>
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

<script>
    function editUser(id, nama, username, role, foto, no_telp, password) {
        document.getElementById('edit_user_id').value = id;
        document.getElementById('edit_nama').value = nama;
        document.getElementById('edit_username').value = username;
        document.getElementById('edit_no_telp').value = no_telp;
        document.getElementById('edit_password').value = password;
        document.querySelector('#kt_modal_edit_user_form').setAttribute('action', "{{route('karyawans.update', '')}}"+'/'+id);
        document.getElementById('edit_image_preview').style.backgroundImage = `url('/fotos/${foto}')`;

        console.log(no_telp)
        
        if (role === 'Admin') {
            document.getElementById('edit_role_admin').checked = true;
        } else if (role === 'Developer') {
            document.getElementById('edit_role_developer').checked = true;
        } else if (role === 'Analyst') {
            document.getElementById('edit_role_analyst').checked = true;
        } else if (role === 'Support') {
            document.getElementById('edit_role_support').checked = true;
        } else if (role === 'Trial') {
            document.getElementById('edit_role_trial').checked = true;
        }
    }

    document.getElementById('searchKaryawan').addEventListener('keyup', function() {
        var searchTerm = this.value.toLowerCase();
        var table = document.getElementById('karyawanTable');
        var rows = table.getElementsByTagName('tr');
        for (var i = 1; i < rows.length; i++) {
            var cells = rows[i].getElementsByTagName('td');
            var found = false;
            for (var j = 0; j < cells.length; j++) {
                if (cells[j].innerText.toLowerCase().indexOf(searchTerm) > -1) {
                    found = true;
                    break;
                }
            }
            rows[i].style.display = found ? '' : 'none';
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('kt_modal_add_user_form');

    form.addEventListener('submit', function(event) {
        var valid = true;

        var nama = form.querySelector('input[name="nama"]');
        if (nama.value.trim() === '') {
            alert('Nama harus diisi.');
            valid = false;
        }

        var username = form.querySelector('input[name="username"]');
        if (username.value.trim() === '') {
            alert('Username harus diisi.');
            valid = false;
        }

        var password = form.querySelector('input[name="password"]');
        if (password.value.trim() === '') {
            alert('Password harus diisi.');
            valid = false;
        }

        var noTelp = form.querySelector('input[name="no_telp"]');
        if (noTelp.value.trim() === '') {
            alert('No. Telp harus diisi.');
            valid = false;
        }

        if (!valid) {
            event.preventDefault();
        }
    });
});

</script>
@endsection
