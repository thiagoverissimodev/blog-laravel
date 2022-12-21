<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Technology In Aeternum') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,300;1,900&display=swap"
        rel="stylesheet">

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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Technology In Aeternum</title>
    <link rel="icon" href="{{ asset('site/images/icon-logo.jpg') }}" type="image/icon type">
</head>

<body>

    @include('layouts.inc.site-header')
    <main class="bg-gradient-main">
        @yield('content')
    </main>

    @yield('footer')
    @include('layouts.inc.site-footer')

    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    @yield('scripts')
    <!-- Jquery JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Main JS-->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
