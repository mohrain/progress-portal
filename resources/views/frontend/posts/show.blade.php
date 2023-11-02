@extends('frontend.layouts.app', ['title' => __($post->title)])
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <div class="frontend-title">
                            {{ $post->title }}
                            <hr>
                        </div>
                    </div>
                    @if ($post->feature_image)
                        <div class="col-md-12 text-center">
                            <img class="feature-img"
                                src="{{ $post->feature_image ? asset('storage/' . $post->feature_image) : asset('assets/img/no-image.png') }}">
                        </div>
                    @endif
                    @if ($post->descriptions)
                        <div class="col-md-12 mt-4">
                            <p>
                                {!! $post->descriptions !!}
                            </p>
                        </div>
                    @endif
                    @if ($post->documents->isnotempty())
                        <div class="col-md-12 my-4">
                            <h5 class="text-theme-color">सम्बन्धित कागजातहरु:</h5>
                            <ul class="list-group list-group-flush">
                                @foreach ($post->documents as $postDocument)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div><i class="far fa-file-alt"></i> {{ $postDocument->name }}</div>

                                        <a href="{{ asset('storage/' . $postDocument->file) }}"
                                            class="btn btn-primary text-xl" target="_blank"><i
                                                class="fas fa-cloud-download-alt"></i> डाउनलोड</a>

                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        {{-- <div>
                            @foreach ($post->documents as $postDocument)
                            <div class="my-3">
                                <object data="{{ asset('storage/' . $postDocument->file) }}" type="application/pdf"
                                    width="100%" height="800">
                             
                                </object>
                            </div>
                            @endforeach
                        </div> --}}
                    @endif
                </div>
            </div>
            <div class="col-md-3">
                @include('frontend.layouts.sidebar')
            </div>
        </div>
    </div>
@endsection
