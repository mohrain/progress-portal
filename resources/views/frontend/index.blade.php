@extends('frontend.layouts.app', ['title' => __('गृह')])
@section('content')
    <div class="container">
        @include('frontend.layouts.marquee')
        <div class="row">
            <div class="col-md-9">
                {{-- @include('frontend.carousel.index') --}}
                <x-carousel-image-view />
            </div>
            <div class="col-md-3">
                <div class="bg-theme-color-blue py-3 text-center mb-3">
                    सभामुख /उपसभामुख
                </div>
                <div class="card text-bg-light mb-3">
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
                <div class="card mb-3">
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
                <div class="card mb-3">
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
                        <x-frontend-about-us-view />
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                @include('frontend.layouts.sidebar')
            </div>
        </div>
        <div class="row my-2">
            <div class="col-md-6">
                <div class="bg-theme-color-blue py-3 text-center">
                    प्रदेश सभा बैठक सम्बन्धी सूचना
                </div>
                <x-procincial-assembly-meeting-view />
            </div>
            <div class="col-md-6">
                <div class="bg-theme-color-blue py-3 text-center">
                    समितिका बैठक सम्बन्धी सूचना
                </div>
                <x-procincial-committee-meeting-view />
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
                                <div class="card-text"><small class="text-muted">संविधान दिवसको अवसरमा ।</small></div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="bg-theme-color-blue text-center my-2">
                    <a href="#" class="btn text-white">सबै समाचारहरु <i class="bi bi-chevron-double-right"></i></a>
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
    <x-modal-image-view />
@endsection
