<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 my-1 text-center">
                <div class="fw-bold">सम्पर्क ठेगाना</div>
                <hr>
                <h5 class="fw-bolder">{{ settings('app_name') }}</h5>
                <h6 class="text-white fw-bold">{{ settings('office_name') }}</h6>
                <div class="py-1">
                    <a class="text-white" href="#">
                        <i class="bi bi-geo-alt"></i> {{ settings('province_name') }}, {{ settings('address_line_one') }}
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
                    <a href="{{ settings('facebook') }}" target="_blank" rel="noopener noreferrer">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="{{ settings('twitter') }}" target="_blank" rel="noopener noreferrer">
                        <i class="bi bi-twitter-x"></i>
                    </a>
                    <a href="{{ settings('youtube') }}" target="_blank" rel="noopener noreferrer">
                        <i class="bi bi-youtube"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-4 my-1">
                <x-frontend-information-officer-employee-view />
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
                            rel="noopener noreferrer">नेपाली युनिकोड
                            ट्रेडिसनल</a>
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
            <div class="col-md-2 my-1">
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
                        <i class="bi bi-link-45deg"></i> <a href="https://p7.gov.np/" target="_blank"
                            rel="noopener noreferrer">सुदूरपश्चिम प्रदेश पोर्टल</a>
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
                        <i class="bi bi-link-45deg"></i> <a href="https://pradeshsabha.gandaki.gov.np/" target="_blank"
                            rel="noopener noreferrer">प्रदेश सभा, गण्डकी प्रदेश</a>
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
        <div class="d-md-flex justify-content-evenly">
            <div>
                <a href="/">गृह पृष्ठ </a>
            </div>
            <div>
                <a href="{{ route('contact-us.create') }}">सम्पर्क गर्नुहोस् </a>
            </div>
            <div>
                <a href="{{ route('faq.frontend') }}">प्राय: सोधिने प्रश्नहरू</a>
            </div>
            <div>
                आगन्तुक गणना :
               <x-frontend.visitor-counter />
            </div>
        </div>
    </div>
</div>
<div class="py-2">
    <div class="container">
        <div class="d-md-flex justify-content-between">
            <div>
                <strong class="kalimati-font">&copy; {{ date('Y') }}</strong>. {{ settings('app_name') }}, {{ settings('province_name') }}, {{ settings('office_name') }}.
                सर्वाधिकार सुरक्षित 
            </div>
            <div>
                Designed and Developed By: <a href="https://mohrain.com">Mohrain</a>
            </div>
        </div>
    </div>
</div>
