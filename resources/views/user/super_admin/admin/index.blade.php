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

        .p-circle {
            padding: 6px 10px 10px 10px !important;
        }

        .w-250px {
            width: 250px !important;
        }
    </style>
@endsection

@section('content')
    {{-- Detail Admin Modal --}}
    <div class="modal fade" id="detailAdminModal" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailAdminModalTitle">Detail Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-0 mb-4">
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center">
                                <div id="img-container">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-0 mb-2">
                        <div class="col-12">
                            <h6 class="m-0">Sekolah</h6>
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
                            <h6 class="m-0">Informasi Admin</h6>
                            <hr class="flex-grow-1 mr-3 border-light m-0">
                        </div>
                    </div>
                    <div class="row g-0">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="name-admin" class="form-label">Nama</label>
                                <span id="name-admin" class="form-control"></span>
                            </div>
                            <div class="mb-3">
                                <label for="email-admin" class="form-label">Email</label>
                                <span id="email-admin" class="form-control"></span>
                            </div>
                            <div class="mb-3">
                                <label for="phone-number-admin" class="form-label">Nomor Telepon</label>
                                <span id="phone-number-admin" class="form-control"></span>
                            </div>
                            <div class="mb-3">
                                <label for="address-admin" class="form-label">Alamat</label>
                                <span id="address-admin" class="form-control"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-lg-4 col-md-12 col-sm-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <form id="form-search-admin" class="input-group input-group-merge">
                            <button type="submit" class="input-group-text" id="basic-addon-search31">
                                <i class="bx bx-search"></i>
                            </button>
                            <input id="input-search-admin" type="text" class="form-control"
                                placeholder="Cari Nama Admin..." aria-label="Cari Nama Admin..."
                                aria-describedby="basic-addon-search31">
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
                                    <select id="select-filter-school-type" class="form-select">
                                        <option>-- Filter --</option>
                                    </select>
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
                                    <th class="fs-18">Nama Admin</th>
                                    <th class="fs-18">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="table-admin-list-body" class="table-border-bottom-0 fs-16">
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
        fetchAllSchoolTypes()
        fetchAllAdmins()

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
                        
                        $('#select-filter-school-type').empty()
                        $('#select-filter-school-type').append(`<option value="">-- Pilih Tipe Sekolah --</option>`)
                        schoolTypes.forEach(function (schoolType, index) {
                            $('#select-filter-school-type').append(`<option value="${schoolType.id}">${schoolType.name}</option>`)
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

        function fetchAllAdmins()
        {
            $.LoadingOverlay("show", {
                image: "",
                fontawesome: "fa fa-spinner fa-spin"
            })

            $.ajax({
                type: 'GET',
                url: "{{ route('api.super-admin.admin.index') }}",
                contentType: "application/json",
                dataType: 'json',
                success: function (response) {
                    if (response.status_code === 200) {
                        const admins = response.data.admins
                        
                        if(admins.length === 0){
                            $('#table-admin-list-body').html("")
                            let htmlTableBody = ''

                            htmlTableBody += `<tr>`
                            htmlTableBody += `<td colspan="4">Data masih kosong</td>`
                            htmlTableBody += `</tr>`

                            $('#table-admin-list-body').append(htmlTableBody)
                        }else{
                            $('table-admin-list-body').html("")
                            let htmlTableBody = ''

                            admins.forEach(function (admin, index) {
                                htmlTableBody += `<tr>`
                                htmlTableBody += `<td>${index + 1}</td>`
                                htmlTableBody += `<td>${admin.school.school_type.name}</td>`
                                htmlTableBody += `<td>${admin.school.name}</td>`
                                htmlTableBody += `<td>${admin.name}</td>`
                                htmlTableBody += `<td>`
                                htmlTableBody += `<button id="btn-detail" type="button" class="btn btn-outline-primary rounded-circle p-circle" value="${admin.id}" data-bs-toggle="modal" data-bs-target="#detailAdminModal">`
                                htmlTableBody += `<i class='bx bx-link-external'></i>`
                                htmlTableBody += `</button>`
                                htmlTableBody += `</td>`
                                htmlTableBody += `</tr>`
                            })

                            $('#table-admin-list-body').append(htmlTableBody)
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

        $('#form-search-admin').on('submit', function (event) {
            event.preventDefault()

            const inputSearchAdmin = $('#input-search-admin')

            $.LoadingOverlay("show", {
                image: "",
                fontawesome: "fa fa-spinner fa-spin"
            })

            $.ajax({
                type: 'GET',
                url: "{{ route('api.super-admin.admin.index') }}",
                data: {
                    search: inputSearchAdmin.val()
                },
                success: function (response) {
                    if (response.status_code === 200) {
                        const admins = response.data.admins

                        if(admins.length === 0){
                            $('#table-admin-list-body').html("")
                            let htmlTableBody = ''

                            htmlTableBody += `<tr>`
                            htmlTableBody += `<td class="text-center" colspan="5">Data tidak ditemukan</td>`
                            htmlTableBody += `</tr>`

                            $('#table-admin-list-body').append(htmlTableBody)
                        }else{
                            $('#table-admin-list-body').html("")
                            let htmlTableBody = ''

                            admins.forEach(function (admin, index) {
                                htmlTableBody += `<tr>`
                                htmlTableBody += `<td>${index + 1}</td>`
                                htmlTableBody += `<td>${admin.school.school_type.name}</td>`
                                htmlTableBody += `<td>${admin.school.name}</td>`
                                htmlTableBody += `<td>${admin.name}</td>`
                                htmlTableBody += `<td>`
                                htmlTableBody += `<button id="btn-detail" type="button" class="btn btn-outline-primary rounded-circle p-circle" value="${admin.id}" data-bs-toggle="modal" data-bs-target="#detailAdminModal">`
                                htmlTableBody += `<i class='bx bx-link-external'></i>`
                                htmlTableBody += `</button>`
                                htmlTableBody += `</td>`
                                htmlTableBody += `</tr>`
                            })

                            $('#table-admin-list-body').append(htmlTableBody)
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

        $(document).on('click', '#btn-detail', function (event) {
            event.preventDefault()
            
            const adminId = $(this).val()
            const textSchoolAdmin = $('#name-school')
            const textNameAdmin = $('#name-admin')
            const textEmailAdmin = $('#email-admin')
            const textPhoneNumberAdmin = $('#phone-number-admin')
            const textAddressAdmin = $('#address-admin')

            $.LoadingOverlay("show", {
                image: "",
                fontawesome: "fa fa-spinner fa-spin"
            })

            $.ajax({
                type: 'GET',
                url: "{{ route('api.super-admin.show', ':id') }}".replace(':id', adminId),
                contentType: "application/json",
                dataType: 'json',
                success: function (response) {
                    if (response.status_code === 200) {
                        const admin = response.data.admin
                        let imgContainerBody = `<img class="card-img w-250px" src="{{ Storage::url('${admin.user.photo_profile}') }}" alt="Admin Foto Profile">`;

                        textSchoolAdmin.text(admin.school.name)
                        textNameAdmin.text(admin.name)
                        textEmailAdmin.text(admin.user.email)
                        textPhoneNumberAdmin.text(admin.phone_number)
                        textAddressAdmin.text(admin.address)
                        
                        $('#img-container').html("")
                        $('#img-container').html(imgContainerBody)
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

        $('#select-filter-school-type').on('change', function (event) {
            event.preventDefault()
            
            const selectTypeSchoolId = $(this)

            $.LoadingOverlay("show", {
                image: "",
                fontawesome: "fa fa-spinner fa-spin"
            })

            $.ajax({
                type: 'GET',
                url: "{{ route('api.super-admin.admin.index') }}",
                data: {
                    filter: selectTypeSchoolId.val()
                },
                success: function (response) {
                    if (response.status_code === 200) {
                        const admins = response.data.admins

                        if(admins.length === 0){
                            $('#table-admin-list-body').html("")
                            let htmlTableBody = ''

                            htmlTableBody += `<tr>`
                            htmlTableBody += `<td class="text-center" colspan="5">Data tidak ditemukan</td>`
                            htmlTableBody += `</tr>`

                            $('#table-admin-list-body').append(htmlTableBody)
                        }else{
                            $('#table-admin-list-body').html("")
                            let htmlTableBody = ''

                            admins.forEach(function (admin, index) {
                                htmlTableBody += `<tr>`
                                htmlTableBody += `<td>${index + 1}</td>`
                                htmlTableBody += `<td>${admin.school.school_type.name}</td>`
                                htmlTableBody += `<td>${admin.school.name}</td>`
                                htmlTableBody += `<td>${admin.name}</td>`
                                htmlTableBody += `<td>`
                                htmlTableBody += `<button id="btn-detail" type="button" class="btn btn-outline-primary rounded-circle p-circle" value="${admin.id}" data-bs-toggle="modal" data-bs-target="#detailAdminModal">`
                                htmlTableBody += `<i class='bx bx-link-external'></i>`
                                htmlTableBody += `</button>`
                                htmlTableBody += `</td>`
                                htmlTableBody += `</tr>`
                            })

                            $('#table-admin-list-body').append(htmlTableBody)
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
    </script>
@endsection
