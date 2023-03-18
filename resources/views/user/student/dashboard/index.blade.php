@extends('layouts.student')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12 col-lg-12 mb-6">
                <div class="card">
                    <h5 class="card-header">PROFIL SISWA</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 mb-2">
                                <div class="row">
                                    <img style="width: 210px; height: 210px;" src="{{ Storage::url($user->photo_profile) }}">
                                </div>
                            </div>
                            <div class="col-md-9 col-lg-9 mb-4">
                                <div class="row">
                                    <div class="row">
                                        <label class="col-sm-3 fw-semibold d-block" for="">NISN</label>
                                        <div class="col-sm-9">
                                            <p>
                                                : NISN Siswa
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-3 fw-semibold d-block" for="">NIS</label>
                                        <div class="col-sm-9">
                                            <p>
                                                : NIS Siswa
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-3 fw-semibold d-block" for="">NAMA</label>
                                        <div class="col-sm-9">
                                            <p>
                                                : NAMA Siswa
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-3 fw-semibold d-block" for="">KELAS</label>
                                        <div class="col-sm-9">
                                            <p>
                                                : KELAS Siswa
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-3 fw-semibold d-block" for="">ALAMAT</label>
                                        <div class="col-sm-9">
                                            <p>
                                                : ALAMAT Siswa
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-3 fw-semibold d-block" for="">NO HP</label>
                                        <div class="col-sm-9">
                                            <p>
                                                : NO HP Siswa
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 mb-6">
                <div class="card mt-3">
                    <h5 class="card-header">CATATAN PEMBAYARAN SPP</h5>
                    <div class="card-body">
                        <h5 class="card-subtitle text-muted mb-2">Semester 1</h5>
                        <div class="row mb-2">
                            <div class="col-sm-2">
                                <div class="card shadow-none bg-transparent border border-secondary mb-2 text-center">
                                    <div class="card-header">
                                        JANUARI
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="card shadow-none bg-transparent border border-secondary mb-2 text-center">
                                    <div class="card-header">
                                        FEBRUARI
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="card shadow-none bg-transparent border border-secondary mb-2 text-center">
                                    <div class="card-header">
                                        MARET
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="card shadow-none bg-transparent border border-secondary mb-2 text-center">
                                    <div class="card-header">
                                        APRIL
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="card shadow-none bg-transparent border border-secondary mb-2 text-center">
                                    <div class="card-header">
                                        MEI
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="card shadow-none bg-transparent border border-secondary mb-2 text-center">
                                    <div class="card-header">
                                        JUNI
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h5 class="card-subtitle text-muted mt-3 mb-2">Semester 2</h5>
                        <div class="row">
                            <div class="col-sm-2 col-md-2 col-lg-2">
                                <div class="card bg-success text-white text-center mb-3">
                                    <div class="card-header">
                                        JULI
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="card shadow-none bg-transparent border border-secondary mb-2 text-center">
                                    <div class="card-header">
                                        AGUSTUS
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="card shadow-none bg-transparent border border-secondary mb-2 text-center">
                                    <div class="card-header">
                                        SEPTEMBER
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="card shadow-none bg-transparent border border-secondary mb-2 text-center">
                                    <div class="card-header">
                                        OKTOBER
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="card shadow-none bg-transparent border border-secondary mb-2 text-center">
                                    <div class="card-header">
                                        NOVEMBER
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="card shadow-none bg-transparent border border-secondary mb-2 text-center">
                                    <div class="card-header">
                                        DESEMBER
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
