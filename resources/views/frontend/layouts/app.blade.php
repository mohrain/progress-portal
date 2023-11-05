<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ? $title . ' - ' : '' }} {{ config('app.name') }}</title>
    <!-- Favicons -->
    <link href="{{ asset('images/nep-gov-logo.png') }}" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,500;1,600;1,700&family=Noto+Sans:wght@400;500;600;700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;1,700&display=swap" rel="stylesheet">

    {{--
        font-family: 'Montserrat', sans-serif;
        font-family: 'Noto Sans', sans-serif;
        font-family: 'Poppins', sans-serif;
    --}}
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

        .font-noto {
            font-family: 'Noto Sans', sans-serif;
        }

        .font-poppins {
            font-family: 'Poppins', sans-serif;
        }

        .font-mont {
            font-family: 'Montserrat', sans-serif;
        }

        .feature-img {
            border: 1px solid #ddd;
            width: 100%;
            object-fit: fill;
            position: relative;

        }

        .feature-image {
            height: 200px;
            object-fit: cover;
            position: relative;
            /* margin: 20px; */
        }

        .profile-image {
            border: 1px solid #ddd;
            border-radius: 50%;
            padding: 2px;
            width: 250px;
            height: 250px;
            object-fit: cover;
            position: relative;

        }

        .box {
            box-shadow: 1px 2px 8px -3px rgba(0, 0, 0, 0.66);
            background-color: #fff;
            border-radius: 10px 10px 10px 10px;
        }

        label.required:after {
            content: ' *';
            color: #fa5661;
        }

        .invert-colors {
            filter: invert(100%);
            background-color: black;
            color: white;
        }

        body {
            transition: font-size 0.3s;
        }

    </style>
    @stack('styles')
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

<body>
    <div id="content">
        <div style="background: linear-gradient(hsl(0deg 0% 100% / 95%),hsl(0deg 0% 100% / 95%)),url(/images/bg_nepal.png) 50% no-repeat;">
            @include('frontend.layouts.top-nav')
            @include('frontend.layouts.header')
        </div>
        @include('frontend.layouts.desktop-nav')
        @include('frontend.layouts.mobile-nav')
        <!-- Content here -->
        <div class="my-4">
            @yield('content')
        </div>
        @include('frontend.layouts.footer')
    </div>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/nepali-datepicker-v4/js/nepali.datepicker.v4.0.1.min.js') }}" type="text/javascript">
    </script>
    <script>
        // Function to toggle color inversion
        function toggleInvertColors() {
            const body = document.body;
            body.classList.toggle("invert-colors");
        }

        // Add a click event listener to the button
        const toggleButton = document.getElementById("toggleButton");
        toggleButton.addEventListener("click", toggleInvertColors);

    </script>

    <script>
        let currentFontSize = 16; // Initial font size in pixels

        function zoomIn() {
            currentFontSize += 2; // Increase font size by 2 pixels
            applyFontSize();
        }

        function zoomOut() {
            currentFontSize -= 2; // Decrease font size by 2 pixels
            applyFontSize();
        }

        function resetZoom() {
            currentFontSize = 16; // Reset font size to the original size
            applyFontSize();
        }

        function applyFontSize() {
            document.body.style.fontSize = currentFontSize + 'px';
        }

    </script>
    <script>
        function toggleImageLoading() {
            const images = document.querySelectorAll('img');
            const loadImages = document.getElementById('loadImages').checked;

            images.forEach(image => {
                if (loadImages) {
                    // Load the images by setting the src attribute
                    image.src = image.getAttribute('data-src');
                } else {
                    // Remove the src attribute to prevent the images from loading
                    // image.removeAttribute('src');
                    location.reload(true);
                }
            });
        }

    </script>

    <!-- Facebook JavaScript SDK -->
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v13.0";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

    </script>

    <script>
        var elm = document.getElementsByClassName("nepali-date-picker");
        /* Initialize Datepicker with options */
        elm.nepaliDatePicker({
            ndpYear: true
            , ndpMonth: true
            , ndpYearCount: 200,
            // readOnlyInput: true
        });

    </script>
    @stack('scripts')
</body>
</html>
