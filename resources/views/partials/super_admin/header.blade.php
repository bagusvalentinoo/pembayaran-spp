<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- Place this tag where you want the button to render. -->
            <li class="nav-item lh-1 me-3">
                <span></span>
            </li>

            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <div class="avatar avatar-online">
                        <img src="{{ Storage::url($user->photo_profile) }}" alt=""
                            class="w-px-40 h-auto rounded-circle">
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img src="{{ Storage::url($user->photo_profile) }}" alt=""
                                            class="w-px-40 h-auto rounded-circle">
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block">{{ $user->name }}</span>
                                    <small class="text-muted">{{ $user->roles->first()->name }}</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('web.super_admin.profile.index') }}">
                            <i class="bx bx-user me-2"></i>
                            <span class="align-middle">My Profile</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <button type="button" id="btn-logout" class="dropdown-item">
                            <i class="bx bx-power-off me-2"></i>
                            <span class="align-middle">Log Out</span>
                        </button>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>

{{-- Sweet Alert --}}
<script src="{{ asset('assets/js/sweetalert/sweetalert2@11.js') }}"></script>

{{-- JQuery --}}
<script src="{{ asset('assets/js/JQuery/jquery.min.js') }}"></script>

<script type="application/javascript">
    $('#btn-logout').on('click', function (event) {
        event.preventDefault()

        Swal.fire({
            title: 'Apakah yakin ingin logout?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#CF2F0D',
            cancelButtonColor: '#8B8B8B',
            confirmButtonText: 'Ya, logout!'
            }).then((result) => {
            if (result.isConfirmed) {
                const btnLogout = $(this)

                btnLogout.attr("disabled", true)
                btnLogout.html('Logout...')

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                
                $.LoadingOverlay("show", {
                    image: "",
                    fontawesome: "fa fa-spinner fa-spin"
                })

                $.ajax({
                    type: 'POST',
                    url: "{{ route('api.general.auth.logout') }}",
                    success: function (response) {
                        window.location = "{{ route('web.public.auth.loginPage') }}"
                    },
                    error: function (response) {
                        const responseJson = response.responseJSON

                        if (response.status === 422) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Validasi Error',
                                text: responseJson.message
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: responseJson.message
                            })
                        }
                    },

                    complete: function () {
                        $.LoadingOverlay("hide")
                    }
                })

                btnLogout.html('Logout')
                btnLogout.removeAttr("disabled")
            }
        })
    })
</script>
