<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ? $title . ' - ' : '' }} {{ config('app.name') }}</title>
    <!-- Favicons -->
    <link href="{{ asset('images/nep-gov-logo.png') }}" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('assets/nepali-datepicker-v4/css/nepali.datepicker.v4.0.1.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        @font-face {
            font-family: Kalimati;
            src: url("{{ asset('assets/fonts/Kalimati.ttf') }}") format('truetype');

        }

        .kalimati-font {
            font-family: 'Kalimati';
        }

        .feature-img {
            border: 1px solid #ddd;
            max-width: 100%;
            max-height: 80vh;
            object-fit: fill;
            position: relative;

        }

        .feature-image {
            max-height: 180px;
            object-fit: cover;
            position: relative;
            /* margin: 20px; */
        }

        label.required:after {
            content: ' *';
            color: #fa5661;
        }
    </style>
    @stack('styles')


</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

<body>
    @include('frontend.layouts.top-nav')
    @include('frontend.layouts.header')
    @include('frontend.layouts.desktop-nav')
    @include('frontend.layouts.mobile-nav')
    <!-- Content here -->
    <div class="my-4">
        @yield('content')
    </div>
    @include('frontend.layouts.footer')

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"
        integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/nepali-datepicker-v4/js/nepali.datepicker.v4.0.1.min.js') }}" type="text/javascript">
    </script>
    @stack('scripts')


</body>

</html>
