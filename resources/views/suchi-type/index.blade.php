@extends('layouts.app')

@section('breadcrumb')
<nav aria-label="breadcrumb ">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">ड्यासबोर्ड</a></li>
        <li class="breadcrumb-item active" aria-current="page">@lang('navigation.suchi_types')</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container font-noto">
    @include('alerts.all')
    <div class="row">
        <div class="col-md-4">
            <div class="box">
                <div class="box__header">
                    <h4 class="box__title">{{ $suchiType->id ? 'Update Project Type' : 'Add new ' }}</h4>
                </div>
                <div class="box__body">
                    <form action="{{ $suchiType->id ? route('suchi-types.update', $suchiType) : route('suchi-types.store') }}" method="POST" class="form font-roboto">
                        @csrf
                        @isset($suchiType->id)
                        @method('put')
                        @endisset
                        <div class="form-group">
                            <label class="required" for="input-fiscal-year">@lang('navigation.suchi_type')</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title',$suchiType->title) }}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success z-depth-0">{{ $suchiType->id ? 'Update' : 'थप्नुहोस्'}} </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="box">
                <div class="box__header">
                    <h1 class="box__title">सूचीको प्रकारहरु</h1>
                </div>
                <div class="box__body">
                    <table class="table">
                        <thead class="h3-responsive">
                            <tr>
                                <th>क्र.स.</th>
                                <th>Title</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suchiTypes as $suchiType)
                            <tr>
                                <td>{{ $suchiType->id }}</td>
                                <td>{{ $suchiType->title }}</td>
                                <td class="text-nowrap text-right">
                                    <a href="{{route('suchi-types.edit',$suchiType)}}" class="action-btn text-primary"><i class="fa fa-edit"></i></a>
                                    <span class="mx-2">|</span>
                                    <form action="{{ route('suchi-types.destroy', $suchiType) }}" method="post" onsubmit="return confirm('Are you sure to delete ?')" class="form-inline d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="action-btn text-danger"><i class="far fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
