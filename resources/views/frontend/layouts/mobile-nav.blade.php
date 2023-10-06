<nav class="navbar sticky-top  mobile-nav">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">
        <div class="d-flex gap-2">
            <div>
                <img class="mobile-logo" src="{{asset('images/pradeshsavalogo-sudurpaschim.png')}}" alt="pradeshsavalogo-sudurpaschim" srcset="">
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
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" style="color: #fff;">
        <i class="bi bi-list"></i>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            @include('frontend.layouts.nav-link')
        </div>
      </div>
    </div>
  </nav>