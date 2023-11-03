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
                <x-frontend-office-brearer-view />
                <div class="bg-theme-color-blue py-3 text-center mb-3">
                    प्रदेश सभा सचिव
                </div>
                <x-frontend-provincial-assembly-secretary-view />
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
        <x-frontend-news />
        <div class="row">
            <div class="col-md-4">
                <div class="bg-theme-color-blue py-3 text-center">
                    समाचार तथा गतिबिधिहरु
                </div>
                <div class="card my-1">
                    <div class="row g-0">
                        <div class="col-md-4 text-center">
                            <img src="{{ asset('assets/img/no-image.png') }}"
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
                            <img src="{{ asset('assets/img/no-image.png') }}"
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
                            <img src="{{ asset('assets/img/no-image.png') }}"
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
                            <img src="{{ asset('assets/img/no-image.png') }}"
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
                <div class="fb-page" data-href="{{ settings('facebook') }}" data-tabs="timeline" data-width="340"
                    data-height="410" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
                    data-show-facepile="true">
                    <blockquote cite="{{ settings('facebook') }}" class="fb-xfbml-parse-ignore">
                        <a href="{{ settings('facebook') }}">Mohrain Websoft</a>
                    </blockquote>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                    <a class="twitter-timeline" data-height="410"
                        href="{{ settings('twitter') }}?ref_src=twsrc%5Etfw">Tweets by
                        pradeshsabha7</a>
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
            </div>
        </div>
    </div>
    <x-modal-image-view />
@endsection
