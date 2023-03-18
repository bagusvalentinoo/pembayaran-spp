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
                        <h4 class="card-header-title fs-30">Data Siswa</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mr-3">
                                <select id="select-filter" class="form-select">
                                    <option>-- Filter --</option>
                                    <option value="">Lorem Filter</option>
                                </select>
                            </div>
                            <button type="button" class="btn btn-primary btn-sm ml-auto fs-18">Tambah Siswa</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered" id="student-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NISN</th>
                                    <th>NIS</th>
                                    <th>Kelas</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="table-student-list-body">
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
