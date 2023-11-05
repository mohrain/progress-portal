@extends('layouts.app', ['title' => __('ग्यालेरी')])

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="box" style="max-width: 600px;">
                <div class="box__header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="box__title">{{ $updateMode ? 'भिडियो ग्यालेरी अपडेट गर्नुहोस्' : 'नयाँ भिडियो ग्यालरी' }}</div>
                    </div>
                </div>

                <div class="box__body">
                    <form action="{{ $updateMode ? route('videos.update', $video) : route('videos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label required">शीर्षक</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $video->title) }}" placeholder="शीर्षक">
                            <x-invalid-feedback field="title" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label required">Youtube URL</label>
                            <input type="text" name="url" class="form-control @error('url') is-invalid @enderror" value="{{ old('url', $video->url) }}" placeholder="Valid youtube URL">
                            <x-invalid-feedback-raw field="url" />
                        </div>

                        <div class="mt-4 text-right">
                            <button type="submit" class="btn btn-primary">{{ 'सुरक्षित' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
