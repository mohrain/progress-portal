@extends('layouts.app', ['title' => __('समिति')])

@section('content')
<div class="container-fluid">

    @if (Auth::user()->roles[0]->name != 'sachib')
            <x-committee-wizard-menu :committee="$committee" />
        @endif

    <section class="box mt-4">
        <div class="box__header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="box__title">प्रकाशनहरु/डाउनलोडस् <i>({{$committee->name}})</i></div>
            </div>
        </div>
        <div class="box__body">
            <x-download-form :download="$download" :attachToModel="$committee" :redirectTo="route('committee.downloads', $committee)"/>
        </div>
    </section>
</div>
@endsection
