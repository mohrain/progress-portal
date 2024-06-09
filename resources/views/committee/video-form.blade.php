@extends('layouts.app', ['title' => __('समिति')])

@section('content')
    <div class="container-fluid">

        @if (Auth::user()->roles[0]->name != 'sachib')
            <x-committee-wizard-menu :committee="$committee" />
        @endif

        <section class="box mt-4">
            <div class="box__header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="box__title">भिडिओ <i>({{ $committee->name }})</i></div>
                </div>
            </div>
            <div class="box__body">

                <form
                    action="{{ $committeeVideo->id ? route('committee.update.video', [$committee, $committeeVideo]) : route('committee.store.video', $committee) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @isset($committeeVideo->id)
                        @method('put')
                    @endisset
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">नाम</label>
                            <input type="text" class="form-control" value="{{ old('name', $committeeVideo->name) }}"
                                name="name">
                        </div>
                        <div class="col-md-4">
                            <label for="">यु.आर.एल.</label>
                            <input type="text" class="form-control" value="{{ old('url', $committeeVideo->url) }}"
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
