@extends('ward.ward-view')
@section('wardContent')
<section class="box mt-4">
    <div class="box__header">
        <div class="d-flex justify-content-between align-items-center">
            <div class="box__title">प्रकाशनहरु/डाउनलोडस् <i>(वडा नं. {{$ward->name}})</i></div>
        </div>
    </div>
    <div class="box__body">
        <x-download-form :download="$download" :attachToModel="$ward" :redirectTo="route('ward.downloads', $ward)" />
    </div>
</section>

@endsection