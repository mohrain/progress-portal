{{-- <div class="footer">
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
</div> --}}

<div
    style="background: linear-gradient(hsl(0deg 0% 100% / 95%),hsl(0deg 0% 100% / 95%)),url(/images/bg_nepal.png) 50% no-repeat;">
    <div class="border-top">
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        {{-- <div class="border-bottom mb-3">
                            <h5 class="fw-bold px-lg-5">सम्पर्क ठेगाना</h5>
                        </div> --}}
                        <div class="fw-bold">सम्पर्क ठेगाना</div>
                        <hr>
                        <div class="d-flex align-items-center mb-4">
                            <img src="{{ asset('assets/img/nep-gov-logo-sm.png') }}" class="footer-logo" alt="">
                            <h5 class="fw-bolder text-theme-color">&nbsp;{{ settings('office_name') }}</h5>
                        </div>
                        <div class="py-1">
                            <a class="" href="#">
                                <i class="bi bi-geo-alt"></i> {{ settings('province_name') }},
                                {{ settings('address_line_one') }}
                            </a>
                        </div>
                        <div class="py-1">
                            <a class="" href="tel:{{ settings('phone') }}">
                                <i class="bi bi-telephone"></i>
                                {{ settings('phone') }}
                            </a>
                        </div>
                        <div class="py-1 mb-3">
                            <a class="" href="mailto:{{ settings('phone') }}">
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
                    {{-- <div class="col-lg-4">
                        <div class="border-bottom mb-3">
                            <h5 class="fw-bold text-center">स. प्रवक्ता/सूचना अधिकारी</h5>
                        </div>
                    </div> --}}

                    <div class="col-lg-4 col-md-6 my-1">
                        {{-- <div class="border-bottom mb-3">
                            <h5 class="fw-bold text-center">स. प्रवक्ता/सूचना अधिकारी</h5>
                        </div> --}}
                        <x-frontend-information-officer-employee-view />
                    </div>
                    <div class="col-lg-4 col-md-12 my-1 important-links">
                        <div class="fw-bold md:text-center">महत्वपुर्ण लिंकहरु</div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-12 col-md-4 col-sm-6">
                                <small class="p-1">
                                    <i class="bi bi-link-45deg text-danger"></i> <a href="https://mofaga.gov.np/"
                                        target="_blank" rel="noopener noreferrer">सङ्‍घीय मामिला तथा सामान्य प्रशासन मन्त्रालय</a>
                                </small>
                            </div>
                            <div class="col-lg-12 col-md-4 col-sm-6">
                                <small class="p-1">
                                    <i class="bi bi-link-45deg text-danger"></i> <a href="https://p7.gov.np/"
                                        target="_blank" rel="noopener noreferrer">सुदूरपश्चिम प्रदेश पोर्टल</a>
                                </small>
                            </div>
                            <div class="col-lg-12 col-md-4 col-sm-6">
                                <small class="p-1">
                                    <i class="bi bi-link-45deg text-danger"></i> <a
                                        href="https://donidcr.gov.np/np" target="_blank"
                                        rel="noopener noreferrer">राष्ट्रिय परिचयपत्र तथा पञ्जिकरण विभाग</a>
                                </small>
                            </div>
                            <div class="col-lg-12 col-md-4 col-sm-6">
                                <small class="p-1">
                                    <i class="bi bi-link-45deg text-danger"></i> <a
                                        href="https://sutra.fcgo.gov.np/" target="_blank"
                                        rel="noopener noreferrer">स्थानीय सञ्चित कोष ब्यवस्थापन प्रणाली</a>
                                </small>
                            </div>
                            <div class="col-lg-12 col-md-4 col-sm-6">
                                <small class="p-1">
                                    <i class="bi bi-link-45deg text-danger"></i> <a
                                        href="https://plgsp.gov.np/" target="_blank"
                                        rel="noopener noreferrer">प्रादेशिक तथा स्थानीय शासन सहयोग कार्यक्रम</a>
                                </small>
                            </div>
                            <div class="col-lg-12 col-md-4 col-sm-6">
                                <small class="p-1">
                                    <i class="bi bi-link-45deg text-danger"></i> <a
                                        href="https://npc.gov.np/" target="_blank"
                                        rel="noopener noreferrer">राष्ट्रिय योजना आयोग</a>
                                </small>
                            </div>
                            <div class="col-lg-12 col-md-4 col-sm-6">
                                <small class="p-1">
                                    <i class="bi bi-link-45deg text-danger"></i> <a
                                        href="https://pis.gov.np/" target="_blank"
                                        rel="noopener noreferrer">राष्ट्रिय किताबखाना (निजामती)</a>
                                </small>
                            </div>
                            <div class="col-lg-12 col-md-4 col-sm-6">
                                <small class="p-1">
                                    <i class="bi bi-link-45deg text-danger"></i> <a
                                        href="https://stro.gov.np/" target="_blank"
                                        rel="noopener noreferrer">राष्ट्रिय किताबखाना (शिक्षक)</a>
                                </small>
                            </div>
                            <div class="col-lg-12 col-md-4 col-sm-6">
                                <small class="p-1">
                                    <i class="bi bi-link-45deg text-danger"></i> <a
                                        href="https://epf.org.np" target="_blank"
                                        rel="noopener noreferrer">कर्मचारी सञ्चय कोष</a>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="py-2" style="background-color:#F2F2F2 " >
            <hr>
           <div class="container   ">
            <div class="row downloadadble-footer">
                <div class="col-lg-3 col-md-4 ">
                    <label class="text-danger ">डाउनलोड नेपाली युनिकोड</label>

                    <ul class="mt-3 p-0" style="list-style: none">
                        <li>
                            <a href="{{ route('footerDownload', 'nepali_romanised.zip') }}" class="text-dark"
                                style="font-size: 13px;">नेपाली युनिकोड रोमनाइज</a>
                        </li>
                        <li>
                            <a href="{{ route('footerDownload', 'nepali_Traditional.zip') }}" class="text-dark"
                                style="font-size: 13px;">नेपाली युनिकोड ट्रेडिसनल</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-8 ">
                    <label class="text-danger ">डाउनलोड नेपाली फन्ट</label>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <ul class="mt-3 p-0" style="list-style: none">
                                <li class="" style="font-size: 13px;">
                                    <a class="text-dark"
                                        href="{{ route('footerDownload', 'Kalimati.ttf') }}">Kalimati</a>
                                </li>
                                <li class="text-dark" style="font-size: 13px;">
                                    <a class="text-dark"
                                        href="{{ route('footerDownload', 'PREETI.TTF') }}">Preeti</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <ul class="mt-3 p-0" style="list-style: none">
                                <li class="text-dark" style="font-size: 13px;">
                                    <a class="text-dark"
                                        href="{{ route('footerDownload', 'HIMALI.TTF') }}">FontasyHimali</a>
                                </li>
                                <li class="text-dark" style="font-size: 13px;">
                                    <a class="text-dark"
                                        href="{{ route('footerDownload', 'SAGAR.TTF') }}">Sagarmatha</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <ul class="mt-3 p-0" style="list-style: none">
                                <li class="text-dark" style="font-size: 13px;">
                                    <a class="text-dark" href="{{ route('footerDownload', 'pcsnepal.TTF') }}">PCS
                                        Nepali</a>
                                </li>
                                <li class="text-dark" style="font-size: 13px;">
                                    <a class="text-dark"
                                        href="{{ route('footerDownload', 'kokila.zip') }}">Kokila</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 ">
                    <label class="text-danger ">नमुना फाराम डाउनलोड</label>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <ul class="mt-3 p-0" style="list-style: none">
                                <li class="text-dark" style="font-size: 13px;">बिदा फाराम</li>
                                <li class="text-dark" style="font-size: 13px;">वेव एस.एम.एस. फाराम</li>
                            </ul>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <ul class="mt-3 p-0" style="list-style: none">
                                <li class="text-dark" style="font-size: 13px;">माग फाराम</li>
                                <li class="text-dark" style="font-size: 13px;">सरुवा निवेदन (अनुसूची-९)</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
           </div>
            <hr class="m-0 p-0">
            <div class="container">

                {{-- <div class="d-md-flex mt-3  justify-content-evenly pb-3">
                    <a href="/">गृह पृष्ठ </a>
                    <div class="m-0 p-0">
                    </div>
                    <div class="m-0 p-0">
                        <a href="{{ route('contact-us.create') }}">सम्पर्क गर्नुहोस् </a>
                    </div>
                    <div class="m-0 p-0">
                        <a href="{{ route('faq.frontend') }}">प्राय: सोधिने प्रश्नहरू</a>
                    </div>
                    <div class="m-0 p-0">
                        आगन्तुक गणना :
                        <x-frontend.visitor-counter />
                    </div>
                </div> --}}


                <div class="row ">
                    <div class="col-lg-3 col-md-2 col-sm-6">

                        <a href="/">गृह पृष्ठ </a>
                    </div>
                    {{-- <div class="col-lg-3 col-md-3 col-sm-6">
                    </div> --}}
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <a href="{{ route('contact-us.create') }}">सम्पर्क गर्नुहोस् </a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <a href="{{ route('faq.frontend') }}">प्राय: सोधिने प्रश्नहरू</a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        आगन्तुक गणना :
                        <x-frontend.visitor-counter />
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="py-2" style="background-color:#000">
    <div class="container text-secondary" style="font-size: 13px">
        <div class="d-md-flex justify-content-between">
            <div>
                <strong class="kalimati-font">&copy; {{ date('Y') }}</strong>. {{ settings('app_name') }},
                {{ settings('province_name') }}, {{ settings('office_name') }}.
                सर्वाधिकार सुरक्षित
            </div>
            <div>
                Designed and Developed By: <a href="https://mohrain.com">Mohrain</a>
            </div>
        </div>
    </div>
</div>
