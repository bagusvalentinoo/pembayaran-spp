@extends('layouts.super_admin')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div id="row-btn-changes" class="row d-flex justify-content-start align-items-center">
            <div class="col-lg-auto col-md-12 col-sm-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <button id="btn-change-profiles" type="button" class="btn btn-primary">
                            <i class="bx bx-edit mr-10"></i>
                            Changes Profiles
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="{{ Storage::url($user->photo_profile) }}" alt="user-avatar" class="d-block rounded"
                                height="100" width="100" id="uploadedAvatar">
                            <div class="button-wrapper d-none">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Change Photo Profile</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" class="account-file-input" hidden=""
                                        accept="image/png, image/jpeg">
                                </label>
                                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 1MB</p>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="card-body">
                        <form id="formAccountSettings" method="POST" onsubmit="return false">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="input-name-user" class="form-label">Nama</label>
                                    <input class="form-control" type="text" id="input-name-user" name="name"
                                        value="{{ $user->name }}" placeholder="{{ $user->name }}" disabled
                                        autofocus="">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="input-email-user" class="form-label">E-mail</label>
                                    <input class="form-control" type="text" id="input-email-user" name="email"
                                        value="{{ $user->email }}" placeholder="{{ $user->email }}" disabled>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="input-phone-number-user">Phone Number</label>
                                    <input type="text" id="input-phone-number-user" name="phone_number"
                                        class="form-control" value="{{ $user->superAdmin->phone_number }}"
                                        placeholder="{{ $user->superAdmin->phone_number }}" disabled>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="input-address-user" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="input-address-user" name="address"
                                        value="{{ $user->superAdmin->address }}"
                                        placeholder="{{ $user->superAdmin->address }}" disabled>
                                </div>
                            </div>
                            <div class="mt-2">
                                <button id="btn-save-cancel" class="btn btn-secondary me-2 text-bold d-none">Cancel</button>
                                <button id="btn-save-changes" class="btn btn-primary me-2 text-bold d-none">Save
                                    changes</button>
                            </div>
                        </form>
                    </div>
                    <!-- /Account -->
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
        $('#btn-change-profiles').on('click', function (event) {
            event.preventDefault()
            
            $('#button-wrapper').removeClass('d-none')
            $('#input-name-user').removeAttr('disabled')
            $('#input-email-user').removeAttr('disabled')
            $('#input-phone-number-user').removeAttr('disabled')
            $('#input-address-user').removeAttr('disabled')
            $('#btn-save-changes').removeClass('d-none')
            $('#btn-save-cancel').removeClass('d-none')
            $('#row-btn-changes').addClass('d-none')
        })

        $('#btn-save-cancel').on('click', function (event) {
            event.preventDefault()
            
            Swal.fire({
                title: 'Discard changes?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#696CFF',
                cancelButtonColor: '#8592A3',
                confirmButtonText: 'Yes, discard changes!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#button-wrapper').addClass('d-none')
                    $('#input-name-user').attr('disabled', 'disabled')
                    $('#input-email-user').attr('disabled', 'disabled')
                    $('#input-phone-number-user').attr('disabled', 'disabled')
                    $('#input-address-user').attr('disabled', 'disabled')
                    $('#btn-save-changes').addClass('d-none')
                    $('#btn-save-cancel').addClass('d-none')
                    $('#row-btn-changes').removeClass('d-none')
                }
            })
        })

        $('#btn-save-changes').on('click', function (event) {
            event.preventDefault()

            Swal.fire({
                title: 'Save changes?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#696CFF',
                cancelButtonColor: '#8592A3',
                confirmButtonText: 'Yes, save changes!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#button-wrapper').addClass('d-none')
                    $('#input-name-user').attr('disabled', 'disabled')
                    $('#input-email-user').attr('disabled', 'disabled')
                    $('#input-phone-number-user').attr('disabled', 'disabled')
                    $('#input-address-user').attr('disabled', 'disabled')
                    $('#btn-save-changes').addClass('d-none')
                    $('#btn-save-cancel').addClass('d-none')
                    $('#row-btn-changes').removeClass('d-none')
                }
            })
        })
    </script>
@endsection
