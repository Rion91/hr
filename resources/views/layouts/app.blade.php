<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    {{-- Data Table --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    {{--style--}}
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body class="font-sans antialiased">
<div class="page-wrapper chiller-theme">
    {{--side-bar--}}
    <x-side-bar/>
    <!-- Page Heading -->
    <div class="header-bar">
        <div class="d-flex justify-content-center">
            <div class="col-md-8">
                <div class="d-flex sm-justify-content-between justify-content-between">
                    <a id="show-sidebar" href="#">
                        <i class="fas fa-bars"></i>
                    </a>
                    <h5 class="mb-0">@yield('header')</h5>
                    <a href=""></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content -->
    <div class="py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- Page Bottom -->
    <div class="bottom-bar">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="d-flex justify-content-between">
                    <a href="">
                        <i class="fa fa-home"></i>
                        <p class="mb-0">Home</p>
                    </a>
                    <a href="">
                        <i class="fa fa-home"></i>
                        <p class="mb-0">Home</p>
                    </a>
                    <a href="">
                        <i class="fa fa-home"></i>
                        <p class="mb-0">Home</p>
                    </a>
                    <a href="">
                        <i class="fa fa-home"></i>
                        <p class="mb-0">Home</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- MDB -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<!-- datatable -->
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js">
</script>
<!-- side-bar -->
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>

@yield('script')
</body>
</html>
