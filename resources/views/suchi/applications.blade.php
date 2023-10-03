@extends('layouts.app')

@section('breadcrumb')
<nav aria-label="breadcrumb ">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">ड्यासबोर्ड</a></li>
        <li class="breadcrumb-item active" aria-current="page">आवेदन फारामहरु</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container-fluid">
    @include('alerts.all')
    <div class="d-flex align-items-center mb-3">
        <h1 class="box__title">आवेदन फारामहरु</h1>
        <form class="ml-auto">
            <input type="text" name="filter[token_no]" class="form-control" value="{{ request('filter.token_no') }}" placeholder="Token No.">
        </form>
    </div>

    @if(request()->filled('filter.token_no'))
    <div class="mb-3">
        <button type="button" class="btn btn-primary z-depth-0">
            Token: {{ request('filter.token_no') }}
        </button>
        <a href="{{ route('suchi.applications') }}" class="btn btn-danger z-depth-0">Clear Filter</a>
    </div>
    @endif

    <x-suchi-table-display :suchis="$suchis" type="applications"></x-suchi-table-display>

</div>
@endsection
