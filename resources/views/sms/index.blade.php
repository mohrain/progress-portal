@extends('layouts.app', ['title' => __('SMS')])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ $title = 'SMS' }}</div>
                    <div class="card-body">
                        <form action="{{ route('sms.store') }}" method="post">
                            @csrf
                            {{-- <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="type[]" id="inlineRadio1"
                                        value="sms" checked>
                                    <label class="form-check-label" for="inlineRadio1"><i class="bi bi-chat-left-text"></i>
                                        SMS</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="type[]" id="inlineRadio2"
                                        value="email">
                                    <label class="form-check-label" for="inlineRadio2"><i class="bi bi-envelope-at"></i>
                                        Email</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="type[]" id="inlineRadio3"
                                        value="push">
                                    <label class="form-check-label" for="inlineRadio3"><i class="bi bi-bell"></i> Push
                                        Notification</label>
                                </div>
                            </div> --}}
                            <div class="mb-3">
                                {{-- @php
                                 $committee =  $committee ?? null;
                                @endphp --}}
                                <x-notification-member-select :committee="$committee ?? null"/>
                            </div>
                            {{--
                             <div class="mb-3">
                                <label for="name" class="form-label required">Subject</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $sms->name) }}" id="name">
                                <div class="invalid-feedback">
                                    @error('name')
                                        {{ $message }}
                                    @enderror

                                </div>
                            </div> --}}

                            <div class="mb-3">
                                <label for="summernote" class="form-label required">Message</label>
                                <textarea name="message" class="form-control" id="summernote" cols="30" rows="10" placeholder="Text Message">{!! old('message', $sms->message ?? $message ?? "") !!}</textarea>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">
                                    Send</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
