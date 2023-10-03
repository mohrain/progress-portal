@extends('layouts.app')

@section('breadcrumb')
<nav aria-label="breadcrumb ">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">ड्यासबोर्ड</a></li>
        <li class="breadcrumb-item active" aria-current="page">@lang('navigation.configuration')</li>
    </ol>
</nav>
@endsection

@push('styles')
    <style>
        .report-link-grid {
            display: grid; grid-template-columns: 1fr 1fr 1fr 1fr;
            gap: 1rem;
        }
        .report-link-grid > * {
            background-color: #fff;
            min-height: 200px;
            font-size: 2rem;
            color: inherit;
            border-radius: 4px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: 600;
            transition: all .5s ease-in-out;
        }
        .report-link-grid > *:hover {
            background-color: #1f578e;
            color: #fff;
        }
    </style>
@endpush

@section('content')
<div class="container-fluid font-noto">
    <div class="report-link-grid">
        <a href="{{ route('project-type.index') }}">@lang('navigation.project_type')</a>
        <a href="{{route('fiscal-year.index')}}">@lang('navigation.fiscal_year')</a>
        <a href="{{route('budget-source.index')}}">@lang('navigation.budget_source')</a>
        <a href="{{ route('province.index') }}">@lang('navigation.province')</a>
        <a href="{{ route('district.index') }}">@lang('navigation.district')</a>
        <a href="{{ route('municipality.index') }}">@lang('navigation.municipality')</a>
        <a href="{{ route('ward.index') }}">@lang('navigation.ward')</a>
    </div>
</div>
@endsection
