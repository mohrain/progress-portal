@extends('layouts.app')

@section('breadcrumb')
<nav aria-label="breadcrumb ">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">ड्यासबोर्ड</a></li>
        <li class="breadcrumb-item active" aria-current="page">सूची दर्ता </li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container-fluid">
    @include('alerts.all')
    <div class="d-flex align-items-center mb-3">
        <h1 class="box__title">सूची दर्ता</h1>
        <div class="ml-auto">
            <a href="{{ route('suchi.create') }}" class="btn btn-primary z-depth-0"><i class="fas fa-plus mr-2"></i>Add New</a>
        </div>
    </div>

    <div class="d-flex align-items-center mb-4" style="gap: 1rem;">
        <div class="box">
            <div class="py-2 px-3">
                <form action="" class="d-flex align-items-center" style="gap: .8rem;">
                    {{-- <div>मिति</div> --}}
                    <input type="text" name="filter[register_date_from]" id="dateFrom" class="form-control nepali-date" value="{{ request('filter.register_date_from') }}" placeholder="Date">
                    <div class="font-weight-bold">देखि </div>
                    <input type="text" name="filter[register_date_to]" id="dateTo" class="form-control nepali-date" value="{{ request('filter.register_date_to') }}" placeholder="Date">
                    <input type="text" name="filter[name]" class="form-control" value="{{ request('filter.name') }}" placeholder="संस्था">
                    {{-- <div>सम्म</div> --}}
                    <div>
                        <button class="btn btn-primary z-depth-0"><i class="d-inline fas fa-filter mr-2"></i>Filter</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="box ml-auto">
            <div class="py-2 px-3">
                <a class="btn btn-primary z-depth-0" href="{{ route('suchi-export', request()->query()) }}"><i class="fas fa-download mr-2"></i>Export</a>
            </div>
        </div>
    </div>

    <x-suchi-table-display :suchis="$suchis" type="registered"></x-suchi-table-display>

    {{-- <registered-suchi-list></registered-suchi-list> --}}
</div>
@endsection
