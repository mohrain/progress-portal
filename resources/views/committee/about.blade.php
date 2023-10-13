@extends('layouts.app', ['title' => __('समिति')])

@section('content')
<div class="container-fluid">

    <x-committee-wizard-menu :committee="$committee" />

    <section class="box mt-4">
        <div class="box__header">
            <div class="box__title">परिचय</div>
        </div>
        <div class="box__body">
            <form action="{{ route('committee.save-about', $committee) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <textarea name="about" class="" id="summernote" cols="30" rows="10">{{ old('about', $committee->about) }}</textarea>
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
