<nav class="navbar sticky-top  mobile-nav">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <div class="d-flex gap-2">
                <div>
                    <img class="mobile-logo" src="{{ asset('images/sudurpashchim-province-assembly-logo-400x400.png') }}"
                        alt="pradeshsava-logo-sudurpaschim">
                </div>
                <div class="mobile-brand">
                    <div class="sub-title">{{ settings('app_name') }}</div>
                    <div class="title">
                        {{ settings('office_name') }}
                    </div>
                    <div class="sub-title"">{{ settings('province_name') }}, {{ settings('address_line_one') }}</div>
                </div>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar" style="color: #fff;">
            <i class="bi bi-list"></i>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel"></h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    @include('frontend.layouts.nav-link')
                </ul>
            </div>
        </div>
    </div>
</nav>

<nav class="navbar fixed-bottom navbar-light bg-white shadow-lg border-top d-md-none d-block">
    <div class="container d-flex justify-content-around">
        <!-- Home -->
        <a href="/" class="nav-item text-center text-decoration-none text-muted">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                class="bi bi-house-door">
                <path
                    d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z" />
            </svg>
            <div class="small">होम </div>
        </a>

        <!-- Jobs -->


        <a href="{{ route('prdesh-shava-news') }}" class="nav-item text-center text-decoration-none text-muted">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-newspaper" viewBox="0 0 16 16">
                <path
                    d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5z" />
                <path
                    d="M2 3h10v2H2zm0 3h4v3H2zm0 4h4v1H2zm0 2h4v1H2zm5-6h2v1H7zm3 0h2v1h-2zM7 8h2v1H7zm3 0h2v1h-2zm-3 2h2v1H7zm3 0h2v1h-2zm-3 2h2v1H7zm3 0h2v1h-2z" />
            </svg>
            <div class="small">सुचना </div>
        </a>

        <!-- Drop CV -->
        <a href="{{ route('prdesh-shava-downloads') }}" class="nav-item text-center text-decoration-none text-muted">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">
                <path
                    d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293z" />
                <path
                    d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
            </svg>
            <div class="small">फारम </div>
        </a>

        <a href="/contact-us" class="nav-item text-center text-decoration-none text-muted">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-chat-dots" viewBox="0 0 16 16">
                <path
                    d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                <path
                    d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9 9 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.4 10.4 0 0 1-.524 2.318l-.003.011a11 11 0 0 1-.244.637c-.079.186.074.394.273.362a22 22 0 0 0 .693-.125m.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6-3.004 6-7 6a8 8 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a11 11 0 0 0 .398-2" />
            </svg>
            <div class="small">सम्पर्क </div>
        </a>

        <!-- Contact -->

    </div>
</nav>

@push('styles')
    <style>
        .navbar.fixed-bottom {
            position: fixed !important;
            bottom: 0;
            width: 100%;
            z-index: 1030;
            /* Ensure it's above other elements */
        }
    </style>
@endpush
