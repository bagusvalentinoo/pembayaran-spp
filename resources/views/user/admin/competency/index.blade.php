@extends('layouts.admin')

@section('style')
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
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-header-title fs-30">Data Kompetensi</h4>
                        <button type="button" class="btn btn-primary btn-sm ml-auto fs-18" data-bs-toggle="modal"
                            data-bs-target="#addCompetenciesModal">Tambah Kompetensi</button>
                        <div class="modal fade" id="addCompetenciesModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title fs-20" id="addCompetenciesModalTitle">Tambah Kompetensi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form id="form-competencies-create">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-12 mb-3">
                                                    <input type="text" id="inputNameCompetencies" class="form-control"
                                                        placeholder="Masukan Nama Kompetensi" />
                                                    {{-- <div class="d-flex justify-content-between align-items-center mt-3">
                                                        <hr class="flex-grow-1 mr-3 border-light">
                                                        <button id="btn-add-compentencies" type="button"
                                                            class="btn btn-outline-success rounded-circle p-button-icon">
                                                            <i class='bx bx-plus fs-18'></i>
                                                        </button>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal">
                                                Tutup
                                            </button>
                                            <button id="btn-save" type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="editCompetenciesModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title fs-20" id="editCompetenciesModalTitle">Tambah Kompetensi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form id="form-competencies-edit">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-12 mb-3">
                                                    <input type="text" id="inputEditNameCompetencies"
                                                        class="form-control" placeholder="Masukan Nama Kompetensi" />
                                                    {{-- <div class="d-flex justify-content-between align-items-center mt-3">
                                                        <hr class="flex-grow-1 mr-3 border-light">
                                                        <button id="btn-add-compentencies" type="button"
                                                            class="btn btn-outline-success rounded-circle p-button-icon">
                                                            <i class='bx bx-plus fs-18'></i>
                                                        </button>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal">
                                                Tutup
                                            </button>
                                            <button id="btn-update" type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
    {{-- Sweet Alert --}}
    <script src="{{ asset('assets/js/sweetalert/sweetalert2@11.js') }}"></script>

    <script type="application/javascript">
        $(document).ready(function() {
            $('#btn-add-compentencies').click(function() {
                var newInput = $('<div class="col-12 mb-3"><input type="text" class="form-control" placeholder="Masukan Nama Kompetensi" /></div>');
                newInput.insertBefore($(this).closest('.col-12'));
            });
        });
    </script>

    <script type="application/javascript">
        var id_competency

        fecthAllCompetencies()

        function fecthAllCompetencies()
        {
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
                                htmlTableBody += `<button type="button" id="btn-edit" class="dropdown-item" value="${competency.id}" data-bs-toggle="modal" data-bs-target="#editCompetenciesModal"><i class="bx bx-edit-alt me-1"></i> Ubah</button>`
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
                }
            })
        }

        $('#form-competencies-create').on('submit', function (event) {
            event.preventDefault()

            var names = $('#inputNameCompetencies').val().split(',').map(function(name) {
                return name.trim()
            })

            var formData = {
                names: names
            }
            
            const btnSave = $('#btn-save')

            btnSave.attr("disabled", true)
            btnSave.html('Simpan...')

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })

            $.ajax({
                type: 'POST',
                url: "{{ route('api.admin.comptency.store') }}",
                contentType: "application/json",
                data: JSON.stringify(formData),
                dataType: 'json',
                success: function (response) {
                    if (response.status_code === 201) {
                        $('#addCompetenciesModal').find('input').val('')
                        $('#addCompetenciesModal').modal('hide')
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
                }
            })

            btnSave.html('Simpan')
            btnSave.removeAttr("disabled")
        })
        
        $(document).on('click', '#btn-edit', function(event){
            event.preventDefault()

            id_competency = $(this).val()
            const inputNameCompetencies = $('#inputEditNameCompetencies')

            $.ajax({
                type: 'GET',
                url: "{{ route('api.admin.competency.show', ':id') }}".replace(':id', id_competency),
                contentType: "application/json",
                dataType: 'json',
                success: function (response) {
                    if (response.status_code === 200) {
                        const competency = response.data.competency
                        inputNameCompetencies.val(competency.name)
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
                }
            })
        })

        $('#form-competencies-edit').on('submit', function (event) {
            event.preventDefault()

            const inputNameCompetency = $('#inputEditNameCompetencies')
            const btnUpdate = $('#btn-update')

            btnUpdate.attr("disabled", true)
            btnUpdate.html('Update...')

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })

            $.ajax({
                type: 'PUT',
                url: "{{ route('api.admin.competency.update', ':id') }}".replace(':id', id_competency),
                contentType: "application/json",
                data: JSON.stringify({
                    name: inputNameCompetency.val()
                }),
                dataType: 'json',
                success: function (response) {
                    if (response.status_code === 200) {
                        $('#editCompetenciesModal').find('input').val('')
                        $('#editCompetenciesModal').modal('hide')
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
                }
            })

            btnUpdate.html('Update')
            btnUpdate.removeAttr("disabled")
        })

        $(document).on('click', '#btn-delete', function(event) {
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

                    $.ajax({
                        type: 'DELETE',
                        url: "{{ route('api.admin.competency.destroy') }}",
                        data: JSON.stringify({
                            ids : [btnDelete.val()]
                        }),
                        contentType: "application/json",
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
                        }
                    })
                }
            })

            btnDelete.html('Hapus')
            btnDelete.removeAttr("disabled")
        })
    </script>
@endsection
