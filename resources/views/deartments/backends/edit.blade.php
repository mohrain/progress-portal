@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- @include('alerts.all') --}}
    </div>
    <div class="px-2">
        <div class=" py-1">
            @if (Auth::user()->roles[0]->name != 'hod')


            <div class="committee-wizard-menu">
                <a href="{{ route('department.edit', $department->slug) }}"
                    class=" {{ Route::getCurrentRoute()->getName() == 'department.edit' ? 'active' : '' }}">
                    <div class="work-description "><i class="fa fa-info-circle"></i> परिचय</div>
                </a>
                <a href="{{ route('department.duty', $department->slug) }}"
                    class=" {{ Route::getCurrentRoute()->getName() == 'department.duty' ? 'active' : '' }} ">
                    <div class="work-description "><i class="fa fa-tasks"></i> काम, कर्तव्य र अधिकार</div>
                </a>
                <a href="{{ route('department.notices', $department->slug) }}"
                    class=" {{ Route::getCurrentRoute()->getName() == 'department.notices' ? 'active' : '' }}">
                    <div class="work-description "><i class="fa fa-flag"></i> सूचनाहरु</div>
                </a>
                <a href="{{ route('department.activity', $department->slug) }}"
                    class=" {{ Route::getCurrentRoute()->getName() == 'department.activity' ? 'active' : '' }}">
                    <div class="work-description "><i class="fa fa-rss"></i> गतिविधिहरु</div>
                </a>
                <a href="{{ route('department.publications', $department->slug) }}"
                    class=" {{ Route::getCurrentRoute()->getName() == 'department.publications' ? 'active' : '' }} ">
                    <div class="work-description  tab-active "><i class="fa fa-download"></i> प्रकाशनहरु/डाउनलोडस्</div>
                </a>
                <a href="{{ route('department.media', $department->slug) }}"
                    class=" {{ Route::getCurrentRoute()->getName() == 'department.media' ? 'active' : '' }}">
                    <div class="work-description "><i class="fa fa-headphones"></i> अडियो</div>
                </a>
                <a href="{{ route('department.video', $department->slug) }}"
                    class=" {{ Route::getCurrentRoute()->getName() == 'department.video' ? 'active' : '' }}">
                    <div class="work-description "><i class="fa fa-film"></i> भिडियो</div>
                </a>
                <a href="{{ route('department.hod', $department->slug) }}"
                    class=" {{ Route::getCurrentRoute()->getName() == 'department.hod' ? 'active' : '' }}">
                    <div class="work-description "><i class="fa fa-user"></i> साखा प्रमुख </div>
                </a>
            </div>
            @endif
        </div>
        @yield('departmentContent')


    </div>
@endsection

@push('styles')
    <style>
        .committee-wizard-menu {
            display: flex;
            border-radius: 4px;
        }

        .committee-wizard-menu a {
            background-color: #0054a6;
            padding: 10px 15px;
            color: #fff;
            border-right: 1.8px dotted #fff;
        }

        .committee-wizard-menu a i {
            margin-right: 10px;
            opacity: .9;
        }

        .committee-wizard-menu a:first-of-type {
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
        }

        .committee-wizard-menu a:last-of-type {
            border-right: none;
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
        }

        .committee-wizard-menu a.active {
            background-color: red;
            color: #fff;
        }
    </style>
@endpush
