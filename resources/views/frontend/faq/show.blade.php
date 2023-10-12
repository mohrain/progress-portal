@extends('frontend.layouts.app', ['title' => __('प्राय: सोधिने प्रश्नहरू')])
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="frontend-title">
                    प्राय: सोधिने प्रश्नहरू
                    <hr>
                </div>
                @foreach ($frequentlyAskedQuestions as $frequentlyAskedQuestion)
                    <div data-bs-toggle="collapse" href="#collapseExample-{{ $loop->iteration }}" role="button"
                        aria-expanded="false" aria-controls="collapseExample-{{ $loop->iteration }}">
                        <ul class="list-group">
                            <li
                                class="list-group-item d-flex justify-content-between align-items-start bg-theme-color-blue my-1">
                                <div class="ms-2 me-auto">
                                    <div class="fw-buld">{{ $frequentlyAskedQuestion->title }}</div>
                                </div>
                                <span class="">
                                    <i class="bi bi-chevron-double-down"></i>
                                </span>
                            </li>
                        </ul>
                    </div>
                    <div class="collapse" id="collapseExample-{{ $loop->iteration }}">
                        <div class="card card-body">
                            {!! $frequentlyAskedQuestion->descriptions !!}
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-3">
                @include('frontend.layouts.sidebar')
            </div>
        </div>
    </div>
@endsection
