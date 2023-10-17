@extends('frontend.layouts.app', ['title' => __($bill->name)])
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="frontend-title">
                    {{ $bill->name }}
                    <hr>
                </div>
            </div>
            <div class="col-md-6">
                <object data="{{ asset('storage/' . $bill->entry_bill_file) }}" type="application/pdf" width="100%"
                    height="800px">
                    <p>Unable to display PDF file. <a href="{{ asset('storage/' . $bill->entry_bill_file) }}">Download</a>
                    </p>
                </object>
            </div>
            <div class="col-md-6">
                <div>
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
                <div class="bg-white p-2">
                    <form action="{{ route('bill-suggestions.store', $bill) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="name" class="form-label required">नाम</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    id="name" aria-describedby="name" placeholder="नाम">
                                <div class="invalid-feedback">
                                    @error('name')
                                        {{ $message }}
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="email" class="form-label text-md-end required">{{ __('इमेल') }}</label>
                                <input id="name" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" autocomplete="email" placeholder="इमेल">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="contact_number"
                                    class="form-label text-md-end required">{{ __('सम्पर्क-नम्बर') }}</label>
                                <input id="name" type="tel"
                                    class="form-control @error('contact_number') is-invalid @enderror" name="contact_number"
                                    value="{{ old('contact_number') }}" autocomplete="contact_number"
                                    placeholder="सम्पर्क-नम्बर">
                                @error('contact_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="address" class="form-label text-md-end required">{{ __('ठेगाना') }}</label>
                                <input id="address" type="text"
                                    class="form-control @error('address') is-invalid @enderror" name="address"
                                    value="{{ old('address') }}" autocomplete="address" placeholder="ठेगाना">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="address" class="form-label text-md-end required">{{ __('बिषय') }}</label>
                                <input id="address" type="text"
                                    class="form-control @error('address') is-invalid @enderror" name="address"
                                    value="{{ old('address') }}" autocomplete="address" placeholder="बिषय">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="message"
                                    class="form-label text-md-end required">{{ __('तपाइँको सुझाव') }}</label>
                                <textarea id="message" class="form-control @error('message') is-invalid @enderror" name="message" rows="10"
                                    placeholder="तपाइँको सुझाव">{{ old('message') }}</textarea>
                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="file"
                                    class="form-label text-md-end required">{{ __('फाइल [Image or PDF format upto 2MB.]') }}</label>
                                <input id="file" type="file"
                                    class="form-control @error('file') is-invalid @enderror" name="file"
                                    value="{{ old('file') }}" autocomplete="file" placeholder="ठेगाना">
                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3 text-end">
                                <button type="submit" class="btn btn-primary">पठाउनुहोस्</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
