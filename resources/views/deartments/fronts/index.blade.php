@extends('frontend.layouts.app', ['title' => __('गृह')])

@section('content')
<div class="container">
    <div class="row py-3">
        <div class="col-lg-8">
            <div class="title mb-4">
                <h5 class="text-theme-color fw-bold">कार्यक्रम तथा परियोजना</h5>
            </div>
            <div class="contents">
                {!! $federalparliment->description ?? '' !!}

                {{-- {{$federalparliment}} --}}


            </div>
            <div class="title">
                @if ($federalparliment?->document)
                <a class="text-theme-color fw-bold" target="_blank"
                    href="{{ asset('storage') . '/' . $federalparliment->document }}">संगठनात्मक संरचना</a>
                @else
                <a class="text-theme-color fw-bold" target="_blank" href="#">संगठनात्मक संरचना</a>
                @endif
            </div>

            <a href="{{ route('allStaff') }}" class="btn mt-3"
                style="background-color:#cccccc42;border: 1px solid #ccc">कर्मचारीहरुको विवरण
            </a>
        </div>

        <div class="col-lg-4">
            <div class="title mb-4">
                <h5 class="text-theme-color fw-bold"> शाखाहरु</h5>

            </div>
            <ul style="list-style: none" class="m-0 p-0">
                @foreach ($departments as $department)
                @if (!$department->department_id)
                <li style="font-size:20px;color:#31709A"> <i style="font-size:18px" class="fa fa-list"></i>
                    <a href="{{ route('department.introFront', $department->slug) }}"><span
                            style="color:#31709A">{{ $department->name }}</span></a>
                </li>
                @endif
                @endforeach
            </ul>
        </div>
    </div>
    {{-- <x-modal-image-view /> --}}
    @endsection