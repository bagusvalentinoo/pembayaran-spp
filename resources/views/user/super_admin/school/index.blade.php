@extends('layouts.super_admin')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style type="text/css">
        .fs-16 {
            font-size: 16px !important;
        }

        .fs-18 {
            font-size: 18px !important;
        }

        .fs-20 {
            font-size: 20px !important;
        }
    </style>
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-lg-4 col-md-12 col-sm-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <form id="form-search-school" class="input-group input-group-merge">
                            <button type="submit" class="input-group-text" id="basic-addon-search31">
                                <i class="bx bx-search"></i>
                            </button>
                            <input id="input-search-school" type="text" class="form-control"
                                placeholder="Cari Nama Sekolah atau NPSN Sekolah..."
                                aria-label="Cari Nama Sekolah atau NPSN Sekolah..." aria-describedby="basic-addon-search31">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 mt-4">
                <div class="row d-flex align-items-center justify-content-end">
                    <div class="col-lg-5 col-md-8 col-sm-12 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text" id="basic-addon-search31">
                                        <i class="bx bx-filter"></i>
                                    </span>
                                    <select id="select-filter-type-school" class="form-select">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-auto col-md-auto col-sm-12 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <button type="button" class="btn btn-outline-success rounded-pill" data-bs-toggle="modal"
                                    data-bs-target="#addNewSchoolModal">
                                    Tambah Sekolah Baru
                                </button>

                                {{-- Create School Modal --}}
                                <div class="modal fade" id="addNewSchoolModal" tabindex="-1" aria-hidden="true"
                                    style="display: none;">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addNewSchoolModalTitle">Tambah Sekolah Baru</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="form-create-new-school">
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="select-type-schools" class="form-label">
                                                                Pilih Tipe Sekolah
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <select name="school_type" id="select-type-schools"
                                                                class="form-select">
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <hr class="flex-grow-1 mr-3 border-light">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3">
                                                                <label for="input-npsn-school" class="form-label">
                                                                    NPSN Sekolah
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <input name="school_npsn" type="text"
                                                                    class="form-control" id="input-npsn-school"
                                                                    placeholder="Masukan NPSN Sekolah"
                                                                    aria-describedby="defaultFormControlHelp" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="input-address-school" class="form-label">
                                                                    Alamat Sekolah
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <input name="school_address" type="text"
                                                                    class="form-control" id="input-address-school"
                                                                    placeholder="Masukan Alamat Sekolah"
                                                                    aria-describedby="defaultFormControlHelp" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="input-postal-code-school" class="form-label">
                                                                    Kode Pos
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <input name="school_postal_code" type="text"
                                                                    class="form-control" id="input-postal-code-school"
                                                                    placeholder="Masukan Kode Pos Sekolah"
                                                                    aria-describedby="defaultFormControlHelp" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="input-name-school" class="form-label">
                                                                    Nama Sekolah
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <input name="school_name" type="text"
                                                                    class="form-control" id="input-name-school"
                                                                    placeholder="Masukan Nama Sekolah"
                                                                    aria-describedby="defaultFormControlHelp" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="input-telephone-number-school"
                                                                    class="form-label">
                                                                    Nomor Telepon Sekolah
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <input name="school_telp_number" type="text"
                                                                    class="form-control"
                                                                    id="input-telephone-number-school"
                                                                    placeholder="Masukan Nomor Telepon Sekolah Sekolah"
                                                                    aria-describedby="defaultFormControlHelp" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="input-email-school" class="form-label">
                                                                    Email Sekolah
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <input name="school_email" type="text"
                                                                    class="form-control" id="input-email-school"
                                                                    placeholder="Masukan Email Sekolah"
                                                                    aria-describedby="defaultFormControlHelp" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="input-confirm-email-school"
                                                                    class="form-label">
                                                                    Konfirmasi Email Sekolah
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <input type="text" class="form-control"
                                                                    id="input-confirm-email-school"
                                                                    placeholder="Masukan Konfirmasi Email Sekolah"
                                                                    aria-describedby="defaultFormControlHelp" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-bs-dismiss="modal">
                                                            Tutup
                                                        </button>
                                                        <button id="btn-save-school" type="submit"
                                                            class="btn btn-primary">
                                                            Simpan
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Update School Modal --}}
                                <div class="modal fade" id="editSchoolModal" tabindex="-1" aria-hidden="true"
                                    style="display: none;">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editSchoolModalTitle">Edit Sekolah</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="form-update-school">
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="select-edit-type-school" class="form-label">
                                                                Pilih Tipe Sekolah
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <select name="school_type" id="select-edit-type-school"
                                                                class="form-select">
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <hr class="flex-grow-1 mr-3 border-light">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3">
                                                                <label for="input-edit-npsn-school" class="form-label">
                                                                    NPSN Sekolah
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <input name="npsn" type="text" class="form-control"
                                                                    id="input-edit-npsn-school"
                                                                    placeholder="Masukan NPSN Sekolah"
                                                                    aria-describedby="defaultFormControlHelp" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="input-edit-address-school" class="form-label">
                                                                    Alamat Sekolah
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <input name="address" type="text" class="form-control"
                                                                    id="input-edit-address-school"
                                                                    placeholder="Masukan Alamat Sekolah"
                                                                    aria-describedby="defaultFormControlHelp" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="input-edit-postal-code-school"
                                                                    class="form-label">
                                                                    Kode Pos
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <input name="postal_code" type="text"
                                                                    class="form-control"
                                                                    id="input-edit-postal-code-school"
                                                                    placeholder="Masukan Kode Pos Sekolah"
                                                                    aria-describedby="defaultFormControlHelp" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="input-edit-name-school" class="form-label">
                                                                    Nama Sekolah
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <input name="name" type="text" class="form-control"
                                                                    id="input-edit-name-school"
                                                                    placeholder="Masukan Nama Sekolah"
                                                                    aria-describedby="defaultFormControlHelp" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="input-edit-telephone-number-school"
                                                                    class="form-label">
                                                                    Nomor Telepon Sekolah
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <input name="telp_number" type="text"
                                                                    class="form-control"
                                                                    id="input-edit-telephone-number-school"
                                                                    placeholder="Masukan Nomor Telepon Sekolah Sekolah"
                                                                    aria-describedby="defaultFormControlHelp" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="input-edit-email-school" class="form-label">
                                                                    Email Sekolah
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <input name="email" type="text" class="form-control"
                                                                    id="input-edit-email-school"
                                                                    placeholder="Masukan Email Sekolah"
                                                                    aria-describedby="defaultFormControlHelp" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="input-edit-confirm-email-school"
                                                                    class="form-label">
                                                                    Konfirmasi Email Sekolah
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <input type="text" class="form-control"
                                                                    id="input-edit-confirm-email-school"
                                                                    placeholder="Masukan Konfirmasi Email Sekolah"
                                                                    aria-describedby="defaultFormControlHelp" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-bs-dismiss="modal">
                                                            Tutup
                                                        </button>
                                                        <button id="btn-update-school" type="submit"
                                                            class="btn btn-primary">
                                                            Update
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Detail School Modal --}}
                                <div class="modal fade" id="detailSchoolModal" tabindex="-1" aria-hidden="true"
                                    style="display: none;">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="detailSchoolModalTitle">Detail Sekolah</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row g-0 mb-2">
                                                    <div class="col-12">
                                                        <h6 class="m-0">Nama Sekolah</h6>
                                                        <hr class="flex-grow-1 mr-3 border-light m-0">
                                                    </div>
                                                </div>
                                                <div class="row g-0 mb-4">
                                                    <div class="col-12">
                                                        <span id="name-school" class="text-bold"></span>
                                                    </div>
                                                </div>
                                                <div class="row g-0 mb-2">
                                                    <div class="col-12">
                                                        <h6 class="m-0">NPSN</h6>
                                                        <hr class="flex-grow-1 mr-3 border-light m-0">
                                                    </div>
                                                </div>
                                                <div class="row g-0 mb-4">
                                                    <div class="col-12">
                                                        <span id="npsn-school" class="text-bold"></span>
                                                    </div>
                                                </div>
                                                <div class="row g-0 mb-2">
                                                    <div class="col-12">
                                                        <h6 class="m-0">Alamat</h6>
                                                        <hr class="flex-grow-1 mr-3 border-light m-0">
                                                    </div>
                                                </div>
                                                <div class="row g-0 mb-4">
                                                    <div class="col-12">
                                                        <span id="address-school" class="text-bold"></span>
                                                    </div>
                                                </div>
                                                <div class="row g-0 mb-2">
                                                    <div class="col-12">
                                                        <h6 class="m-0">Nomor Telepon</h6>
                                                        <hr class="flex-grow-1 mr-3 border-light m-0">
                                                    </div>
                                                </div>
                                                <div class="row g-0 mb-4">
                                                    <div class="col-12">
                                                        <span id="telp-number-school" class="text-bold"></span>
                                                    </div>
                                                </div>
                                                <div class="row g-0 mb-2">
                                                    <div class="col-12">
                                                        <h6 class="m-0">Email</h6>
                                                        <hr class="flex-grow-1 mr-3 border-light m-0">
                                                    </div>
                                                </div>
                                                <div class="row g-0 mb-4">
                                                    <div class="col-12">
                                                        <span id="email-school" class="text-bold"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex align-items-center mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th class="fs-18">Tipe Sekolah</th>
                                    <th class="fs-18">Nama Sekolah</th>
                                    <th class="fs-18">NPSN</th>
                                    <th class="fs-18">Alamat</th>
                                    <th class="fs-18">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="table-school-list-body" class="table-border-bottom-0 fs-16">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/JQuery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert/sweetalert2@11.js') }}"></script>
    <script src="{{ asset('assets/js/JQuery/loading.overlay.jquery.min.js') }}"></script>
    <script type="application/javascript">
        var school_type_id

        fectAllSchools()
        fetchAllSchoolTypes()

        function fetchAllSchoolTypes()
        {
            $.ajax({
                type: 'GET',
                url: "{{ route('api.super-admin.school-type.index') }}",
                contentType: "application/json",
                dataType: 'json',
                success: function (response) {
                    if (response.status_code === 200) {
                        const schoolTypes = response.data.school_types
                                                
                        $('#select-type-schools').empty()
                        $('#select-type-schools').append(`<option>-- Pilih Tipe Sekolah --</option>`)
                        schoolTypes.forEach(function (schoolType, index) {
                            $('#select-type-schools').append(`<option value="${schoolType.id}">${schoolType.name}</option>`)
                        })
                        $('#select-edit-type-school').empty()
                        $('#select-edit-type-school').append(`<option>-- Pilih Tipe Sekolah --</option>`)
                        schoolTypes.forEach(function (schoolType, index) {
                            $('#select-edit-type-school').append(`<option value="${schoolType.id}">${schoolType.name}</option>`)
                        })

                        $('#select-filter-type-school').empty()
                        $('#select-filter-type-school').append(`<option value="">-- Filter --</option>`)
                        schoolTypes.forEach(function (schoolType, index) {
                            $('#select-filter-type-school').append(`<option value="${schoolType.id}">Berdasarkan Tipe Sekolah ${schoolType.name}</option>`)
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: response.message
                        })
                    }
                },
                error: function (response) {
                    const responseJson = response.responseJSON

                    Swal.fire({
                        icon: 'error',
                        title: responseJson.message
                    })
                }
            })
        }

        function fectAllSchools()
        {
            $.LoadingOverlay("show", {
                image: "",
                fontawesome: "fa fa-spinner fa-spin"
            })

            $.ajax({
                type: 'GET',
                url: "{{ route('api.super-admin.school.index') }}",
                contentType: "application/json",
                dataType: 'json',
                success: function (response) {
                    if (response.status_code === 200) {
                        const schools = response.data.schools
                        
                        if(schools.length === 0){
                            let htmlTableBody = ''

                            htmlTableBody += `<tr>`
                            htmlTableBody += `<td colspan="5">Data masih kosong</td>`
                            htmlTableBody += `</tr>`

                            $('#table-school-list-body').append(htmlTableBody)
                        }else{
                            $('tbody').html("")
                            let htmlTableBody = ''

                            schools.forEach(function (school, index) {
                                htmlTableBody += `<tr>`
                                htmlTableBody += `<td>${index + 1}</td>`
                                htmlTableBody += `<td>${school.school_type.name}</td>`
                                htmlTableBody += `<td>${school.name}</td>`
                                htmlTableBody += `<td>${school.npsn}</td>`
                                htmlTableBody += `<td>${school.address}</td>`
                                htmlTableBody += `<td>`
                                htmlTableBody += `<div class="dropdown">`
                                htmlTableBody += `<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">`
                                htmlTableBody += `<i class="bx bx-dots-vertical-rounded"></i>`
                                htmlTableBody += `</button>`
                                htmlTableBody += `<div class="dropdown-menu" style="">`
                                htmlTableBody += `<button id="btn-detail-school" type="button" class="dropdown-item" value="${school.id}" data-bs-toggle="modal" data-bs-target="#detailSchoolModal"><i class='bx bx-link-external'></i> Detail</button>`
                                htmlTableBody += `<button id="btn-edit-school" type="button" class="dropdown-item" value="${school.id}"  data-bs-toggle="modal" data-bs-target="#editSchoolModal"><i class="bx bx-edit-alt me-1"></i> Edit</button>`
                                htmlTableBody += `<button id="btn-delete-school" type="button" class="dropdown-item" value="${school.id}"><i class="bx bx-trash me-1"></i> Delete</button>`
                                htmlTableBody += `</div>`
                                htmlTableBody += `</div>`
                                htmlTableBody += `</td>`
                                htmlTableBody += `</tr>`
                            })

                            $('#table-school-list-body').append(htmlTableBody)
                        }
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: response.message
                        })
                    }
                },
                error: function (response) {
                    const responseJson = response.responseJSON

                    Swal.fire({
                        icon: 'error',
                        title: responseJson.message
                    })
                },

                complete: function () {
                    $.LoadingOverlay("hide")
                }
            })
        }

        $('#select-filter-type-school').on('change', function(event) {
            event.preventDefault()

            $.LoadingOverlay("show", {
                image: "",
                fontawesome: "fa fa-spinner fa-spin"
            })

            $.ajax({
                type: 'GET',
                url: "{{ route('api.super-admin.school.index') }}",
                data: {
                    filter: $(this).val()
                },
                success: function (response) {
                    if (response.status_code === 200) {
                        const schools = response.data.schools

                        if(schools.length === 0){
                            $('#table-school-list-body').html("")
                            let htmlTableBody = ''

                            htmlTableBody += `<tr>`
                            htmlTableBody += `<td class="text-center" colspan="6">Data tidak ditemukan</td>`
                            htmlTableBody += `</tr>`

                            $('#table-school-list-body').append(htmlTableBody)
                        }else{
                            $('#table-school-list-body').html("")
                            let htmlTableBody = ''

                            schools.forEach(function (school, index) {
                                htmlTableBody += `<tr>`
                                htmlTableBody += `<td>${index + 1}</td>`
                                htmlTableBody += `<td>${school.school_type.name}</td>`
                                htmlTableBody += `<td>${school.name}</td>`
                                htmlTableBody += `<td>${school.npsn}</td>`
                                htmlTableBody += `<td>${school.address}</td>`
                                htmlTableBody += `<td>`
                                htmlTableBody += `<div class="dropdown">`
                                htmlTableBody += `<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">`
                                htmlTableBody += `<i class="bx bx-dots-vertical-rounded"></i>`
                                htmlTableBody += `</button>`
                                htmlTableBody += `<div class="dropdown-menu" style="">`
                                htmlTableBody += `<button id="btn-edit-school" type="button" class="dropdown-item" value="${school.id}"  data-bs-toggle="modal" data-bs-target="#editSchoolModal"><i class="bx bx-edit-alt me-1"></i> Edit</button>`
                                htmlTableBody += `<button id="btn-delete-school" type="button" class="dropdown-item" value="${school.id}"><i class="bx bx-trash me-1"></i> Delete</button>`
                                htmlTableBody += `</div>`
                                htmlTableBody += `</div>`
                                htmlTableBody += `</td>`
                                htmlTableBody += `</tr>`
                            })

                            $('#table-school-list-body').append(htmlTableBody)
                        }
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: response.message
                        })
                    }
                },
                error: function (response) {
                    const responseJson = response.responseJSON

                    Swal.fire({
                        icon: 'error',
                        title: responseJson.message
                    })
                },

                complete: function () {
                    $.LoadingOverlay("hide")
                }
            })
        })

        $('#form-search-school').on('submit', function (event) {
            event.preventDefault()

            const inputSearchSchool = $('#input-search-school')

            $.LoadingOverlay("show", {
                image: "",
                fontawesome: "fa fa-spinner fa-spin"
            })

            $.ajax({
                type: 'GET',
                url: "{{ route('api.super-admin.school.index') }}",
                data: {
                    search: inputSearchSchool.val()
                },
                success: function (response) {
                    if (response.status_code === 200) {
                        const schools = response.data.schools

                        if(schools.length === 0){
                            $('#table-school-list-body').html("")
                            let htmlTableBody = ''

                            htmlTableBody += `<tr>`
                            htmlTableBody += `<td class="text-center" colspan="6">Data tidak ditemukan</td>`
                            htmlTableBody += `</tr>`

                            $('#table-school-list-body').append(htmlTableBody)
                        }else{
                            $('#table-school-list-body').html("")
                            let htmlTableBody = ''

                            schools.forEach(function (school, index) {
                                htmlTableBody += `<tr>`
                                htmlTableBody += `<td>${index + 1}</td>`
                                htmlTableBody += `<td>${school.school_type.name}</td>`
                                htmlTableBody += `<td>${school.name}</td>`
                                htmlTableBody += `<td>${school.npsn}</td>`
                                htmlTableBody += `<td>${school.address}</td>`
                                htmlTableBody += `<td>`
                                htmlTableBody += `<div class="dropdown">`
                                htmlTableBody += `<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">`
                                htmlTableBody += `<i class="bx bx-dots-vertical-rounded"></i>`
                                htmlTableBody += `</button>`
                                htmlTableBody += `<div class="dropdown-menu" style="">`
                                htmlTableBody += `<button id="btn-detail-school" type="button" class="dropdown-item" value="${school.id}" data-bs-toggle="modal" data-bs-target="#detailSchoolModal"><i class='bx bx-link-external'></i> Detail</button>`
                                htmlTableBody += `<button id="btn-edit-school" type="button" class="dropdown-item" value="${school.id}" data-bs-toggle="modal" data-bs-target="#editSchoolModal"><i class="bx bx-edit-alt me-1"></i> Edit</button>`
                                htmlTableBody += `<button id="btn-delete-school" type="button" class="dropdown-item" value="${school.id}"><i class="bx bx-trash me-1"></i> Delete</button>`
                                htmlTableBody += `</div>`
                                htmlTableBody += `</div>`
                                htmlTableBody += `</td>`
                                htmlTableBody += `</tr>`
                            })

                            $('#table-school-list-body').append(htmlTableBody)
                        }
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: response.message
                        })
                    }
                },
                error: function (response) {
                    const responseJson = response.responseJSON

                    Swal.fire({
                        icon: 'error',
                        title: responseJson.message
                    })
                },

                complete: function () {
                    $.LoadingOverlay("hide")
                }
            })
        })

        $('#form-create-new-school').on('submit', function (event) {
            event.preventDefault()
            
            const btnSave = $('#btn-save-school')

            btnSave.attr("disabled", true)
            btnSave.html('Simpan...')

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            
            $.LoadingOverlay("show", {
                image: "",
                fontawesome: "fa fa-spinner fa-spin"
            })

            $.ajax({
                type: 'POST',
                url: "{{ route('api.super-admin.school.store') }}",
                data: $(this).serialize(),
                success: function (response) {
                    if (response.status_code === 201) {
                        $('#addNewSchoolModal').find('input').val('')
                        $('#addNewSchoolModal').modal('hide')
                        Swal.fire({
                            icon: 'success',
                            title: response.message
                        }).then(function(){
                            fectAllSchools()
                        })
                    } else {
                        $('#addNewSchoolModal').modal('hide')
                        Swal.fire({
                            icon: 'error',
                            title: response.message
                        })
                    }
                },
                error: function (response) {
                    const responseJson = response.responseJSON

                    if (response.status === 422) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Validasi Error',
                            text: responseJson.message
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: responseJson.message
                        })
                    }
                },

                complete: function () {
                    $.LoadingOverlay("hide")
                }
            })

            btnSave.html('Simpan')
            btnSave.removeAttr("disabled")
        })

        $(document).on('click', '#btn-detail-school', function (event) {
            event.preventDefault()

            const schoolId = $(this).val()
            const textNameSchool = $('#name-school')
            const textNpsnSchool = $('#npsn-school')
            const textAddressSchool = $('#address-school')
            const textTelpNumberSchool = $('#telp-number-school')
            const textEmailSchool = $('#email-school')

            $.LoadingOverlay("show", {
                image: "",
                fontawesome: "fa fa-spinner fa-spin"
            })

            $.ajax({
                type: 'GET',
                url: "{{ route('api.super-admin.school.show', ':id') }}".replace(':id', schoolId),
                contentType: "application/json",
                dataType: 'json',
                success: function (response) {
                    if (response.status_code === 200) {
                        const school = response.data.school
                        
                        textNameSchool.text(school.name)
                        textNpsnSchool.text(school.npsn)
                        textAddressSchool.text(school.address)
                        textTelpNumberSchool.text(school.telp_number)
                        textEmailSchool.text(school.email)
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: response.message
                        })
                    }
                },
                error: function (response) {
                    const responseJson = response.responseJSON

                    if (response.status === 422) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Validasi Error',
                            text: responseJson.message
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: responseJson.message
                        })
                    }
                },

                complete: function () {
                    $.LoadingOverlay("hide")
                }
            })
        })

        $(document).on('click', '#btn-edit-school', function (event){
            event.preventDefault()

            school_type_id = $(this).val()
            const inputEmailConfirm = $('#input-edit-confirm-email-school')
            const inputEmail = $('#input-edit-email-school')
            const inputTelephoneNumber = $('#input-edit-telephone-number-school')
            const inputNameSchool = $('#input-edit-name-school')
            const inputPostalCode = $('#input-edit-postal-code-school')
            const inputAddress = $('#input-edit-address-school')
            const inputNpsn = $('#input-edit-npsn-school')
            const selectEditTypeSchool = $('#select-edit-type-school')

            $.LoadingOverlay("show", {
                image: "",
                fontawesome: "fa fa-spinner fa-spin"
            })

            $.ajax({
                type: 'GET',
                url: "{{ route('api.super-admin.school.show', ':id') }}".replace(':id', school_type_id),
                contentType: "application/json",
                dataType: 'json',
                success: function (response) {
                    if (response.status_code === 200) {
                        const school = response.data.school
                        
                        selectEditTypeSchool.val(school.school_type_id)
                        inputNpsn.val(school.npsn)
                        inputAddress.val(school.address)
                        inputPostalCode.val(school.postal_code)
                        inputNameSchool.val(school.name)
                        inputTelephoneNumber.val(school.telp_number)
                        inputEmail.val(school.email)
                        inputEmailConfirm.val(school.email)
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: response.message
                        })
                    }
                },
                error: function (response) {
                    const responseJson = response.responseJSON

                    if (response.status === 422) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Validasi Error',
                            text: responseJson.message
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: responseJson.message
                        })
                    }
                },

                complete: function () {
                    $.LoadingOverlay("hide")
                }
            })
        })

        $('#form-update-school').on('submit', function (event) {
            event.preventDefault()

            const btnUpdateSchool = $('#btn-update-school')
            const inputEmail = $('#input-edit-email-school')
            const inputTelephoneNumber = $('#input-edit-telephone-number-school')
            const inputNameSchool = $('#input-edit-name-school')
            const inputPostalCode = $('#input-edit-postal-code-school')
            const inputAddress = $('#input-edit-address-school')
            const inputNpsn = $('#input-edit-npsn-school')
            const selectEditTypeSchool = $('#select-edit-type-school')

            btnUpdateSchool.attr("disabled", true)
            btnUpdateSchool.html('Update...')

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })

            $.LoadingOverlay("show", {
                image: "",
                fontawesome: "fa fa-spinner fa-spin"
            })

            $.ajax({
                type: 'PUT',
                url: "{{ route('api.super-admin.school.update', ':id') }}".replace(':id', school_type_id),
                contentType: "application/json",
                data: JSON.stringify({
                    school_type: selectEditTypeSchool.val(),
                    npsn: inputNpsn.val(),
                    address: inputAddress.val(),
                    postal_code: inputPostalCode.val(),
                    name: inputNameSchool.val(),
                    telp_number: inputTelephoneNumber.val(),
                    email: inputEmail.val(),
                }),
                dataType: 'json',
                success: function (response) {
                    if (response.status_code === 200) {
                        $('#editSchoolModal').find('input').val('')
                        $('#editSchoolModal').modal('hide')
                        Swal.fire({
                            icon: 'success',
                            title: response.message
                        }).then(function(){
                            fectAllSchools()
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: response.message
                        })
                    }
                },
                error: function (response) {
                    const responseJson = response.responseJSON

                    if (response.status === 422) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Validasi Error',
                            text: responseJson.message
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: responseJson.message
                        })
                    }
                },
                
                complete: function () {
                    $.LoadingOverlay("hide")
                }
            })

            btnUpdateSchool.html('Update')
            btnUpdateSchool.removeAttr("disabled")
        })

        $(document).on('click', '#btn-delete-school', function(event) {
            event.preventDefault()
            
            const btnDeleteSchool = $(this)

            btnDeleteSchool.attr("disabled", true)
            btnDeleteSchool.html('Hapus...')

            Swal.fire({
                title: 'Konfirmasi Hapus',
                text: "Apakah yakin ingin menghapus data ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#CF2F0D',
                cancelButtonColor: '#8B8B8B',
                confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    })

                    $.LoadingOverlay("show", {
                        image: "",
                        fontawesome: "fa fa-spinner fa-spin"
                    })

                    $.ajax({
                        type: 'DELETE',
                        url: "{{ route('api.super-admin.school.destroy') }}",
                        data: JSON.stringify({
                            id : btnDeleteSchool.val()
                        }),
                        contentType: "application/json",
                        dataType: 'json',
                        success: function (response) {
                            if (response.status_code === 200) {
                                Swal.fire({
                                    icon: 'success',
                                    title: response.message
                                }).then(function(){
                                    fectAllSchools()
                                })
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: response.message
                                })
                            }
                        },
                        error: function (response) {
                            const responseJson = response.responseJSON

                            if (response.status === 422) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Validasi Error',
                                    text: responseJson.message
                                })
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: responseJson.message
                                })
                            }
                        },
                        
                        complete: function () {
                            $.LoadingOverlay("hide")
                        }
                    })
                }
            })

            btnDeleteSchool.html('Hapus')
            btnDeleteSchool.removeAttr("disabled")
        })
    </script>
@endsection
