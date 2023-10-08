<div class="bg-theme-color-red top-nav">
    <div class="container">
        <div class="d-flex justify-content-between">
            <div class="d-flex">
                <div>
                    <a class="nav-link text-white" href="tel:{{ settings('phone') }}">
                        <i class="bi bi-telephone"></i>
                        {{ settings('phone') }}
                    </a>
                </div>
                <div>
                    <a class="nav-link text-white" href="mailto:{{ settings('phone') }}">
                        <i class="bi bi-envelope-at"></i> {{ settings('email') }}
                    </a>
                </div>
            </div>
            <div class="d-flex">
                <div class="d-flex">
                    <div>

                        <a class="nav-link text-white" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>

                    </div>
                    <div>
                        <a class="nav-link text-white" href="#"><i class="bi bi-envelope"></i> Check mail</a>
                    </div>
                    <div>
                        <a class="nav-link text-white" href="#">
                            <img src="{{ asset('images/live.png') }}" alt="" srcset=""
                                style="height: 20px;">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
