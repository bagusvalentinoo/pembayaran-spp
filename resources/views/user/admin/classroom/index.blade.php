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
    </style>
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-header-title fs-30">Data Kompetensi</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <select id="filter-data" class="form-select">
                                    <option>-- Filter --</option>
                                    <option value="competencies">Berdasarkan Kompetensi</option>
                                </select>
                            </div>
                            <button type="button" class="btn btn-primary btn-sm ml-auto fs-18" data-bs-toggle="modal"
                                data-bs-target="#addClassroomModal">Tambah Kelas</button>
                        </div>
                        {{-- Create Modal --}}
                        <div class="modal fade" id="addClassroomModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title fs-20" id="addClassroomModalTitle">Tambah Kelas</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form id="form-classroom-create">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-12 mb-3">
                                                    <select id="select-competencies" class="form-select">
                                                    </select>
                                                    <input type="text" id="input-classrooms" class="form-control"
                                                        placeholder="Masukan Nama Kelas">
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
                        {{-- Edit Modal --}}
                        <div class="modal fade" id="editClassroomsModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title fs-20" id="editClassroomsModalTitle">Ubah Kelas</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form id="form-classroom-edit">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-12 mb-3">
                                                    <select id="select-competencies" class="form-select">
                                                    </select>
                                                    <input type="text" id="inputEditClassroom" class="form-control"
                                                        placeholder="Masukan Nama Kelas">
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
                        <table class="table table-striped table-bordered" id="student-table">
                            <thead>
                                <tr>
                                    <th>Nama Kelas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="table-classroom-list-body">
                            </tbody>
                        </table>
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
        fetchAllClassrooms()
        fetchAllCompetencies()

        function fetchAllCompetencies()
        {
            $.ajax({
                type: 'GET',
                url: "{{ route('api.admin.competency.index') }}",
                contentType: "application/json",
                dataType: 'json',
                success: function (response) {
                    if (response.status_code === 200) {
                        const competencies = response.data.competencies
                        
                        $('#select-competencies').empty()
                        $('#select-competencies').append(`<option>-- Pilih Kompetensi --</option>`)
                        competencies.forEach(function (competency, index) {
                            $('#select-competencies').append(`<option value="${competency.id}">${competency.name}</option>`)
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

        function fetchAllClassrooms()
        {
            $.ajax({
                type: 'GET',
                url: "{{ route('api.admin.classroom.index') }}",
                contentType: "application/json",
                dataType: 'json',
                success: function (response) {
                    if (response.status_code === 200) {
                        const classrooms = response.data.classrooms
                        
                        if(classrooms.length === 0){
                            let htmlTableBody = ''

                            htmlTableBody += `<tr>`
                            htmlTableBody += `<td colspan="2">Data masih kosong</td>`
                            htmlTableBody += `</tr>`

                            $('#table-classroom-list-body').append(htmlTableBody)
                        }else{
                            $('tbody').html("")
                            let htmlTableBody = ''

                            classrooms.forEach(function (classroom, index) {
                                htmlTableBody += `<tr>`
                                htmlTableBody += `<td>${classroom.name}</td>`
                                htmlTableBody += `<td>`
                                htmlTableBody += `<div class="dropdown">`
                                htmlTableBody += `<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">`
                                htmlTableBody += `<i class="bx bx-dots-vertical-rounded"></i>`
                                htmlTableBody += `</button>`
                                htmlTableBody += `<div class="dropdown-menu" style="">`
                                htmlTableBody += `<button type="button" id="btn-edit" class="dropdown-item" value="${classroom.id}" data-bs-toggle="modal" data-bs-target="#editClassroomsModal"><i class="bx bx-edit-alt me-1"></i> Ubah</button>`
                                htmlTableBody += `<button type="button" id="btn-delete" class="dropdown-item" value="${classroom.id}"><i class="bx bx-trash me-1"></i> Hapus</button>`
                                htmlTableBody += `</div>`
                                htmlTableBody += `</div>`
                                htmlTableBody += `</td>`
                                htmlTableBody += `</tr>`
                            })

                            $('#table-classroom-list-body').append(htmlTableBody)
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

        $('#form-classroom-create').on('submit', function (event) {
            event.preventDefault()
            
            const inputClassroom = $('#input-classrooms').val()
            const selectClassroom = $('#select-competencies').val()
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
                url: "{{ route('api.admin.classroom.store') }}",
                contentType: "application/json",
                data: JSON.stringify(
                    {
                        competencies : [
                            {
                                id : selectClassroom,
                                classrooms : [
                                    inputClassroom
                                ]
                            }
                        ]
                    }
                ),
                dataType: 'json',
                success: function (response) {
                    if (response.status_code === 201) {
                        $('#addClassroomModal').find('input').val('')
                        $('#addClassroomModal').modal('hide')
                        Swal.fire({
                            icon: 'success',
                            title: response.message
                        }).then(function(){
                            fetchAllClassrooms()
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

            id_classroom = $(this).val()
            const inputNameClassroom = $('#inputEditClassroom')

            $.ajax({
                type: 'GET',
                url: "{{ route('api.admin.classroom.show', ':id') }}".replace(':id', id_classroom),
                contentType: "application/json",
                dataType: 'json',
                success: function (response) {
                    if (response.status_code === 200) {
                        const classroom = response.data.classroom
                        inputNameCompetencies.val(classroom.name)
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
    </script>
@endsection
