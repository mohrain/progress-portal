@extends('layouts.app')

@section('content')
<div class="card z-depth-0">
    <div class="card-body">
        <form action="{{route('federal.store')}}" method="POST" class="form" enctype="multipart/form-data">
            @csrf
            {{-- @isset($district->id)
            @method('put')
            @endisset --}}
            <div class="form-group">
                <label for="input-name">विवरण</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="summernote" cols="30" rows="10"
                                placeholder="Text Message">{{old('description',$federalParliment->description ?? '')}}</textarea>
                                <x-invalid-feedback field="description" />
            </div>
            <div class="form-group">
                <label for="">कागजात</label>
                <input type="file" class="form-control" name="document">
            </div>
            <div class="form-group">
                {{-- <button type="submit" class="btn btn-success z-depth-0">{{ $district->id ? 'अपडेट गर्नुहोस्' : 'सेभ गर्नुहोस्'}}</button> --}}
                <button type="submit" class="btn btn-success z-depth-0">सेभ गर्नुहोस्</button>
            </div>
        </form>
    </div>
</div>

@endsection
