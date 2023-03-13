@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Kompetensi Keahlian</h5>
                    <div class="row">
                        <div class=" col-9 p-3 sd-flex justify-content-start">
                            <div class="col-md-3">
                                <input class="form-control" type="search" placeholder="Search" id="html5-search-input">
                            </div>
                        </div>
                        <div class="col-3 p-3 d-flex justify-content-end">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modalAddCompetency">
                                Tambah Kompetensi
                            </button>
                        </div>
                    </div>


                    {{-- Add Competency Modal --}}
                    <div class="modal fade" id="modalAddCompetency" tabindex="-1" style="display: none;"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalScrollableTitle">Tambah Kompetensi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row mb-3">
                                        <label class="col-sm-4 col-form-label" for="basic-default-name">Nama
                                            Kompetensi</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="basic-default-name"
                                                placeholder="Masukan Nama Kompetensi">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-4 col-form-label" for="basic-default-name">Jumlah Kelas</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="basic-default-name"
                                                placeholder="Masukan Jumlah Kelas">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-4 col-form-label" for="basic-default-name">Logo
                                            Kompetensi</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="file" id="formFile">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- End Add Competency Modal --}}
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kompetensi Keahlian</th>
                                    <th>Jumlah Kelas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td>1</td>
                                    <td>Rekayasa Perangkat Lunak</td>

                                    <td>3</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="bx bx-trash me-1"></i> Hapus</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Rekayasa Perangkat Lunak</td>

                                    <td>3</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="bx bx-trash me-1"></i> Hapus</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Kompetensi Keahlian</h5>
                    <div class="row">
                        <div class=" col-9 p-3 sd-flex justify-content-start">
                            <div class="col-md-3">
                                <input class="form-control" type="search" placeholder="Search" id="html5-search-input">
                            </div>
                        </div>
                        <div class="col-3 p-3 d-flex justify-content-end">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modalAddCompetency">
                                Tambah Kompetensi
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                            <img src="{{ asset('assets/image/chart-success.png') }}" alt="chart success"
                                                class="rounded">
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn p-0" type="button" id="cardOpt3"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="card-title mb-2">Rekayasa Perangkat Lunak</h4>
                                    <span class="fw-semibold d-block mb-1">3 Kelas</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                            <img src="{{ asset('assets/image/chart-success.png') }}" alt="chart success"
                                                class="rounded">
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn p-0" type="button" id="cardOpt3"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="card-title mb-2">Rekayasa Perangkat Lunak</h4>
                                    <span class="fw-semibold d-block mb-1">3 Kelas</span>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
@endsection
