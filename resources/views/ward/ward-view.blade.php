@extends('layouts.app')

@section('content')

<div class="px-4 ">
    <div class="py-1">
        <div class="committee-wizard-menu">
            <a href="{{ route('ward.edit', $ward) }}"
                class="{{ Route::getCurrentRoute()->getName() == 'ward.edit' ? 'active' : '' }}">
                <div class="work-description"><i class="fa fa-info-circle"></i> परिचय</div>
            </a>
            <a href="{{ route('ward.duty', $ward) }}"
                class="{{ Route::getCurrentRoute()->getName() == 'ward.duty' ? 'active' : '' }}">
                <div class="work-description"><i class="fa fa-tasks"></i> काम, कर्तव्य र अधिकार</div>
            </a>
            <a href="{{ route('ward.notices', $ward) }}"
                class="{{ Route::getCurrentRoute()->getName() == 'ward.notices' ? 'active' : '' }}">
                <div class="work-description"><i class="fa fa-flag"></i> सूचनाहरु</div>
            </a>
            <a href="{{ route('ward.activity', $ward) }}"
                class="{{ Route::getCurrentRoute()->getName() == 'ward.activity' ? 'active' : '' }}">
                <div class="work-description"><i class="fa fa-rss"></i> गतिविधिहरु</div>
            </a>
            <a href="{{ route('ward.publications', $ward) }}"
                class="{{ Route::getCurrentRoute()->getName() == 'ward.publications' ? 'active' : '' }}">
                <div class="work-description tab-active"><i class="fa fa-download"></i> प्रकाशनहरु/डाउनलोडस्</div>
            </a>
            <a href="{{ route('ward.media', $ward) }}"
                class="{{ Route::getCurrentRoute()->getName() == 'ward.media' ? 'active' : '' }}">
                <div class="work-description"><i class="fa fa-headphones"></i> अडियो</div>
            </a>
            <a href="{{ route('ward.video', $ward) }}"
                class="{{ Route::getCurrentRoute()->getName() == 'ward.video' ? 'active' : '' }}">
                <div class="work-description"><i class="fa fa-film"></i> भिडियो</div>
            </a>
            {{-- <a href="{{ route('ward.hod', $ward) }}"
                class="{{ Route::getCurrentRoute()->getName() == 'ward.hod' ? 'active' : '' }}">
                <div class="work-description"><i class="fa fa-user"></i> शाखा प्रमुख</div>
            </a> --}}
        </div>
    </div>

   <div>
    @yield('wardContent')
   </div>

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