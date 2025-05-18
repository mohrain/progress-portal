@extends('ward.ward-view')

@section('wardContent')
<div class="container-fluid">

    <section class="box mt-4">
        <div class="box__header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="box__title">अडियो <i>( वडा नं. {{ $ward->name }})</i></div>
            </div>
        </div>
        <div class="box__body">

            <form
                action="{{ $wardAudio->id 
                    ? route('ward.audio.update', [$ward, $wardAudio]) 
                    : route('ward.audio.store', $ward) }}"
                method="POST" enctype="multipart/form-data">
                @csrf

                @isset($wardAudio->id)
                    @method('PUT')
                @endisset

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>नाम</label>
                            <input type="text" class="form-control" name="name" 
                                value="{{ old('name', $wardAudio->name) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Audio</label>
                            <input type="file" class="form-control" name="audio" accept="audio/*">
                        </div>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-end mt-3">
                    <button class="btn btn-primary">सुरक्षित</button>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
