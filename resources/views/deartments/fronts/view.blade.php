@extends('frontend.layouts.app', ['title' => __('गृह')])

@section('content')
    <div class="container">
        <div class="row py-3">
            <div class="col-lg-9">
                <div class="title">
                    <h5 class="text-theme-color fw-bold">{{ $department->name }}</h5>
                </div>
                <div class="d-flex">
                    <a href="{{ route('department.introFront', $department->slug) }}"
                        class="btn my-btn {{ Route::getCurrentRoute()->getName() == 'department.introFront' ? 'active' : '' }}"><i
                            class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;परिचय</a>
                    <a href="{{ route('department.workFront', $department->slug) }}"
                        class="btn my-btn {{ Route::getCurrentRoute()->getName() == 'department.workFront' ? 'active' : '' }}"><i
                            class="fa fa-server" aria-hidden="true"></i>&nbsp;काम, कर्तब्य र अधिकार</a>
                    <a href="{{ route('department.noticeFront', $department->slug) }}"
                        class="btn my-btn {{ Route::getCurrentRoute()->getName() == 'department.noticeFront' ? 'active' : '' }}"><i
                            class="fa fa-flag" aria-hidden="true"></i>&nbsp; सुचनाहरु</a>
                    <a href="{{ route('department.activiityFront', $department->slug) }}"
                        class="btn my-btn {{ Route::getCurrentRoute()->getName() == 'department.activiityFront' ? 'active' : '' }}"><i
                            class="fa fa-wifi" aria-hidden="true"></i>&nbsp;गतिबिधि</a>
                    <a href="{{ route('department.publicationFront', $department->slug) }}"
                        class="btn my-btn {{ Route::getCurrentRoute()->getName() == 'department.publicationFront' ? 'active' : '' }}"><i
                            class="fa fa-download" aria-hidden="true"></i>&nbsp;प्रकाशनहरु/डाउनलोडहरू</a>
                    <a href="{{ route('department.audioFront', $department->slug) }}"
                        class="btn my-btn {{ Route::getCurrentRoute()->getName() == 'department.audioFront' ? 'active' : '' }}"><i
                            class="fa fa-headphones" aria-hidden="true"></i>&nbsp;अडियो</a>
                    <a href="{{ route('department.videoFront', $department->slug) }}"
                        class="btn my-btn {{ Route::getCurrentRoute()->getName() == 'department.videoFront' ? 'active' : '' }}"><i
                            class="fa fa-film" aria-hidden="true"></i>&nbsp;भिडिओ </a>
                </div>

                <div class="mt-3">
                    @yield('frontContent')
                </div>
            </div>

            <div class="col-lg-3">
                <div class="title mb-4">
                    <h5 class="text-theme-color fw-bold">प्रमुख</h5>

                </div>
                @if ($department->employee)
                    <div class="d-flex align-items-center">
                        <b>
                            {{ $department->employee->name }}, {{ $department->employee->position }}
                        </b>
                        @if ($department->employee->profile)
                            <img class="profileImg" src="{{ asset('storage') . '/' . $department->employee->profile }}"
                                alt="">
                        @else
                            <img class="profileImg"
                                src="{{ asset('images/sudurpashchim-province-assembly-logo-400x400.png') }}"
                                alt="pradeshsava-logo-sudurpaschim">
                        @endif
                    </div>
                @endif

                @if ($departments)
                    <div>
                        <div class="title my-4">
                            <h5 class="text-theme-color fw-bold"> इकाईहरू</h5>

                        </div>
                        <ul style="list-style: none" class="m-0 p-0">
                            @foreach ($departments as $department)
                                <li style="font-size:20px;color:#31709A"> <i style="font-size:18px" class="fa fa-list"></i>
                                    <a href="{{ route('department.introFront', $department->slug) }}"><span
                                            style="color:#31709A">{{ $department->name }}</span></a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
        {{-- <x-modal-image-view /> --}}
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

            .profileImg {
                width: 150px !important;
                height: 150px;
                border-radius: 50%;
            }
        </style>
    @endpush
