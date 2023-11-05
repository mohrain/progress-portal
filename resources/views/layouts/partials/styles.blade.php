<link rel="icon" href="{{ asset(config('constants.nep_gov.logo_sm')) }}">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
{{-- <link href="{{ asset('assets/mdb/css/bootstrap.min.css') }}" rel="stylesheet"> --}}
{{-- <link href="{{ asset('assets/mdb/css/mdb.min.css') }}" rel="stylesheet"> --}}

<style>
    @font-face {
        font-family: Kalimati;
        src: url("{{ asset('assets/fonts/Kalimati.ttf') }}") format('truetype');

    }

    .kalimati-font {
        font-family: 'Kalimati';
    }

    #project {
        background-color: #12213A;
    }

    /* .unicode-font {
        font-family: 'noto';
    } */

    label.required:after {
        content: ' *';
        color: #fa5661;
    }

    .carousel-image {
        border: 1px solid #ddd;
        padding: 2px;
        max-width: 700px;
        height: 300px;
        object-fit: fill;
        position: relative;
        /* margin: 20px; */
    }

    .feature-image {
            height: 200px;
            object-fit: cover;
            position: relative;
            /* margin: 20px; */
        }

    .feature-image-thum {
        border: 1px solid #ddd;
        padding: 2px;
        width: 120px;
        height: 80px;
        object-fit: cover;
        position: relative;
        margin: 2px;
    }

    .profile {
        border: 1px solid #ddd;
        border-radius: 50%;
        padding: 2px;
        width: 200px;
        height: 200px;
        object-fit: cover;
        position: relative;
        margin: 20px;
    }

    .profile-nav {
        border: 1px solid #ddd;
        border-radius: 50%;
        padding: 2px;
        width: 40px;
        height: 40px;
        object-fit: cover;
        position: relative;
        margin: 2px;
    }

</style>
<link rel="stylesheet" href="{{ asset('assets/css/utilities.css') }}">
<link href="{{ asset('assets/mdb/css/addons/datatables.min.css') }}" rel="stylesheet">
{{-- <link rel="stylesheet" href="{{ asset('assets/css/nepali.datepicker.v3.min.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('assets/nepali-datepicker-v4/css/nepali.datepicker.v4.0.1.min.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />

@laravelPWA
