<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} | {{ $title }}</title>

    <link href="{{ asset('assets/css/main/sneat.css') }}" rel="stylesheet">
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            {{-- Sidebar Menu --}}
            @include('partials.super_admin.sidebar')
            {{-- End Sidebar --}}
            <div class="layout-page">
                {{-- Header --}}
                @include('partials.super_admin.header')
                {{-- End Header --}}

                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content')
                    </div>
                    @include('partials.super_admin.footer')
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/JQuery/jquery.min.js') }}"></script>
</body>

</html>
