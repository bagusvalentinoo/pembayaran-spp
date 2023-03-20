@extends('layouts.officer')

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
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 mb-6 mt-3">
                <div class="card">
                    <h5 class="card-header">DATA SISWA</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr class="text-nowrap">
                                    <th>No</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Kompetensi</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="modal" data-bs-target="#modalPembayaran">
                                                <i class='bx bx-link-external'></i>
                                            </button>

                                            {{-- Modal Pembayaran --}}
                                            <div class="modal fade" id="modalPembayaran" tabindex="-1"
                                                style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalScrollableTitle">Pembayaran
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row mb-3">
                                                                <label class="col-sm-4 col-form-label"
                                                                    for="basic-default-name">
                                                                    Nama Siswa</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control"
                                                                        id="basic-default-name"
                                                                        placeholder="Masukan Nama Siswa">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label class="col-sm-4 col-form-label"
                                                                    for="basic-default-name">Kelas</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control"
                                                                        id="basic-default-name"
                                                                        placeholder="Masukan Kelas Siswa">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label class="col-sm-4 col-form-label"
                                                                    for="basic-default-name">Bulan Dibayar</label>
                                                                <div class="col-sm-8">
                                                                    <small class="text-light fw-semibold">Semester 1</small>
                                                                    <div class="demo-inline-spacing mt-3 mb-3">
                                                                        <div class="list-group">
                                                                            <label class="list-group-item">
                                                                                <input class="form-check-input me-1"
                                                                                    type="checkbox" value="">
                                                                                Januari
                                                                            </label>
                                                                            <label class="list-group-item">
                                                                                <input class="form-check-input me-1"
                                                                                    type="checkbox" value="">
                                                                                Februari
                                                                            </label>
                                                                            <label class="list-group-item">
                                                                                <input class="form-check-input me-1"
                                                                                    type="checkbox" value="">
                                                                                Maret
                                                                            </label>
                                                                            <label class="list-group-item">
                                                                                <input class="form-check-input me-1"
                                                                                    type="checkbox" value="">
                                                                                April
                                                                            </label>
                                                                            <label class="list-group-item">
                                                                                <input class="form-check-input me-1"
                                                                                    type="checkbox" value="">
                                                                                Mei
                                                                            </label>
                                                                            <label class="list-group-item">
                                                                                <input class="form-check-input me-1"
                                                                                    type="checkbox" value="">
                                                                                Juni
                                                                            </label>
                                                                        </div>
                                                                    </div>

                                                                    <small class="text-light fw-semibold">Semester 2</small>
                                                                    <div class="demo-inline-spacing mt-3">
                                                                        <div class="list-group">
                                                                            <label class="list-group-item">
                                                                                <input class="form-check-input me-1"
                                                                                    type="checkbox" value="">
                                                                                Juli
                                                                            </label>
                                                                            <label class="list-group-item">
                                                                                <input class="form-check-input me-1"
                                                                                    type="checkbox" value="">
                                                                                Agustus
                                                                            </label>
                                                                            <label class="list-group-item">
                                                                                <input class="form-check-input me-1"
                                                                                    type="checkbox" value="">
                                                                                Spetember
                                                                            </label>
                                                                            <label class="list-group-item">
                                                                                <input class="form-check-input me-1"
                                                                                    type="checkbox" value="">
                                                                                Oktober
                                                                            </label>
                                                                            <label class="list-group-item">
                                                                                <input class="form-check-input me-1"
                                                                                    type="checkbox" value="">
                                                                                November
                                                                            </label>
                                                                            <label class="list-group-item">
                                                                                <input class="form-check-input me-1"
                                                                                    type="checkbox" value="">
                                                                                Desember
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label class="col-sm-4 col-form-label"
                                                                    for="basic-default-name">
                                                                    Total Bayar</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control"
                                                                        id="basic-default-name"
                                                                        placeholder="Masukan Nama Siswa">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label class="col-sm-4 col-form-label"
                                                                    for="basic-default-name">
                                                                    Jumlah Dibayarkan</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control"
                                                                        id="basic-default-name"
                                                                        placeholder="Masukan Nama Siswa">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-secondary"
                                                                data-bs-dismiss="modal">
                                                                Close
                                                            </button>
                                                            <button type="button" class="btn btn-primary">
                                                                Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- End Modal Pembayaran --}}
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
@endsection
