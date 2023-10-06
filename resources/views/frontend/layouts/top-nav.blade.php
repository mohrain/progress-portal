<div class="bg-theme-color-red top-nav">
    <nav class="navbar navbar-expand-lg" style="padding-bottom: 0px; padding-top: 0px;">
        <div class="container">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item px-1">
                        <a class="nav-link text-white" href="tel:{{ settings('phone') }}">
                            <i class="bi bi-telephone"></i> 
                            {{ settings('phone') }} 
                        </a>
                    </li>
                    <li class="nav-item px-1">
                        <a class="nav-link text-white" href="mailto:{{ settings('phone') }}">
                            <i class="bi bi-envelope-at"></i> {{ settings('email') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        {{-- <a class="nav-link" href="#">Pricing</a> --}}
                    </li>
                </ul>
                <span class="navbar-text">
                    <div class="d-flex gap-2">
                        <a class="nav-link text-white" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                        <a class="nav-link text-white" href="#"><i class="bi bi-envelope"></i> Check Mail</a>
                        <a class="nav-link text-white" href="#">
                            <img src="{{asset('images/live.png')}}" alt="" srcset="" style="height: 20px;">
                        </a>
                    </div>
                </span>
            </div>
        </div>
    </nav>
</div>
