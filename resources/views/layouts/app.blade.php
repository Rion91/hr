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
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
    {{--DateRangePicker--}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
    {{--style--}}
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    {{--select2--}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>
<body class="font-sans antialiased body">
<div class="page-wrapper chiller-theme">
    {{--side-bar--}}
    <x-side-bar/>
    <!-- Page Heading -->
    <div class="header-bar">
        <div class="d-flex justify-content-center">
            <div class="col-md-8">
                <div class="d-flex sm-justify-content-between justify-content-between">
                    @if(request()->is('/'))
                        <a id="show-sidebar" href="#">
                            <i class="fas fa-bars"></i>
                        </a>
                    @else
                        <a id="back-btn" href="#">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    @endif
                    <h5 class="mb-0">@yield('header')</h5>
                    <a href=""></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content -->
    <div class="py-4 content">
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
                    <a href="{{ route('dashboard') }}">
                        <i class="fa fa-home"></i>
                        <p class="mb-0">Home</p>
                    </a>
                    <a href="{{ route('dashboard') }}">
                        <i class="fa fa-tachometer-alt"></i>
                        <p class="mb-0">Dashboard</p>
                    </a>
                    <a href="">
                        <i class="fa fa-home"></i>
                        <p class="mb-0">Home</p>
                    </a>
                    <a href="{{ route('profile.index')}}">
                        <i class="fa fa-user-alt"></i>
                        <p class="mb-0">Profile</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- MDB -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>--}}
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<!-- datatable -->
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript"
        src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.13/features/mark.js/datatables.mark.js"></script>
<script src="https://cdn.jsdelivr.net/g/mark.js(jquery.mark.min.js)"></script>
<!-- date range picker -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
<!-- sweet alert 2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- sweet alert 1 -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- select 2 -->
<script  src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- side-bar -->
<script type="text/javascript" src="{{ asset('js/sidebar.js') }}"></script>
<script>
    $(function ($) {
        @if(request()->is('/'))
        document.addEventListener('click', function (event) {
            if (document.getElementById('show-sidebar').contains(event.target)) {
                $(".page-wrapper").addClass("toggled");
            } else if (!document.getElementById('sidebar').contains(event.target)) {
                $(".page-wrapper").removeClass("toggled");
            }
        });
        @endif
        let token = document.head.querySelector('meta[name="csrf-token"]');
        if (token) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': token.content
                }
            });
        } else {
            console.log('error');
        }

            @if(session('create')){
            Swal.fire({
                title: 'Successfully created!',
                text: "{!! session('create') !!}",
                icon: 'success',
                confirmButtonText: 'Ok!'
            })
        }
            @endif

            @if(session('updated')){
            Swal.fire({
                title: 'Successfully updated!',
                text: "{!! session('updated') !!}",
                icon: 'success',
                confirmButtonText: 'Ok!'
            })
        }
        @endif

        //datatable defaults
        $.extend(true, $.fn.dataTable.defaults, {
            mark: true,
            responsive: true,
            processing: true,
            serverSide: true,
            columnDefs: [
                {
                    "targets": "hidden",
                    "visible": false,
                },
                {
                    "targets": [0],
                    "class": "control",
                },
                {
                    "targets": "noOrder",
                    "orderable": false,
                },
                {
                    "targets": "noSearch",
                    "searchable": false,
                }
            ],
            language: {
                "paginate": {
                    "next": "<i class='fa-solid fa-angle-right'></i>",
                    "previous": "<i class='fa-solid fa-angle-left'></i>"
                },
                "processing": "<img src='/images/loading.gif' style='width: 50px; height: 50%;'/>"
            },
        });

        //back btn
        $('#back-btn').on('click', function (e) {
            e.preventDefault();
            window.history.go(-1);
            return false;
        });

        $('.select-hr').select2();
    });
</script>
@yield('script')
</body>
</html>
