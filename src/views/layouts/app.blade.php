<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <script src="{{ asset('js/fontawesome.js') }}"></script>

        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
        
        <style>
            .error-help-block{
                color: red;
            }
        </style>
        <meta type="hidden" name="csrf-token" content="{{ csrf_token() }}">
        @yield('head')

    </head>
    <body class="sb-nav-fixed">
        <!-- navbar -->
        @include('layouts.partials.nav')

        <div id="layoutSidenav">
            <!-- sidebar -->
            @include('layouts.partials.sidebar')           

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        @yield('content')
                    </div>
                </main>
                @yield('modal')
                @include('layouts.partials.footer')              
            </div>
        </div>

        <script src="{{ asset('js/bootstrap.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('js/sweetalert.js') }}"></script>
       
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script src="{{ asset('js/jquery.js') }}"></script>

        <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

        @yield('script')

    </body>
</html>
