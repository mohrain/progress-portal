@extends('layouts.app', ['title' => __('नयाँ पेज')])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                {{ $title = 'नयाँ पेज' }}
                            </div>
                            {{-- <div>
                               <a href="{{route('pages.create')}}" class="btn btn-primary">Add New</a>
                            </div> --}}
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ $page->id ? route('pages.update', $page) : route('pages.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @if ($page->id)
                                @method('put')
                            @endif
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="mb-3">
                                        <label for="title" class="form-label required">पेज</label>
                                        <input type="text" name="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            value="{{ old('title', $page->title) }}" id="title"
                                            aria-describedby="title">
                                        <div class="invalid-feedback">
                                            @error('title')
                                                {{ $message }}
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="summernote" class="form-label required">कैफियत</label>
                                        <textarea name="descriptions" class="" id="summernote" cols="30" rows="10">{{ $page->descriptions }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    {{-- <x-category-select :post="$page" /> --}}
                                    <div class="mb-3">
                                        <label for="" class="form-label required">फिचर फोटो</label>
                                        <div class="mb-2 align-self-center">
                                            <img id="newProfilePhotoPreview"
                                                src="{{ $page->feature_image ? asset('storage/' . $page->feature_image) : asset('assets/img/no-image.png') }}"
                                                class="feature-image">
                                            <div class="edit-profile mx-md-6">
                                                <label class="btn btn-secondary " for="newProfilePhoto">छान्नुहोस्</label>
                                                <input type="file" id="newProfilePhoto" name="feature_image"
                                                    class="" accept="image/*" hidden>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">{{ __('स्थिति') }}</label>

                                        <select class="form-control" name="status" id="status"
                                            aria-label="Default select example">
                                            <option value="1" {{ $page->status == '1' ? 'selected' : '' }}>
                                                Publish</option>
                                            <option value="0" {{ $page->status == '0' ? 'selected' : '' }}>
                                                Unpublish</option>
                                        </select>

                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            कजजातहरु
                                        </div>
                                        <div>
                                            <button id="rowAdder" type="button" class="btn btn-dark">
                                                <i class="bi bi-plus-square-dotted">
                                                </i> थप
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="colmd-12 mb-3">
                                    <div class="table-responsive" style="overflow-x: auto;">
                                        <table class="table text-sm g-0">
                                            <thead style="white-space: nowrap;">
                                                <div class="row">
                                                    <th>
                                                        कजजात
                                                    </th>
                                                    <th>
                                                        छान्नुहोस्
                                                    </th>
                                                    <th colspan="2">
                                                    </th>
                                                    </tr>
                                            </thead>
                                            <tbody style="white-space: nowrap;" id="newinput">
                                                @if ($page->id)
                                                    @foreach ($page->documents as $pageDocument)
                                                        <tr id="tr">
                                                            <td>
                                                                <div>{{ $pageDocument->name }}</div>
                                                            </td>
                                                            <td>
                                                                <a href="{{ asset('storage/' . $pageDocument->file) }}"
                                                                    target="_blank" rel="noopener noreferrer">पुरा
                                                                    हेर्नुहोस्</a>
                                                            </td>
                                                            <td>
                                                                <a
                                                                    href="{{ route('documents.destroy', $pageDocument) }}">
                                                                    <button class="btn btn-danger bg-danger text-white"
                                                                        type="button"> <i class="bi bi-trash"></i>हटाउनु होस्</button>
                                                            </td>
                                                            </a>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr id="tr">
                                                        <td><input type="text" name="name[]"
                                                                class="form-control @error('name') is-invalid @enderror"value="{{ old('name[]') }}"
                                                                id="name">
                                                            <div class="invalid-feedback">
                                                                @error('name')
                                                                    {{ $message }}
                                                                @enderror
                                                            </div>
                                                        </td>
                                                        <td><input type="file"
                                                                name="file[]"class="form-control @error('file') is-invalid @enderror"
                                                                value="{{ old('file[]') }}" id="file">
                                                            <div class="invalid-feedback">
                                                                @error('file')
                                                                    {{ $message }}
                                                                @enderror
                                                            </div>
                                                        </td>
                                                        <td><button class="btn btn-danger bg-danger text-white"
                                                                id="DeleteRow" type="button"> <i
                                                                    class="bi bi-trash"></i>हटाउनु होस्</button></td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3 text-right">
                                    <button type="submit" class="btn btn-primary">
                                        {{ $page->id ? 'सम्पादन' : 'सुरक्षित' }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

            var newProfilePhoto = document.getElementById('newProfilePhoto');
            newProfilePhoto.addEventListener('change', function() {
                console.log('Profile photo selected');
                readNewProfilePhotoUrl(this);
            });
        </script>
        <script type="text/javascript">
            $("#rowAdder").click(function() {
                newRowAdd =
                    '<tr id="tr"><td><input type="text" name="name[]" class="form-control @error('name') is-invalid @enderror"value="{{ old('name[]') }}" id="name"  required><div class="invalid-feedback">@error('name'){{ $message }}@enderror</div></td>' +
                    '<td><input type="file" name="file[]"class="form-control @error('file') is-invalid @enderror" value="{{ old('file[]') }}" id="file"> <div class="invalid-feedback">@error('file'){{ $message }}@enderror</div></td>' +
                    '<td><button class="btn btn-danger bg-danger text-white" id="DeleteRow" type="button"> <i class="bi bi-trash"></i>हटाउनु होस्</button></td></tr>';
                $('#newinput').append(newRowAdd);
            });
            $("body").on("click", "#DeleteRow", function() {
                // console.log("delete");
                $(this).parents("#tr").remove();
            });
        </script>
    @endpush

@endsection
