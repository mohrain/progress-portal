@extends('layouts.app', ['title' => __('समिति')])

@section('content')
    <div class="container-fluid">
        @if (Auth::user()->roles[0]->name != 'sachib')
            <x-committee-wizard-menu :committee="$committee" />
        @endif

        <section class="box mt-4">
            <div class="box__header">
                <div class="box__title">सामान्य जानकारी</div>
            </div>
            <div class="box__body">
                <form action="{{ route('committee.update', $committee) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label required">समितिको नाम</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $committee->name) }}">
                        <x-invalid-feedback field="name" />
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="form-label required">Slug</label>
                        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror"
                            value="{{ old('slug', $committee->slug) }}">
                        <x-invalid-feedback field="slug" />
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
