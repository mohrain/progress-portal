@extends('frontend.layouts.app', ['title' => __("सुझाव/प्रतिक्रिया")])
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="frontend-title">
                    प्रदेश सभा / प्रदेश सभा सचिवालयको सम्बन्धमा कुनै सल्लाह/ सुझाव/प्रतिक्रिया भएमा तलको फाराम भरि पठाउनुहोस्।
                    <hr>
                </div>
            </div>
            <div class="col-md-4 my-1">
                <div class="fw-bold">{{ settings('office_name') }}</div>
                <div class="py-1">
                    <a class="text-dark" href="#">
                        <i class="bi bi-geo-alt"></i> {{ settings('address_line_one') }}
                    </a>
                </div>
                <div class="py-1">
                    <a class="text-dark" href="tel:{{ settings('phone') }}">
                        <i class="bi bi-telephone"></i>
                        {{ settings('phone') }}
                    </a>
                </div>
                <div class="py-1">
                    <a class="text-dark" href="mailto:{{ settings('phone') }}">
                        <i class="bi bi-envelope-at"></i> {{ settings('email') }}
                    </a>
                </div>
                <div class="social-media-icon">
                    <a class="text-dark" href="{{ settings('facebook') }}" target="_blank" rel="noopener noreferrer">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a class="text-dark" href="{{ settings('twitter') }}" target="_blank" rel="noopener noreferrer">
                        <i class="bi bi-twitter-x"></i>
                    </a>
                    <a class="text-dark" href="{{ settings('youtube') }}" target="_blank" rel="noopener noreferrer">
                        <i class="bi bi-youtube"></i>
                    </a>
                </div>
                <div class="my-3">
                    <x-frontend-information-officer-employee-view />
                </div>

            </div>
            <div class="col-md-8">
                <div>
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
                <div class="bg-white p-4">
                    <form action="{{ route('contact-us.store') }}" method="post"
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
                                <label for="subject" class="form-label text-md-end required">{{ __('सुझाव शीर्षक') }}</label>
                                <input id="subject" type="text"
                                    class="form-control @error('subject') is-invalid @enderror" name="subject"
                                    value="{{ old('subject') }}" autocomplete="subject" placeholder="सुझाव शीर्षक">
                                @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="message"
                                    class="form-label text-md-end required">{{ __('तपाइँको सुझाव/प्रतिक्रिया') }}</label>
                                <textarea id="message" class="form-control @error('message') is-invalid @enderror" name="message" rows="10"
                                    placeholder="तपाइँको सुझाव/प्रतिक्रिया लेख्नुहोस्">{{ old('message') }}</textarea>
                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="file"
                                    class="form-label text-md-end ">{{ __('फाइल [Image or PDF format upto 2MB.]') }}</label>
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
