@extends('layouts.app', ['title' => __('स्लाइडर फोटो सिर्जना')])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                {{ $title = 'स्लाइडर फोटो सिर्जना' }}
                            </div>
                            {{-- <div>
                               <a href="{{route('pages.create')}}" class="btn btn-primary">Add New</a>
                            </div> --}}
                        </div>
                    </div>

                    <div class="card-body">
                        <form
                            action="{{ $carouselImage->id ? route('carousel-images.update', $carouselImage) : route('carousel-images.store') }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @if ($carouselImage->id)
                                @method('put')
                            @endif
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="title" class="form-label required">शीर्षक</label>
                                            <input type="text" name="title"
                                                class="form-control @error('title') is-invalid @enderror"
                                                value="{{ old('title', $carouselImage->title) }}" id="title"
                                                aria-describedby="title">
                                            <div class="invalid-feedback">
                                                @error('title')
                                                    {{ $message }}
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3 text-center">
                                            <label for="newProfilePhoto" class="form-label required  @error('image') is-invalid @enderror">फोटो (< 2 MB photo)</label>
                                            <div class="mb-2 align-self-center">
                                                <img id="newProfilePhotoPreview"
                                                    src="{{ $carouselImage->image ? asset('storage/' . $carouselImage->image) : asset('assets/img/no-image.png') }}"
                                                    class="carousel-image">
                                                <div class="edit-profile mx-md-6">
                                                    <label class="btn btn-secondary "
                                                        for="newProfilePhoto">छान्नुहोस्</label>
                                                    <input type="file" id="newProfilePhoto" name="image"
                                                        class="" accept="image/*" hidden>
                                                </div>
                                            </div>
                                            <div class="invalid-feedback">
                                                @error('image')
                                                    {{ $message }}
                                                @enderror

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="url" class="form-label ">URL</label>
                                        <input type="url" name="url"
                                            class="form-control @error('url') is-invalid @enderror"
                                            value="{{ old('url', $carouselImage->url) }}" id="url"
                                            aria-describedby="url">
                                        <div class="invalid-feedback">
                                            @error('url')
                                                {{ $message }}
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">कैफियत</label>
                                        <textarea name="descriptions" class="form-control" rows="5">{{ $carouselImage->descriptions }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">{{ __('स्थिति') }}</label>

                                        <select class="form-control" name="status" id="status"
                                            aria-label="Default select example">
                                            <option value="1" {{ $carouselImage->status == '1' ? 'selected' : '' }}>
                                                प्रकाशित</option>
                                            <option value="0" {{ $carouselImage->status == '0' ? 'selected' : '' }}>
                                                अप्रकाशित</option>
                                        </select>

                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3 text-right">
                                    <button type="submit" class="btn btn-primary">
                                        {{ $carouselImage->id ? 'सम्पादन' : 'सुरक्षित' }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function readNewProfilePhotoUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('newProfilePhotoPreview').setAttribute('src', e.target.result);
                    initializeCroppie();
                    openNewPicWindow();
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        console.log("hello");
        var newProfilePhoto = document.getElementById('newProfilePhoto');
        newProfilePhoto.addEventListener('change', function() {
            console.log('Profile photo selected');
            readNewProfilePhotoUrl(this);
        });
    </script>
@endpush
`
