<div class="bg-theme-color-re top-nav" style="color: #333237;">
    <div class="container">
        <div class="d-flex justify-content-between">
            <div class="d-flex align-items-center topbar-menu">
                <div class="topbar-menu-item">
                    <a href="tel:{{ settings('phone') }}">
                        <i class="bi bi-telephone me-1"></i>
                        {{ settings('phone') }}
                    </a>
                </div>
                {{-- <div class="topbar-v-divider" style="border-left: 1px solid rgb(217 217 217 / 46%)"></div> --}}
                <div class="topbar-menu-item">
                    <a href="mailto:{{ settings('phone') }}">
                        <i class="bi bi-envelope-at me-1"></i> {{ settings('email') }}
                    </a>
                </div>
            </div>
            <div class="">
                <div class="d-flex align-items-center topbar-menu">
                    <div class="topbar-menu-item">
                        <a href="/login"><i class="bi bi-lock"></i> लगइन</a>
                    </div>
                    {{-- <div>
                        <a class="topbar-menu-item" href="https://mail.nepal.gov.np"><i class="bi bi-envelope"></i>
                            Check mail</a>
                    </div> --}}
                    {{-- <div class="topbar-menu-item">
                        <select class="bg-transparent" style="Border: none;">
                            <option value="np" selected>NP</option>
                            <option value="en">EN</option>
                        </select>
                    </div> --}}
                    <div class="topbar-menu-item">
                        <div class="dropdown">
                            <button class="border rounded bg-white border-0 dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-earth text-muted me-2"></i> NP
                            </button>
                            <ul class="dropdown-menu py-0" aria-labelledby="dropdownMenu2">
                                <li><button class="dropdown-item" type="button">English</button></li>
                                <li><button class="dropdown-item" type="button">Nepali</button></li>
                            </ul>
                        </div>
                    </div>
                    <div class="topbar-menu-item d-flex gap-3 align-items-center">
                        <div class="text-center" onclick="zoomOut()" style="font-size: 11px; cursor: pointer;">
                            अ-
                        </div>
                        <div onclick="resetZoom()" style="font-size: 14px; cursor: pointer;">
                            अ
                        </div>
                        <div onclick="zoomIn()" style="font-size: 17px; cursor: pointer;">
                            अ+
                        </div>
                    </div>
                    <div class="topbar-menu-item">
                        <div id="toggleButton" style="cursor: pointer">
                            <i class="bi bi-eye"></i>
                        </div>
                    </div>
                    <div class="topbar-menu-item btn">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="loadImages" onclick="toggleImageLoading()">
                            <label class="form-check-label" for="loadImages">कम ब्यान्डविथ</label>
                        </div>
                    </div>
                    <div class="topbar-menu-item">
                        <div class="d-inline-flex gap-2">
                            <div class=" style=" font-size: 10px;">
                                डाउनलोड एप
                            </div>
                            <div>
                                <a href="#" class="mx-2">
                                    <i class="bi bi-android2"></i>
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    <i class="bi bi-apple"></i>
                                </a>
                            </div>
                            <div>
                                <a href="https://pga.sudurpashchim.gov.np/" class="text-danger" target="_blank">
                                    पुरानो साईट
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
