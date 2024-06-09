@extends('layouts.app', ['title' => __('समिति')])

@section('content')
    <div class="container-fluid">

        @if (Auth::user()->roles[0]->name != 'sachib')
            <x-committee-wizard-menu :committee="$committee" />
        @endif

        <section class="box mt-4">
            <div class="box__header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="box__title">अडियो <i>({{ $committee->name }})</i></div>
                </div>
            </div>
            <div class="box__body">

                <form
                    action="{{ $committeeAudio->id ? route('committee.update.audio', [$committee, $committeeAudio]) : route('committee.store.audio', $committee) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf

                    @isset($committeeAudio->id)
                        @method('put')
                    @endisset
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>नाम</label>
                                <input type="text" class="form-control" value="{{ old('name', $committeeAudio->name) }}"
                                    name="name" id="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Audio</label>
                                <input type="file" class="form-control" name="audio" accept="audio/*">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button class="btn btn-primary">सुरक्षित</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
