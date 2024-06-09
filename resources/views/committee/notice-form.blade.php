@extends('layouts.app', ['title' => __('समिति')])

@section('content')
<div class="container-fluid">

    @if (Auth::user()->roles[0]->name != 'sachib')
            <x-committee-wizard-menu :committee="$committee" />
        @endif

    <section class="box mt-4">
        <div class="box__body">
            <div class="box__title mb-3">सूचनाहरु <i>({{$committee->name}})</i></div>
            <form action="{{ $updateMode ? route('committee.notices.update', [$committee, $notice]) : route('committee.notices.store', $committee) }}" method="POST">
                @csrf
                @if($updateMode)
                @method('PUT')
                @endif
                <div class="mb-3">
                    <label for="title" class="form-label required">शीर्षक</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $notice->title) }}">
                    <x-invalid-feedback field="title" />
                </div>
                <div class="mb-3">
                    <label for="summernote" class="form-label required">कैफियत</label>
                    <textarea name="description" class="" id="summernote" cols="30" rows="10">{{ old('description', $notice->description) }}</textarea>
                    <x-invalid-feedback-raw field="description" />
                </div>

                <div class="mt-4 text-right">
                    <button type="submit" class="btn btn-primary">
                        {{ 'सुरक्षित' }}</button>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
