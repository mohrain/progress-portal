@extends('frontend.layouts.app', ['title' => __($title)])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <div class="frontend-title">
                            {{ $title }}
                            <hr>
                        </div>
                        <div class="mb-3">
                            <x-frontend.committee-menu :committee="$committee" />
                        </div>
                        <div>
                            <h4 class="fw-bolder">परिचय</h4>
                        </div>
                        <section>
                            {!! $committee->about !!}
                        </section>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <x-frontend.committee-chairman :committee="$committee" />
            </div>
        </div>
    </div>
@endsection
