@extends('layouts.app')

@section('content')

<div class="px-4 ">
    <div class="py-1">
        <div class="committee-wizard-menu">
            <a href="{{ route('ward.show', $ward) }}"
                class="{{ Route::getCurrentRoute()->getName() == 'ward.show' ? 'active' : '' }}">
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
            <a href="{{ route('ward.members', $ward) }}"
                class="{{ Route::getCurrentRoute()->getName() == 'ward.members' ? 'active' : '' }}">
                <div class="work-description"><i class="fa fa-users"></i> जनप्रतिनिधि</div>
            </a>
            <a href="{{ route('ward.employees', $ward) }}"
            class="{{ Route::getCurrentRoute()->getName() == 'ward.employees' ? 'active' : '' }}">
            <div class="work-description"><i class="fa fa-rss"></i>कर्मचारीहरु </div>
            </a>
            <a href="{{ route('ward.downloads', $ward) }}"
                class="{{ Route::getCurrentRoute()->getName() == 'ward.downloads' ? 'active' : '' }}">
                <div class="work-description tab-active"><i class="fa fa-download"></i> प्रकाशनहरु/डाउनलोडस्</div>
            </a>

            <a href="{{ route('ward.secretary', $ward) }}"
                class="{{ Route::getCurrentRoute()->getName() == 'ward.secretary' ? 'active' : '' }}">
                <div class="work-description"><i class="fa fa-user"></i>वडा सचिव </div>
            </a>
            <a href="{{ route('ward.audio' , $ward) }}"
                class="{{ Route::getCurrentRoute()->getName() == 'ward.audio' ? 'active' : '' }}">
                <div class="work-description"><i class="fa fa-headphones"></i> अडियो</div>
            </a>
            <a href="{{ route('ward.video', $ward) }}"
                class="{{ Route::getCurrentRoute()->getName() == 'ward.video' ? 'active' : '' }}">
                <div class="work-description"><i class="fa fa-film"></i> भिडियो</div>
            </a>

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