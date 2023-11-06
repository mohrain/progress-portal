@extends('frontend.layouts.app', ['title' => __('प्रत्यक्ष प्रसारण')])
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <div class="frontend-title">
                            प्रत्यक्ष प्रसारण
                            <hr>
                        </div>
                    </div>
                    @php
                        $youtubeUrl = $videos;
                        $videoId = preg_replace('/.*v=|&.*/', '', $youtubeUrl); // Extract the video ID
                        $embeddedCode = '<iframe width="800" height="500" src="https://www.youtube.com/embed/' . $videoId . '" frameborder="0" allowfullscreen></iframe>';
                    @endphp

                    <div>
                        {!! $embeddedCode !!}

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                @include('frontend.layouts.sidebar')
            </div>
        </div>
    </div>
@endsection
