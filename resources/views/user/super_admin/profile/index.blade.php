@extends('layouts.super_admin')

@section('style')
    {{-- Font Awesome Icon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Cropper CSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css"
        integrity="sha512-cyzxRvewl+FOKTtpBzYjW6x6IAYUCZy3sGP40hn+DQkqeluGRCax7qztK2ImL64SA+C7kVWdLI6wvdlStawhyw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Custom Style CSS --}}
    <style type="text/css">
        #crop-modal {
            max-width: 100% !important;
        }
    </style>
@endsection

@section('content')
    {{-- Modal Crop --}}
    <div class="modal fade" id="crop-modal" tabindex="-1" role="dialog" aria-labelledby="crop-modal-label"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crop-modal-label">Crop Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="image-cropper">
                        <img id="image-crop-preview" src="#" alt="Crop Preview">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="crop-button">Crop</button>
                </div>
            </div>
        </div>
    </div>

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
                            <div id="img-container">
                                <img id="img-preview" src="" alt="photo profile">
                            </div>
                            <div class="button-wrapper d-none">
                                <label for="input-upload-img" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-sm-block">Change Photo Profile</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="input-upload-img" class="account-file-input" hidden=""
                                        accept="image/png, image/jpeg">
                                </label>
                                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 1MB</p>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="card-body">
                        <form id="form-update-user" onsubmit="return false">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="input-name-user" class="form-label">Nama</label>
                                    <input class="form-control" type="text" id="input-name-user" name="name" disabled
                                        autofocus="">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="input-email-user" class="form-label">E-mail</label>
                                    <input class="form-control" type="text" id="input-email-user" name="email"
                                        disabled>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="input-phone-number-user">Phone Number</label>
                                    <input type="text" id="input-phone-number-user" name="phone_number"
                                        class="form-control" disabled>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="input-address-user" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="input-address-user" name="address"
                                        disabled>
                                </div>
                            </div>
                            <div class="mt-2">
                                <button id="btn-save-cancel"
                                    class="btn btn-secondary me-2 text-bold d-none">Cancel</button>
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

    {{-- Overlay Loading JQuery --}}
    <script src="{{ asset('assets/js/JQuery/loading.overlay.jquery.min.js') }}"></script>

    {{-- Cropper JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"
        integrity="sha512-6lplKUSl86rUVprDIjiW8DuOniNX8UDoRATqZSds/7t6zCQZfaCe3e5zcGaQwxa8Kpn5RTM9Fvl3X2lLV4grPQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- Sweet Alert --}}
    <script src="{{ asset('assets/js/sweetalert/sweetalert2@11.js') }}"></script>

    <script type="application/javascript">
        $(document).ready(function () {
            var cropper

            fetchUser()

            $('#btn-change-profiles').on('click', function (event) {
                event.preventDefault()
                
                $('#row-btn-changes').addClass('d-none')
                $('.button-wrapper').removeClass('d-none')
                $('#input-name-user').removeAttr('disabled')
                $('#input-email-user').removeAttr('disabled')
                $('#input-phone-number-user').removeAttr('disabled')
                $('#input-address-user').removeAttr('disabled')
                $('#btn-save-cancel').removeClass('d-none')
                $('#btn-save-changes').removeClass('d-none')
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
                        fetchUser()
                        $('#row-btn-changes').removeClass('d-none')
                        $('.button-wrapper').addClass('d-none')
                        $('#input-name-user').attr('disabled', true)
                        $('#input-email-user').attr('disabled', true)
                        $('#input-phone-number-user').attr('disabled', true)
                        $('#input-address-user').attr('disabled', true)
                        $('#btn-save-cancel').addClass('d-none')
                        $('#btn-save-changes').addClass('d-none')
                    }
                })
            })

            $('#input-upload-img').on('change', function (event) {
                event.preventDefault()

                var file = $(this).prop('files')[0]
                var reader = new FileReader()
                reader.onload = function(e) {
                    $('#img-preview').attr('src', e.target.result)
                    $('#crop-modal').modal('show')
                    if (cropper) {
                        cropper.destroy()
                    }
                    cropper = new Cropper($('#image-crop-preview')[0], {
                        aspectRatio: 1,
                        viewMode: 1,
                        autoCropArea: 1,
                    })
                }
                reader.readAsDataURL(file)
            })

            $('#crop-button').on('click', function (event) {
                event.preventDefault()

                var canvas = cropper.getCroppedCanvas();
  
                // Check that the canvas exists
                if (!canvas) {
                    alert('Error: Could not crop image.');
                    return;
                }
                
                // Convert the canvas to a data URL
                var imageData = canvas.toDataURL('image/png');
                
                // Display the cropped image in the preview container
                $('#image-preview').attr('src', imageData);
                
                // Hide the modal
                $('#crop-modal').modal('hide');
            })

            $('#crop-modal').on('hidden.bs.modal', function() {
                cropper.destroy()
            })

            function fetchUser()
            {
                $.LoadingOverlay("show", {
                    image: "",
                    fontawesome: "fa fa-spinner fa-spin"
                })

                $.ajax({
                    type: 'GET',
                    url: "{{ route('api.general.user.index') }}",
                    contentType: "application/json",
                    dataType: 'json',
                    success: function (response) {
                        if (response.status_code === 200) {
                            const user = response.data.user
                            let imgContainerBody = `<img id="img-preview" src="{{ Storage::url('${user.photo_profile}') }}" alt="user-avatar" class="d-block rounded" height="100" width="100">`

                            $('#input-name-user').val(user.name)
                            $('#input-email-user').val(user.email)
                            $('#input-phone-number-user').val(user.super_admin.phone_number)
                            $('#input-address-user').val(user.super_admin.address)
                            $('#img-container').html("")
                            $('#img-container').html(imgContainerBody)
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
        })
    </script>
@endsection
