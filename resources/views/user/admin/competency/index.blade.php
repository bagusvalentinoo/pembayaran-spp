@extends('layouts.admin')

@section('style')
    {{-- Font Awesome Icon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style type="text/css">
        .fs-18 {
            font-size: 18px !important;
        }

        .fs-20 {
            font-size: 20px !important;
        }

        .fs-22 {
            font-size: 22px !important;
        }

        .fs-25 {
            font-size: 25px !important;
        }

        .fs-28 {
            font-size: 28px !important;
        }

        .fs-30 {
            font-size: 30px !important;
        }

        .p-button-icon {
            padding: 5px 8px 8px 8px !important;
        }
    </style>
@endsection

@section('content')
    <div class="modal fade" id="addCompetencyModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-20" id="addCompetencyModalTitle">Tambah Kompetensi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-create-competency">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="input-create-name-competency" class="form-label">
                                    <span class="text-danger">*</span>
                                    Nama Kompetensi
                                </label>
                                <input type="text" id="input-create-name-competency" class="form-control"
                                    placeholder="Masukan Nama Kompetensi" required />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Tutup
                        </button>
                        <button id="btn-save" type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editCompetencyModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-20" id="editCompetencyModalTitle">Edit Kompetensi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-edit-competency">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="input-edit-name-competency" class="form-label">
                                    <span class="text-danger">*</span>
                                    Nama Kompetensi
                                </label>
                                <input type="text" id="input-edit-name-competency" class="form-control"
                                    placeholder="Masukan Nama Kompetensi" required />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Tutup
                        </button>
                        <button id="btn-update" type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-lg-4 col-md-12 col-sm-12 mt-2">
                <div class="card">
                    <div class="card-body">
                        <form id="form-search-competency" class="input-group input-group-merge">
                            <button type="submit" class="input-group-text" id="basic-addon-search31">
                                <i class="bx bx-search"></i>
                            </button>
                            <input id="input-search-competency" type="text" class="form-control"
                                placeholder="Cari Nama Kompetensi..." aria-label="Cari Nama Kompetensi..."
                                aria-describedby="basic-addon-search31">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="row d-flex align-items-center justify-content-end">
                    <div class="col-lg-auto col-md-auto col-sm-12 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <button type="button" class="btn btn-outline-primary rounded-pill" data-bs-toggle="modal"
                                    data-bs-target="#addCompetencyModal">
                                    Tambah Kompetensi
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-header-title fs-30">Data Kompetensi</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-striped table-bordered" id="student-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kompetensi</th>
                                        <th>Jumlah Kompetensi Kelas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="table-competency-list-body">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{-- JQuery --}}
    <script src="{{ asset('assets/js/JQuery/jquery.min.js') }}"></script>

    {{-- JQuery Overlay Loading --}}
    <script src="{{ asset('assets/js/JQuery/loading.overlay.jquery.min.js') }}"></script>

    {{-- Sweet Alert --}}
    <script src="{{ asset('assets/js/sweetalert/sweetalert2@11.js') }}"></script>

    <script type="application/javascript">
        var competencyId

        fecthAllCompetencies()

        function fecthAllCompetencies()
        {
            $.LoadingOverlay("show", {
                image: "",
                fontawesome: "fa fa-spinner fa-spin"
            })

            $.ajax({
                type: 'GET',
                url: "{{ route('api.admin.competency.index') }}",
                contentType: "application/json",
                dataType: 'json',
                success: function (response) {
                    if (response.status_code === 200) {
                        const competencies = response.data.competencies

                        if(competencies.length === 0){
                            let htmlTableBody = ''

                            htmlTableBody += `<tr>`
                            htmlTableBody += `<td colspan="4">Data masih kosong</td>`
                            htmlTableBody += `</tr>`

                            $('#table-competency-list-body').append(htmlTableBody)
                        }else{
                            $('tbody').html("")
                            let htmlTableBody = ''

                            competencies.forEach(function (competency, index) {
                                htmlTableBody += `<tr>`
                                htmlTableBody += `<td>${index + 1}</td>`
                                htmlTableBody += `<td>${competency.name}</td>`
                                htmlTableBody += `<td>${competency.classrooms_count}</td>`
                                htmlTableBody += `<td>`
                                htmlTableBody += `<div class="dropdown">`
                                htmlTableBody += `<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">`
                                htmlTableBody += `<i class="bx bx-dots-vertical-rounded"></i>`
                                htmlTableBody += `</button>`
                                htmlTableBody += `<div class="dropdown-menu" style="">`
                                htmlTableBody += `<button type="button" id="btn-edit" class="dropdown-item" value="${competency.id}" data-bs-toggle="modal" data-bs-target="#editCompetencyModal"><i class="bx bx-edit-alt me-1"></i> Ubah</button>`
                                htmlTableBody += `<button type="button" id="btn-delete" class="dropdown-item" value="${competency.id}"><i class="bx bx-trash me-1"></i> Hapus</button>`
                                htmlTableBody += `</div>`
                                htmlTableBody += `</div>`
                                htmlTableBody += `</td>`
                                htmlTableBody += `</tr>`
                            })

                            $('#table-competency-list-body').append(htmlTableBody)
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

        $('#form-search-competency').on('submit', function (event) {
            event.preventDefault()

            const textSearchCompetency = $('#input-search-competency').val()

            $.LoadingOverlay("show", {
                image: "",
                fontawesome: "fa fa-spinner fa-spin"
            })

            $.ajax({
                type: 'GET',
                url: "{{ route('api.admin.competency.index') }}",
                data: {
                    search : textSearchCompetency
                },
                success: function (response) {
                    if (response.status_code === 200) {
                        const competencies = response.data.competencies

                        if(competencies.length === 0){
                            let htmlTableBody = ''

                            $('#table-competency-list-body').html("")

                            htmlTableBody += `<tr>`
                            htmlTableBody += `<td colspan="4" class="text-center">Data tidak ditemukan</td>`
                            htmlTableBody += `</tr>`

                            $('#table-competency-list-body').append(htmlTableBody)
                        }else{
                            $('tbody').html("")
                            let htmlTableBody = ''

                            $('#table-competency-list-body').html("")

                            competencies.forEach(function (competency, index) {
                                htmlTableBody += `<tr>`
                                htmlTableBody += `<td>${index + 1}</td>`
                                htmlTableBody += `<td>${competency.name}</td>`
                                htmlTableBody += `<td>${competency.classrooms_count}</td>`
                                htmlTableBody += `<td>`
                                htmlTableBody += `<div class="dropdown">`
                                htmlTableBody += `<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">`
                                htmlTableBody += `<i class="bx bx-dots-vertical-rounded"></i>`
                                htmlTableBody += `</button>`
                                htmlTableBody += `<div class="dropdown-menu" style="">`
                                htmlTableBody += `<button type="button" id="btn-edit" class="dropdown-item" value="${competency.id}" data-bs-toggle="modal" data-bs-target="#editCompetencyModal"><i class="bx bx-edit-alt me-1"></i> Ubah</button>`
                                htmlTableBody += `<button type="button" id="btn-delete" class="dropdown-item" value="${competency.id}"><i class="bx bx-trash me-1"></i> Hapus</button>`
                                htmlTableBody += `</div>`
                                htmlTableBody += `</div>`
                                htmlTableBody += `</td>`
                                htmlTableBody += `</tr>`
                            })

                            $('#table-competency-list-body').append(htmlTableBody)
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

        $('#form-create-competency').on('submit', function (event) {
            event.preventDefault()
            
            const inputCreateNameCompetency = $('#input-create-name-competency').val()
            const btnSave = $('#btn-save')

            btnSave.attr('disabled', true)
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
                url: "{{ route('api.admin.comptency.store') }}",
                contentType: "application/json",
                data: JSON.stringify({
                    name : inputCreateNameCompetency
                }),
                dataType: 'json',
                success: function (response) {
                    if (response.status_code === 201) {
                        $('#addCompetencyModal').find('input').val('')
                        $('#addCompetencyModal').modal('hide')
                        Swal.fire({
                            icon: 'success',
                            title: response.message
                        }).then(function(){
                            fecthAllCompetencies()
                        })
                    } else {
                        $('#addCompetencyModal').modal('hide')
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

        $(document).on('click', '#btn-edit', function (event) {
            event.preventDefault()

            competencyId = $(this).val()
            const textNameCompetency = $('#input-edit-name-competency')

            $.LoadingOverlay("show", {
                image: "",
                fontawesome: "fa fa-spinner fa-spin"
            })

            $.ajax({
                type: 'GET',
                url: "{{ route('api.admin.competency.show', ':id') }}".replace(':id', competencyId),
                contentType: "application/json",
                dataType: 'json',
                success: function (response) {
                    if (response.status_code === 200) {
                        const competency = response.data.competency
                        
                        textNameCompetency.val(competency.name)
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

        $('#form-edit-competency').on('submit', function (event) {
            event.preventDefault()

            const inputEditNameCompetency = $('#input-edit-name-competency').val()
            const btnUpdate = $('#btn-update')

            btnUpdate.attr('disabled', true)
            btnUpdate.html('Update...')

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
                url: "{{ route('api.admin.competency.update', ':id') }}".replace(':id', competencyId),
                contentType: "application/json",
                data: JSON.stringify({
                    name : inputEditNameCompetency
                }),
                dataType: 'json',
                success: function (response) {
                    if (response.status_code === 200) {
                        $('#editCompetencyModal').find('input').val('')
                        $('#editCompetencyModal').modal('hide')
                        Swal.fire({
                            icon: 'success',
                            title: response.message
                        }).then(function(){
                            fecthAllCompetencies()
                        })
                    } else {
                        $('#editCompetencyModal').modal('hide')
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

            btnUpdate.html('Update')
            btnUpdate.removeAttr("disabled")
        })

        $(document).on('click', '#btn-delete', function (event) {
            event.preventDefault()

            const btnDelete = $(this)

            btnDelete.attr("disabled", true)
            btnDelete.html('Hapus...')

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
                        url: "{{ route('api.admin.competency.destroy') }}",
                        contentType: "application/json",
                        data: JSON.stringify({
                            id : btnDelete.val()
                        }),
                        dataType: 'json',
                        success: function (response) {
                            if (response.status_code === 200) {
                                Swal.fire({
                                    icon: 'success',
                                    title: response.message
                                }).then(function(){
                                    fecthAllCompetencies()
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

            btnDelete.html('Hapus')
            btnDelete.removeAttr("disabled")
        })
    </script>
@endsection
