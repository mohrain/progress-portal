@extends('layouts.app', ['title' => __('समिति')])

@section('content')
<div class="container-fluid">

    @if (Auth::user()->roles[0]->name != 'sachib')
            <x-committee-wizard-menu :committee="$committee" />
        @endif

    <section class="box mt-4">
        <div class="box__header">
            <div class="box__title">काम, कर्तव्य र अधिकार <i>({{$committee->name}})</i></div>
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
