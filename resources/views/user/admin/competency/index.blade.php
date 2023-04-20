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

        .loading-overlay img {
            width: 600px !important;
            height: 600px !important;
        }
    </style>
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-lg-4 col-md-12 col-sm-12 mt-2">
                <div class="card">
                    <div class="card-body">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-search31">
                                <i class="bx bx-search"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="Search..." aria-label="Search..."
                                aria-describedby="basic-addon-search31">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="row d-flex align-items-center justify-content-end">
                    <div class="col-lg-5 col-md-8 col-sm-12 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text" id="basic-addon-search31">
                                        <i class="bx bx-filter"></i>
                                    </span>
                                    <select class="form-select">
                                        <option selected>-- Filter --</option>
                                        <option value="1">Berdasarkan Kompetensi</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-auto col-md-auto col-sm-12 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <button type="button" class="btn btn-outline-primary rounded-pill" data-bs-toggle="modal"
                                    data-bs-target="#addCompetenciesModal"">
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

    {{-- JQuery Overlay Loading --}}
    <script src="{{ asset('assets/js/JQuery/loading.overlay.jquery.min.js') }}"></script>

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
                },

                complete: function () {
                    $.LoadingOverlay("hide")
                }
            })
        }
    </script>
@endsection
