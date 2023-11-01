@extends('frontend.layouts.app', ['title' => __('कर्मचारीहरु')])
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12 mb-5 ">
                        <div class="frontend-title">
                            कर्मचारीहरु
                            <hr>
                        </div>
                        <div class="box p-3">
                            <form action="{{ route('employees.frontendSearch') }}" method="get">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label for="name" class="form-label ">नाम</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="" id="name"
                                            aria-describedby="name">
                                        <div class="invalid-feedback">
                                            @error('name')
                                                {{ $message }}
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-2">
                                        <label for="name_english" class="form-label ">English Name</label>
                                        <input type="text" name="name_english"
                                            class="form-control @error('name_english') is-invalid @enderror"
                                            value="" id="name_english"
                                            aria-describedby="name_english">
                                        <div class="invalid-feedback">
                                            @error('name_english')
                                                {{ $message }}
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="gender"
                                            class="form-label text-md-end ">{{ __('लिङ्ग') }}</label>

                                        <select class="form-control @error('gender') is-invalid @enderror"
                                            name="gender" id="gender">
                                            <option value="" selected >छान्नुहोस्
                                            </option>
                                            <option value="पुरुष">
                                                पुरुष
                                            </option>
                                            <option value="महिला">
                                                महिला
                                            </option>
                                            <option value="अन्य">
                                                अन्य
                                            </option>
                                        </select>
                                        @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="designation"
                                            class="form-label text-md-end ">{{ __('पद') }}</label>
                                        <input type="text" name="designation"
                                            class="form-control @error('designation') is-invalid @enderror"
                                            value="" id="designation"
                                            aria-describedby="designation">

                                        @error('designation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="branch"
                                            class="form-label text-md-end">{{ __('शाखा / महाशाखा') }}</label>
                                        <input type="text" name="branch"
                                            class="form-control @error('branch') is-invalid @enderror"
                                            value="" id="branch"
                                            aria-describedby="branch">

                                        @error('branch')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                  
                                    <div class="col-md-3 mt-md-auto mb-3 text-end">
                                        <button type="submit" class="btn btn-primary bi bi-search">
                                            खोजी गर्नुहोस्
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @forelse ($employees as $employee)
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img id="newProfilePhotoPreview"
                                            src="{{ $employee->profile ? asset('storage/' . $employee->profile) : asset('assets/img/no-image.png') }}"
                                            class="feature-image card-img-top">
                                    </div>
                                    <div class="col-md-8">
                                        <a href="{{ route('employees.show', $employee) }}" class="nav-link text-dark">
                                            <div class="card-body">
                                                <h5 class="card-title text-theme-color">{{ $employee->name }}</h5>
                                                <div class="cart-text"> {{ $employee->designation }}</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @empty
                        <div class="font-italic text-center">
                            कुनैपनि डाटा उपलब्ध छैन !!!
                        </div>
                    @endforelse
                </div>
            </div>
            <div class="col-md-3">
                @include('frontend.layouts.sidebar')
            </div>
        </div>
    </div>
@endsection
