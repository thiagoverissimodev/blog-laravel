<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Painel Administrativo - {{ config('app.name', 'Laravel') }}</title>
    <meta name="base-url" content="{!!url('/')!!}"/>
    <input type="hidden" id="web-router" value="{{url('/dashboard')}}">

    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/image/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/image/favicon-16x16.png')}}">

    {{-- @yield('styles') --}}
    <!-- Custom fonts for this template-->
    <link href="{{asset('assets/dashboard/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="{{asset('assets/dashboard/css/sb-admin-2.css')}}" rel="stylesheet">
    <!-- summernote editor-->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    
</head>

<body id="page-top">
<!-- Page Wrapper -->
    <div id="wrapper">
        @include('layouts.inc.dashboard-sidebar')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                @include('layouts.inc.dashboard-header')
                
                @yield('content')

                @include('layouts.inc.dashboard-footer')
            </div>
        </div>
    </div>
    {{-- @include('layouts.inc.dashboard-content') --}}



    {{-- @vite(['resources/js/app.js']) --}}
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
    @yield('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('assets/dashboard/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('assets/dashboard/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('assets/dashboard/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('assets/dashboard/vendor/chart.js/Chart.min.js')}}"></script>
    <!-- Page level custom scripts -->
    <script src="{{asset('assets/dashboard/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/demo/chart-pie-demo.js')}}"></script>

    <!-- Main JS-->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script>
        var baseUrl = $('meta[name="base-url"]').attr("content");

        $(".btn-delete").on("click", function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            new Swal({
                title: 'Deseja realmente excluir esse item?',
                text: "Não será possivel a recuperação do mesmo.",
                icon: 'error',
                showDenyButton: true,
                confirmButtonText: 'Excluir',
                denyButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                window.location.href = url;
                    } else if (result.isDenied) {
                        Swal.fire('Operação cancelada', '', 'info')
                    }
            });
        });
        $('#editor').summernote({
            height: 300
        });
    </script>

</body>
</html>