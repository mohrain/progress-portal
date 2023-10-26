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

                        <a class="nav-link text-white" href="/login"><i class="bi bi-lock"></i> Login</a>

                    </div>
                    <div>
                        <a class="nav-link text-white" href="https://mail.nepal.gov.np"><i class="bi bi-envelope"></i>
                            Check mail</a>
                    </div>
                    <select class="bg-theme-color-red borderless" style="Border: none;">
                        <option value="np" selected>NP</option>
                        <option value="en">EN</option>
                    </select>
                    <div class="btn text-white">
                        +A
                    </div>
                    <div class="btn text-white">
                        A
                    </div>
                    <div class="btn text-white">
                        -A
                    </div>
                    <div class="btn" id="toggleButton">
                       <b>A</b> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
