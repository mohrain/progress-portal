@extends('layouts.frontend')

@section('breadcrumb')
<nav aria-label="breadcrumb ">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">ड्यासबोर्ड</a></li>
        <li class="breadcrumb-item"><a href="{{route('suchi.index')}}">सूची दर्ता</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $updateMode ? 'सम्पादन' : 'नयाँ' }}</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container">
    @include('alerts.all')
    <section>
        <suchi-form :suchi="{{ $suchi }}" :suchi-types="{{ $suchiTypes }}"></suchi-form>
    </section>
</div>
@endsection
