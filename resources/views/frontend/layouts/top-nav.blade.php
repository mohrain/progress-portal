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

                        <a class="nav-link text-white" href="/login"><i class="bi bi-lock"></i> लगइन</a>

                    </div>
                    {{-- <div>
                        <a class="nav-link text-white" href="https://mail.nepal.gov.np"><i class="bi bi-envelope"></i>
                            Check mail</a>
                    </div> --}}
                    <select class="bg-theme-color-red borderless" style="Border: none;">
                        <option value="np" selected>NP</option>
                        <option value="en">EN</option>
                    </select>
                    <div class="btn text-white" onclick="zoomIn()" style="font-size: 17px;">
                        अ+
                    </div>
                    <div class="btn text-white" onclick="resetZoom()" style="font-size: 14px;">
                        अ
                    </div>
                    <div class="btn text-white text-center" onclick="zoomOut()" style="font-size: 11px;">
                        अ-
                    </div>
                    <div class="btn" id="toggleButton">
                        अ
                    </div>
                    <div class="btn text-white">
                        <div class="form-check form-switch">

                            <input class="form-check-input" type="checkbox" id="loadImages"
                                onclick="toggleImageLoading()">
                            <label class="form-check-label" for="loadImages">कम ब्यान्डविथ</label>
                        </div>
                    </div>
                    <div>
                        <div>
                            <div class="text-white" style="font-size: 10px;">
                                डाउनलोड एप
                            </div>
                            <div>
                                <a href="#" class="mx-2">
                                    <span class="text-white fs-6">
                                        <i class="bi bi-android2"></i>
                                    </span>
                                </a>
                                <a href="#">
                                    <span class="text-dark fs-6">
                                        <i class="bi bi-apple"></i>
                                    </span>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
