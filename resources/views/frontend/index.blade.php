@extends('frontend.layouts.app', ['title' => __('गृह')])

@section('content')
<div class="container">
   <x-frontend.news-scroll />
    <div class="row">
        <div class="col-md-9">
            {{-- @include('frontend.carousel.index') --}}
            <x-carousel-image-view />
        </div>
        <div class="col-md-3">
            <div class="bg-theme-color-blue py-2 text-center mb-3 rounded-1">
                सभामुख /उपसभामुख
            </div>
            <x-frontend-office-brearer-view />
            <div class="bg-theme-color-blue py-2 text-center mb-3 rounded-1">
                प्रदेश सभा सचिव
            </div>
            <x-frontend-provincial-assembly-secretary-view />
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            {{-- <div class="bg-theme-color-blue py-3 text-center">
                सुदूरपश्चिम प्रदेश सभाको परिचय
            </div>
            <div class="card">
                <div class="card-body">
                    <x-frontend-about-us-view />
                </div>
            </div> --}}

            <div class="card border-0 rounded-2 shadow-sm">
                <div class="card-header bg-transparent border-0">
                </div>
                <div class="card-body">
                    <h5 class="fw-bolder text-primary text-center mb-3">सुदूरपश्‍चिम प्रदेश सभाको परिचय</h5>
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

    {{-- <div id="app">
        <x-frontend.gallery />
    </div> --}}

    <div class="row">
        <div class="col-md-4">
            <div>
                <a class="twitter-timeline" data-height="410" href="{{ settings('twitter') }}?ref_src=twsrc%5Etfw">Tweets by
                    pradeshsabha7</a>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
        </div>
        <div class="col-md-4">
            <div class="fb-page" data-href="{{ settings('facebook') }}" data-tabs="timeline" data-width="340" data-height="410" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                <blockquote cite="{{ settings('facebook') }}" class="fb-xfbml-parse-ignore">
                    <a href="{{ settings('facebook') }}">Mohrain Websoft</a>
                </blockquote>
            </div>
        </div>
        <div class="col-md-4">
            <div class="bg-theme-color-blue py-3 text-center">
                Google Maps
            </div>
            <div>
                {!! settings('maps') !!}
            </div>
        </div>
    </div>
</div>
{{-- <x-modal-image-view /> --}}
@endsection

@push('scripts')
<script src="{{ mix('js/app.js') }}"></script>
@endpush