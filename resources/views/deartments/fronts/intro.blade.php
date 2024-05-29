@extends('deartments.fronts.view', ['title' => __('गृह')])

@section('frontContent')
    {{-- <x-modal-image-view /> --}}

    {!!$department->description!!}
@endsection
@push('styles')
    <style>
        .my-btn {
            background-color: #2460B9;
            margin-left: 3px;
            margin-top: 10px;
            color: #fff;
        }

        .my-btn:hover {
            background-color: #DD1F26;
            color: #fff;
        }

        .my-btn.active {
            background-color: #DD1F26;
        }
    </style>
@endpush
