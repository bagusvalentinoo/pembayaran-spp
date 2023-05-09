@extends('layouts.admin')

@section('style')
    {{-- Font Awesome Style --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Custom Style CSS --}}
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
    <div class="modal fade" id="addStudentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-20" id="addStudentModalTitle">Tambah Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-create-student">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="input-create-name-student" class="form-label">
                                    <span class="text-danger">*</span>
                                    Nama Kelas
                                </label>
                                <input type="text" id="input-create-name-student" class="form-control"
                                    placeholder="Masukan Nama Kelas" required />
                                <label for="select-create-competencies" class="form-label mt-3">
                                    <span class="text-danger">*</span>
                                    Kompetensi
                                </label>
                                <select id="select-create-competencies" class="form-select" required>
                                </select>
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
    <div class="modal fade" id="editClassroomModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-20" id="editClassroomModalTitle">Edit Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-edit-classroom">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="input-edit-name-classroom" class="form-label">
                                    <span class="text-danger">*</span>
                                    Nama Kelas
                                </label>
                                <input type="text" id="input-edit-name-classroom" class="form-control"
                                    placeholder="Masukan Nama Kelas" required />
                                <label for="select-edit-competencies" class="form-label mt-3">
                                    <span class="text-danger">*</span>
                                    Kompetensi
                                </label>
                                <select id="select-edit-competencies" class="form-select" required>
                                </select>
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
                        <form id="form-search-classroom" class="input-group input-group-merge">
                            <button type="submit" class="input-group-text" id="basic-addon-search31">
                                <i class="bx bx-search"></i>
                            </button>
                            <input id="input-search-classroom" type="text" class="form-control"
                                placeholder="Cari Nama Kelas..." aria-label="Cari Nama Kelas..."
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
                                <button type="button" class="btn btn-outline-primary rounded-pill"
                                    data-bs-toggle="modal" data-bs-target="#addClassroomModal">
                                    Tambah Kelas
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
                            <table class="table table-striped table-bordered" id="table-classroom">
                                <thead>
                                    <tr>
                                        <th>No</th>
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
        fetchAllStudents()

        function fetchAllStudents()
        {
            $.ajax({
                type: 'GET',
                url: "{{ route('api.admin.student.index') }}",
                contentType: "application/json",
                dataType: 'json',
                success: function (response) {
                    if (response.status_code === 200) {
                        const students = response.data.students

                        if(students.length === 0){
                            let htmlTableBody = ''

                            htmlTableBody += `<tr>`
                            htmlTableBody += `<td colspan="5">Data masih kosong</td>`
                            htmlTableBody += `</tr>`

                            $('#table-student-list-body').append(htmlTableBody)
                        }else{
                            $('tbody').html("")
                            let htmlTableBody = ''

                            students.forEach(function (student, index) {
                                htmlTableBody += `<tr>`
                                htmlTableBody += `<td>${index + 1}</td>`
                                htmlTableBody += `<td>${student.nisn}</td>`
                                htmlTableBody += `<td>${student.nis}</td>`
                                htmlTableBody += `<td>${student.classroom.name}</td>`
                                htmlTableBody += `<td>${student.user.name}</td>`
                                htmlTableBody += `<td>Details</td>`
                                htmlTableBody += `</tr>`
                            })

                            $('#table-student-list-body').append(htmlTableBody)
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
    </script>
@endsection
