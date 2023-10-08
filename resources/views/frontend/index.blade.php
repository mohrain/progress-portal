@extends('frontend.layouts.app', ['title' => __('गृह')])
@section('content')
    <div class="container">
        @include('frontend.layouts.marquee')
        <div class="row">
            <div class="col-md-9">
                @include('frontend.carousel.index')
            </div>
            <div class="col-md-3">
                <div class="bg-theme-color-blue py-3 text-center mb-3">
                    सभामुख /उपसभामुख
                </div>
                <div class="card border-danger text-bg-light mb-3">
                    <div class="row g-0">
                        <div class="col-md-4 text-center">
                            <img src="{{ asset('images/profile/bhim-bahadur.jpeg') }}" class="img-fluid rounded-start"
                                alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="text-center py-2">
                                <h5 class="card-title">माननीय भीम बहादुर भण्डारी</h5>
                                <div class="card-text"><small class="text-muted">सभामुख</small></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-danger mb-3">
                    <div class="row g-0">
                        <div class="col-md-4 text-center">
                            <img src="{{ asset('images/profile/koili-devi.jpeg') }}" class="img-fluid rounded-start"
                                alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="text-center py-2">
                                <h5 class="card-title">माननीय कोइली देवी चौधरी</h5>
                                <div class="card-text"><small class="text-muted">उपसभामुख</small></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-theme-color-blue py-3 text-center mb-3">
                    प्रदेश सभा सचिव
                </div>
                <div class="card border-danger mb-3">
                    <div class="row g-0">
                        <div class="col-md-4 text-center">
                            <img src="{{ asset('images/profile/dev-bahadur.jpeg') }}" class="img-fluid rounded-start"
                                alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="text-center py-2">
                                <h5 class="card-title">श्री देव बहादुर बोगटी</h5>
                                <div class="card-text"><small class="text-muted">प्रदेश सभा सचिव</small></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="bg-theme-color-blue py-3 text-center">
                    सुदूरपश्चिम प्रदेश सभाको परिचय
                </div>
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">
                            प्रदेश सभा जनताको सार्वभौमसत्ताको प्रयोग गर्ने एक महत्वपूर्ण संस्था हो। शासन प्रणालीमा नीति
                            निर्धारण तथा कानून निर्माण गर्ने जस्तो महत्वपूर्ण कार्य व्यवस्थापन कार्य विधिका माध्यमबाट यसले
                            सुनिश्चित गर्दछ। जनताका प्रतिनिधिको स्वीकृति विना कुनै कर नलगाइने भन्ने सिद्धान्त रहेको र कर
                            सम्बन्धी जनताद्वारा प्रत्यक्ष रुपमा निर्वाचित भई आएका प्रतिनिधिहरु रहेको प्रदेश सभामा प्रस्तुत
                            गर्ने संवैधानिक व्यवस्था गरिएको छ ।
                        </p>
                        <p class="card-text">
                            सुदूरपश्चिम प्रदेशलाई जनसंख्या र भौगोलिक अनुकुलता तथा विशिष्टताका आधारमा बत्तीस निर्वाचन क्षेत्र
                            कायम गरी प्रत्येक निर्वाचन क्षेत्रबाट एक जना रहने गरी पहिलो हुने निर्वाचन प्रणाली बमोजिम
                            निर्वाचित भएका बत्तीस जना र सम्पूर्ण प्रदेशलाई एक निर्वाचन क्षेत्र मानी राजनीतिक दललाई मत दिने
                            समानुपातिक निर्वाचन प्रणाली बमोजिम निर्वाचित भएका उक्काइस जना गरी कुल त्रिपन्न सदस्य रहेको
                            प्रदेश सभा रहेको छ ।
                        </p>
                        {{-- <a href="#" class="btn btn-sm btn-primary">पुरा पढ्नुहो <i
                                class="bi bi-chevron-double-right"></i></a> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="bg-theme-color-blue py-3 mb-2 px-2">
                    <i class="bi bi-calendar3"></i> आजको संसद
                </div>
                <div class="bg-theme-color-blue py-3 mb-2 px-2">
                    <i class="bi bi-youtube"></i> प्रत्यक्ष प्रसारण
                </div>
                <div class="bg-theme-color-blue py-3 mb-2 px-2">
                    <i class="bi bi-camera-video"></i> भिडियो संग्रहहरु
                </div>
                <div class="bg-theme-color-blue py-3 mb-2 px-2">
                    <i class="bi bi-headphones"></i> अडियो संग्रहहरु
                </div>
                <div class="bg-theme-color-blue py-3 mb-2 px-2">
                    <i class="bi bi-chat"></i> जनताका सुझावहरु
                </div>
                {{-- <div class="bg-theme-color-blue py-3 mb-2 px-2">
                    <i class="bi bi-cloud-arrow-down"></i> डाउनलोडस्
                </div> --}}
            </div>
        </div>
        <div class="row my-2">
            <div class="col-md-6">
                <div class="bg-theme-color-blue py-3 text-center">
                    सभा बैठक सम्बन्धी सूचना
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">सभा</th>
                            <th scope="col">मिति</th>
                            <th scope="col">समय</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">१</th>
                            <td>दोश्रो अधिवेशनको वैठक संख्या - २५</td>
                            <td>२०८० असोज २१ गते</td>
                            <td>बिहान ९:०० बजे</td>
                        </tr>
                        <tr>
                            <th scope="row">२</th>
                            <td>दोश्रो अधिवेशनको वैठक संख्या - २५</td>
                            <td>२०८० असोज २१ गते</td>
                            <td>बिहान ९:०० बजे</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <div class="bg-theme-color-blue py-3 text-center">
                    समितिका बैठक सम्बन्धी सूचना
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">समिति</th>
                            <th scope="col">मिति</th>
                            <th scope="col">समय</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">१</th>
                            <td>दोश्रो अधिवेशनको वैठक संख्या - २५</td>
                            <td>२०८० असोज २१ गते</td>
                            <td>बिहान ९:०० बजे</td>
                        </tr>
                        <tr>
                            <th scope="row">२</th>
                            <td>दोश्रो अधिवेशनको वैठक संख्या - २५</td>
                            <td>२०८० असोज २१ गते</td>
                            <td>बिहान ९:०० बजे</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="bg-theme-color-blue py-3 text-center">
                    समाचार तथा गतिबिधिहरु
                </div>
                <div class="card my-1">
                    <div class="row g-0">
                        <div class="col-md-4 text-center">
                            <img src="{{ asset('images/profile/koili-devi.jpeg') }}"
                                class="img-fluid rounded-start news-thum-image" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="text-center py-2">
                                <div class="card-text"><small class="text-muted">सम्माननीय सभामुखज्यूसँग अष्ट्रेलियन
                                        राजदूतको शिष्टचार भेट</small></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card my-1">
                    <div class="row g-0">
                        <div class="col-md-4 text-center">
                            <img src="{{ asset('images/profile/koili-devi.jpeg') }}"
                                class="img-fluid rounded-start news-thum-image" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="text-center py-2">
                                <div class="card-text"><small class="text-muted">संविधान दिवसको अवसरमा सम्माननीय सभामुखको
                                        शुभकामना ।</small></div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card my-1">
                    <div class="row g-0">
                        <div class="col-md-4 text-center">
                            <img src="{{ asset('images/profile/koili-devi.jpeg') }}"
                                class="img-fluid rounded-start news-thum-image" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="text-center py-2">
                                <div class="card-text"><small class="text-muted">संविधान दिवसको अवसरमा सम्माननीय सभामुखको
                                        शुभकामना ।</small></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card my-1">
                    <div class="row g-0">
                        <div class="col-md-4 text-center">
                            <img src="{{ asset('images/profile/koili-devi.jpeg') }}"
                                class="img-fluid rounded-start news-thum-image" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="text-center py-2">
                                <div class="card-text"><small class="text-muted">संविधान दिवसको अवसरमा  ।</small></div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="bg-theme-color-blue text-center my-2">
                    <a href="#" class="btn text-white">सबै समाचारहरु <i
                                class="bi bi-chevron-double-right"></i></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-theme-color-blue py-3 text-center">
                    Facebook Page
                </div>
            </div>
            <div class="col-md-4">
                <div>
                    <a class="twitter-timeline" href="https://twitter.com/pradeshsabha7?ref_src=twsrc%5Etfw">Tweets by
                        pradeshsabha7</a>
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
            </div>
        </div>
    </div>
@endsection
