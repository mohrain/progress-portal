@extends('layouts.app', ['title' => __('समिति')])

@section('content')
<div class="container-fluid">

    <x-committee-wizard-menu :committee="$committee" />

    <section class="box mt-4">
        <div class="box__header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="box__title">{{ $updateMode ? 'सदस्य सम्पादन गर्नुहोस्' : 'नयाँ सदस्य थप्नुहोस्' }}</div>
            </div>
        </div>
        <div class="box__body">
            <form action="{{ $updateMode ? route('committee.members.update', [$committee, $member]) : route('committee.members.store', $committee) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if($updateMode)
                @method('PUT')
                @endif
                <div class="mb-3">
                    <label class="form-label required">नाम</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $member->name) }}">
                    <x-invalid-feedback field="name" />
                </div>

                <div class="mb-3">
                    <label class="form-label">पद</label>
                    <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror" value="{{ old('designation', $member->designation) }}">
                    <x-invalid-feedback field="designation" />
                </div>

                <div class="mb-3">
                    <label class="form-label required">फोटो</label>
                    <input type="file" name="photo" class="d-block @error('title') is-invalid @enderror" accept="Image/*">
                    <x-invalid-feedback-raw field="photo" />
                </div>

                <div class="mt-4 text-right">
                    <button type="submit" class="btn btn-primary">{{ 'सुरक्षित' }}</button>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
