<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 my-1">
                <div class="fw-bold">सम्पर्क ठेगाना</div>
                <hr>
                <div class="py-1">
                    <a class="text-white" href="#">
                        <i class="bi bi-geo-alt"></i> {{ settings('address_line_one') }}
                    </a>
                </div>
                <div class="py-1">
                    <a class="text-white" href="tel:{{ settings('phone') }}">
                        <i class="bi bi-telephone"></i>
                        {{ settings('phone') }}
                    </a>
                </div>
                <div class="py-1">
                    <a class="text-white" href="mailto:{{ settings('phone') }}">
                        <i class="bi bi-envelope-at"></i> {{ settings('email') }}
                    </a>
                </div>
                <div class="social-media-icon">
                    <a href="" target="_blank" rel="noopener noreferrer">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="" target="_blank" rel="noopener noreferrer">
                        <i class="bi bi-twitter-x"></i>
                    </a>
                    <a href="" target="_blank" rel="noopener noreferrer">
                        <i class="bi bi-youtube"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-3 my-1">
                <div class="d-flex gap-3">
                    <div>
                        <div class="fw-bold text-center">प्रवक्ता</div>
                        <hr>
                        <div class="card" style="width: 8rem;">
                            <img src="{{ asset('images/profile/bhim-bahadur.jpeg') }}" class="card-img-top"
                                alt="...">
                            <div class="text-center p-2">
                                <h6 class="card-title text-dark">माननीय भीम बहादुर भण्डारी</h6>
                                {{-- <small class="text-muted">प्रवक्ता</small> --}}
                                <small class="text-muted">९८४८७६१९१७</small>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="fw-bold text-center">सूचना अधिकारी</div>
                        <hr>
                        <div class="card" style="width: 8rem;">
                            <img src="{{ asset('images/profile/bhim-bahadur.jpeg') }}" class="card-img-top"
                                alt="...">
                            <div class="text-center p-2">
                                <h6 class="card-title text-dark">माननीय भीम बहादुर भण्डारी</h6>
                                {{-- <small class="text-muted">सूचना अधिकारी</small> --}}
                                <small class="text-muted">९८४८६८९७८४</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 my-1">
                <div class="text-center fw-bold">डाउनलोड नेपाली युनिकोड / फन्ट</div>
                <hr>
                <div>
                    <small class="p-1">
                        <i class="bi bi-chevron-double-right"></i> <a href="{{ asset('fonts/nepali_romanised.zip') }}"
                            rel="noopener noreferrer">नेपाली युनिकोड रोमनाइज</a>
                    </small>
                </div>
                <div>
                    <small class="p-1">
                        <i class="bi bi-chevron-double-right"></i> <a href="{{ asset('fonts/nepali_Traditional.zip') }}"
                            rel="noopener noreferrer">नेपाली युनिकोड ट्रेडिसनल</a>
                    </small>
                </div>
                <div>
                    <small class="p-1">
                        <i class="bi bi-chevron-double-right"></i> <a href="{{ asset('fonts/Kalimati.ttf') }}"
                            rel="noopener noreferrer">Kalimati</a>
                    </small>
                </div>
                <div>
                    <small class="p-1">
                        <i class="bi bi-chevron-double-right"></i> <a href="{{ asset('fonts/PREETI.TTF') }}"
                            rel="noopener noreferrer">Preeti</a>
                    </small>
                </div>
                <div>
                    <small class="p-1">
                        <i class="bi bi-chevron-double-right"></i> <a href="{{ asset('fonts/HIMALI.TTF') }}"
                            rel="noopener noreferrer">Himali</a>
                    </small>
                </div>
                <div>
                    <small class="p-1">
                        <i class="bi bi-chevron-double-right"></i> <a href="{{ asset('fonts/SAGAR.TTF') }}"
                            rel="noopener noreferrer">Sagar</a>
                    </small>
                </div>
                <div>
                    <small class="p-1">
                        <i class="bi bi-chevron-double-right"></i> <a href="{{ asset('fonts/kokila.zip') }}"
                            rel="noopener noreferrer">Kokila</a>
                    </small>
                </div>
                <div>
                    <small class="p-1">
                        <i class="bi bi-chevron-double-right"></i> <a href="{{ asset('fonts/pscnepal.TTF') }}"
                            rel="noopener noreferrer">PSC Nepal</a>
                    </small>
                </div>

            </div>
            <div class="col-md-3 my-1">
                <b>महत्वपुर्ण लिंकहरु</b>
                <hr>
                <div>
                    <small class="p-1">
                        <i class="bi bi-link-45deg"></i> <a href="https://nepal.gov.np/" target="_blank"
                            rel="noopener noreferrer">नेपाल सरकारको पोर्टल</a>
                    </small>
                </div>
                <div>
                    <small class="p-1">
                        <i class="bi bi-link-45deg"></i> <a href="https://www.opmcm.gov.np/" target="_blank"
                            rel="noopener noreferrer">प्रधानमन्त्री तथा मन्त्रिपरिषद्को कार्यालय</a>
                    </small>
                </div>
                <div>
                    <small class="p-1">
                        <i class="bi bi-link-45deg"></i> <a href="https://hr.parliament.gov.np/np" target="_blank"
                            rel="noopener noreferrer">प्रतिनिधि सभा,नेपाल</a>
                    </small>
                </div>
                <div>
                    <small class="p-1">
                        <i class="bi bi-link-45deg"></i> <a href="https://pradeshsabha.koshi.gov.np/" target="_blank"
                            rel="noopener noreferrer">प्रदेश सभा, कोशी प्रदेश</a>
                    </small>
                </div>
                <div>
                    <small class="p-1">
                        <i class="bi bi-link-45deg"></i> <a href="https://provincialassembly.p2.gov.np/" target="_blank"
                            rel="noopener noreferrer">प्रदेश सभा, मधेश प्रदेश</a>
                    </small>
                </div>
                <div>
                    <small class="p-1">
                        <i class="bi bi-link-45deg"></i> <a href="https://provincialassembly.bagamati.gov.np/"
                            target="_blank" rel="noopener noreferrer">प्रदेश सभा, बागमती प्रदेश</a>
                    </small>
                </div>
                <div>
                    <small class="p-1">
                        <i class="bi bi-link-45deg"></i> <a href="https://pradeshsabha.gandaki.gov.np/"
                            target="_blank" rel="noopener noreferrer">प्रदेश सभा, गण्डकी प्रदेश</a>
                    </small>
                </div>
                <div>
                    <small class="p-1">
                        <i class="bi bi-link-45deg"></i> <a href="https://assembly.lumbini.gov.np/" target="_blank"
                            rel="noopener noreferrer">प्रदेश सभा, लुम्बिनी प्रदेश</a>
                    </small>
                </div>
                <div>
                    <small class="p-1">
                        <i class="bi bi-link-45deg"></i> <a href="https://assembly.karnali.gov.np/np" target="_blank"
                            rel="noopener noreferrer">प्रदेश सभा, कर्णाली प्रदेश</a>
                    </small>
                </div>
            </div>

        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">

            </div>
        </div>
    </div>
</div>
<div class="py-2">
    <div class="container">
        <div class="d-flex justify-content-between">
            <div>
                <span> <strong>&copy; {{ date('Y') }}</strong>. प्रदेश सभा, सुदूरपश्‍चिम प्रदेश प्रदेश सभा सचिवालय.
                    सर्वाधिकार सुरक्षित</span>
            </div>
            <div>
                Powered By <a href="https://mohrain.com">Mohrain</a>
            </div>
        </div>
    </div>
</div>
