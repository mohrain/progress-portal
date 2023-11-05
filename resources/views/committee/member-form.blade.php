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
                <form
                    action="{{ $updateMode ? route('committee.members.update', [$committee, $member]) : route('committee.members.store', $committee) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($updateMode)
                        @method('PUT')
                    @endif
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <x-committee-member-select :committeeMember="$member" />
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="designation" class="form-label required">{{ __('पद') }}</label>

                            <select class="form-control" name="designation" id="designation"
                                aria-label="Default select example">
                                <option value="0" {{ $member->designation == '0' ? 'selected' : '' }}>
                                    सदस्य</option>
                                <option value="1" {{ $member->designation == '1' ? 'selected' : '' }}>
                                    सभापति</option>
                            </select>

                            @error('designation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-2 form-group">
                            <div class="mt-4 text-right">
                                <button type="submit" class="btn btn-primary">{{ 'सुरक्षित' }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
