@extends('frontend.layouts.app', ['title' => __($page->title)])
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <div class="frontend-title">
                            {{ $page->title }}
                            <hr>
                        </div>
                    </div>
                    @if ($page->feature_image)
                        <div class="col-md-12 text-center">
                            <img class="feature-img"
                                src="{{ $page->feature_image ? asset('storage/' . $page->feature_image) : asset('assets/img/no-image.png') }}">
                        </div>
                    @endif
                    @if ($page->descriptions)
                        <div class="col-md-12 mt-4">
                            <p>
                                {!! $page->descriptions !!}
                            </p>
                        </div>
                    @endif
                    @if ($page->documents->isnotempty())
                        <div class="col-md-12 my-4">
                            <h5 class="text-theme-color">सम्बन्धित कागजातहरु:</h5>
                            <ul class="list-group list-group-flush">
                                @foreach ($page->documents as $pageDocument)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div><i class="far fa-file-alt"></i> {{ $pageDocument->name }}</div>

                                        <a href="{{ asset('storage/' . $pageDocument->file) }}"
                                            class="btn btn-primary text-xl" target="_blank"><i
                                                class="fas fa-cloud-download-alt"></i> डाउनलोड</a>

                                    </li>
                                @endforeach
                            </ul>
                     
                        </div>
                        {{-- <div>
                            @foreach ($page->documents as $pageDocument)
                            <div class="my-3">
                                <object data="{{ asset('storage/' . $pageDocument->file) }}" type="application/pdf"
                                    width="100%" height="800">
                                    <p>Unable to display PDF file. <a
                                            href="{{ asset('storage/' . $pageDocument->file) }}">Download</a>
                                    </p>
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
