@extends('layouts.app', ['title' => __('ग्यालेरी')])

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="box" style="max-width: 600px;">
                <div class="box__header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="box__title">नयाँ ग्यालेरी</div>
                    </div>
                </div>

                <div class="box__body">
                    <form action="{{ route('album.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label required">नाम</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="एल्बमको नाम">
                            <x-invalid-feedback field="name" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">विवरण</label>
                            <textarea name="description" id="" class="form-control" cols="30" rows="10">{{ old('description') }}</textarea>
                            <x-invalid-feedback-raw field="description" />
                        </div>


                        <div class="mt-4 text-right">
                            <button type="submit" class="btn btn-primary">
                                {{ 'सुरक्षित' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
