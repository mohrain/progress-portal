@extends('layouts.app', ['title' => __('समिति')])

@section('content')
<div class="container-fluid">

    <x-committee-wizard-menu :committee="$committee" />

    <section class="box mt-4">
        <div class="box__header">
            <div class="box__title">काम, कर्तव्य र अधिकार</div>
        </div>
        <div class="box__body">
            <form action="{{ route('committee.save-responsibility', $committee) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <textarea name="responsibilities" class="" id="summernote" cols="30" rows="10">{{ old('responsibilities', $committee->responsibilities) }}</textarea>
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
