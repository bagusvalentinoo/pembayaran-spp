@extends('layouts.officer')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-6 col-lg-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row flex-grow-1">
                            <div class="col-md-4 col-lg-4">
                                <img src="{{ asset('assets/img/images/student.png') }}">
                            </div>
                            <div class="col-md-8 col-lg-8 pb-10">
                                <h4 class="card-title mb-2">Jumlah Siswa Bayar</h4>
                                <h2 class="card-title mb-2">12 SISWA</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row flex-grow-1">
                            <div class="col-md-4 col-lg-4">
                                <img src="{{ asset('assets/img/images/iuran.png') }}">
                            </div>
                            <div class="col-md-8 col-lg-8 ">
                                <h4 class="card-title mt-25mb-2">Total Iuran</h4>
                                <h2 class="card-title mb-2">Rp. 360000000</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection
