<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Technology In Aeternum') }}</title> --}}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,300;1,900&display=swap"
        rel="stylesheet"> --}}

    <!-- Scripts -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    @vite(['resources/js/app.js'])
    @yield('styles')

    <title>Technology In Aeternum</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/image/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/image/favicon-16x16.png')}}">
    
</head>

<body>

    <main class="bg-gradient-main">
        @include('layouts.inc.site-header')
        @yield('content')
    </main>

    @yield('footer')
    @include('layouts.inc.site-footer')

    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    @yield('scripts')
    <!-- Jquery JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            // let logo = "<?php asset('assets/image/aeternum.png');?>";
            $(window).scroll(function() {
                var scroll = $(window).scrollTop();
                if (scroll > 120) {
                    $(".change-color-scroll").css("background", "#000");
                    $(".change-color-scroll").removeClass("bg-glassmorphim");
                } else {
                    $(".change-color-scroll").css("background", "transparent");
                    $(".change-color-scroll").addClass("bg-glassmorphim");
                }
            })
        })
    </script>
</body>
</html>