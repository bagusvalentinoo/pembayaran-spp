@extends('layouts.officer')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12 col-lg-12 mb-6">
                <div class="card">
                    <h5 class="card-header">DATA SISWA</h5>
                    <div class="row p-3">
                        <div class=" col-9 p-3 sd-flex justify-content-start">
                            <div class="col-md-3">
                                <input class="form-control" type="search" placeholder="Search" id="html5-search-input">
                            </div>
                        </div>
                    </div>
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
                                                <img src="{{ asset('assets/img/images/icon-link.png') }}">
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
