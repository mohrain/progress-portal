@extends('frontend.layouts.app', ['title' => __('गृह')])

@section('content')
    <div class="container">
        <div class="row py-3">
            <div class="col-lg-8">
                <div class="title mb-4">
                    <h5 class="text-theme-color fw-bold">संघीय संसद सचिवालय</h5>
                </div>
                <div class="contents">
                    {!!$federalparliment->description!!}



                </div>
                <div class="title">
                    <b>संगठनात्मक संरचना</b>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="title mb-4">
                    <h5 class="text-theme-color fw-bold">सचिवालयका शाखाहरु</h5>

                </div>
                <ul style="list-style: none" class="m-0 p-0">
                    @foreach ($departments as $department)
                        <li style="font-size:20px;color:#31709A"> <i style="font-size:18px" class="fa fa-list"></i>
                            <a href="{{route('department.introFront',$department->slug)}}"><span style="color:#31709A">{{$department->name}}</span></a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        {{-- <x-modal-image-view /> --}}
    @endsection
