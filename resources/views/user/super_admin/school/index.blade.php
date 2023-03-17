@extends('layouts.super_admin')

@section('style')
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
        <div class="row">
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
    <script type="application/javascript">
        fectAllSchools()

        function fectAllSchools()
        {
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
                                htmlTableBody += `<a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>`
                                htmlTableBody += `<a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>`
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
                }
            })
        }
    </script>
@endsection
