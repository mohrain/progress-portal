@extends('layouts.app', ['title' => __('समिति')])

@section('content')
    <div class="container-fluid">

        <x-committee-wizard-menu :committee="$committee" />

        <section class="box mt-4">
            <div class="box__header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="box__title">समिति सचिव <i>({{$committee->name}})</i></div>
                    @empty($committeeSecretary)
                    @else
                        <form action="{{ route('committee.secretary.destroy', [$committee, $committeeSecretary]) }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger btn-sm" type="submit"
                                onclick="return confirm('के तपाई सुनिचित गर्नुहुन्छ  ?')">
                                Delete
                            </button>
                        </form>
                    @endempty
                </div>
            </div>
            <div class="box__body">
                @empty($committeeSecretary)
                    <form action="{{ route('committee.secretary.store', $committee) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <x-committee-employee-select />
                            </div>
                            <div class="col-md-2 form-group">
                                <div class="mt-4 text-right">
                                    <button type="submit" class="btn btn-primary">{{ 'सुरक्षित' }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                @else
                    <div class="col-md-3">
                        <div class="card" style="height: 320px;">
                            <img id="newProfilePhotoPreview"
                                src="{{ $committeeSecretary->employee->profile ? asset('storage/' . $committeeSecretary->employee->profile) : asset('assets/img/no-image.png') }}"
                                class="feature-image card-img-top">
                            <div class="card-body text-center">
                                <b class="card-title text-theme-color">
                                    {{ $committeeSecretary->employee->name }}
                                </b>
                                <div class="cart-text">
                                    {{ $committeeSecretary->employee->designation }}
                                </div>
                                <a href="{{ route('employees.show', $committeeSecretary->employee) }}"
                                    class="btn btn-sm btn-primary">पुरा
                                    हेर्नुहोस्</a>
                            </div>
                        </div>
                    </div>
                @endempty
            </div>
        </section>
    </div>
@endsection
