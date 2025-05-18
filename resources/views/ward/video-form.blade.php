@extends('ward.ward-view')
@section('wardContent')
<div class="container-fluid">



    <section class="box mt-4">
        <div class="box__header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="box__title">भिडिओ <i>( वडा नं. {{ $ward->name }})</i></div>
            </div>
        </div>
        <div class="box__body">

            <form
                action="{{ $wardVideo->id ? route('ward.video.update', [$ward, $wardVideo]) : route('ward.video.store', $ward) }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @isset($wardVideo->id)
                @method('put')
                @endisset
                <div class="row">
                    <div class="col-md-4">
                        <label for="">नाम</label>
                        <input type="text" class="form-control" value="{{ old('name', $wardVideo->name) }}"
                            name="name">
                    </div>
                    <div class="col-md-4">
                        <label for="">यु.आर.एल.</label>
                        <input type="text" class="form-control" value="{{ old('url', $wardVideo->url) }}"
                            name="url">
                    </div>
                    <div class="col-md-4">
                        <label for="">थम्बनेल</label>
                        <input type="file" accept="image/*" class="form-control" name="thumbnail">
                    </div>

                    <div class="col-12 d-flex justify-content-end mt-3">
                        <button class="btn btn-primary">सुरक्षित</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection