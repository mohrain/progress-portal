@extends('ward.ward-view')

@section('wardContent')
<div class="bg-white p-3 ">
    <div class="row justify-content-center">

        <div class="col-md-12 ">
            <div class="">


                <div class="">
                    <form action="{{ $post->id ? route('posts.update', $post) : route('ward.notices.store',$ward) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @if ($post->id)
                        @method('put')
                        @endif
                        <div class="row">
                            <div class="col-md-9">
                                <div class="mb-3">
                                    <label for="title" class="form-label required">सूचनाको नाम</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        value="{{ old('title', $post->title) }}" id="title"
                                        aria-describedby="title">
                                    <div class="invalid-feedback">
                                        @error('title')
                                        {{ $message }}
                                        @enderror

                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="summernote" class="form-label required">कैफियत</label>
                                    <textarea name="descriptions" class="" id="summernote" cols="30" rows="10">{!! old('descriptions', $post->descriptions) !!}</textarea>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <x-post-category-select :post="$post" :news="true" />
                                <div class="mb-3">
                                    <label for="newProfilePhoto" class="form-label required">फिचर फोटो (< 2 MB photo)</label>
                                            <div class="mb-2 align-self-center">
                                                <img id="newProfilePhotoPreview"
                                                    src="{{ $post->feature_image ? asset('storage/' . $post->feature_image) : asset('assets/img/no-image.png') }}"
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
                                        <option value="1" {{ $post->status == '1' ? 'selected' : '' }}>
                                            प्रकाशित</option>
                                        <option value="0" {{ $post->status == '0' ? 'selected' : '' }}>
                                            अप्रकाशित</option>
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
                                        कगजातहरु
                                    </div>
                                    <div>
                                        <button id="rowAdder" type="button" class="btn btn-dark">
                                            <i class="bi bi-plus-square-dotted">
                                            </i> थप
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="table-responsive" style="overflow-x: auto;">
                                    <table class="table text-sm g-0">
                                        <thead style="white-space: nowrap;">
                                            <th>
                                                कगजात नाम
                                            </th>
                                            <th>
                                                छान्नुहोस् ( < 4 MB File)
                                                    </th>
                                            <th colspan="2">
                                            </th>
                                        </thead>
                                        <tbody style="white-space: nowrap;" id="newinput">
                                            @if ($post->id)
                                            @foreach ($post->documents as $postDocument)
                                            <tr id="tr">
                                                <td>
                                                    <div>{{ $postDocument->name }}</div>
                                                </td>
                                                <td>
                                                    <a href="{{ asset('storage/' . $postDocument->file) }}"
                                                        target="_blank" rel="noopener noreferrer">पुरा
                                                        हेर्नुहोस्</a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('documents.destroy', $postDocument) }}">
                                                        <button class="btn btn-danger bg-danger text-white"
                                                            type="button"> <i class="bi bi-trash"></i>हटाउनु
                                                            होस्</button>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr id="tr">
                                                <td><input type="text" name="name[]"
                                                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name[]') }}"
                                                        id="name">
                                                    <div class="invalid-feedback">
                                                        @error('name')
                                                        {{ $message }}
                                                        @enderror
                                                    </div>
                                                </td>
                                                <td><input type="file"
                                                        name="file[]" class="form-control @error('file') is-invalid @enderror"
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
                                    {{ $post->id ? 'सम्पादन' : 'सुरक्षित' }}</button>
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
            '<tr id="tr"><td><input type="text" name="name[]" class="form-control @error('
        name ') is-invalid @enderror"value="{{ old('
        name[]
        ') }}" id="name"  required><div class="invalid-feedback">@error('
        name '){{ $message }}@enderror</div></td>' +
            '<td><input type="file" name="file[]"class="form-control @error('
        file ') is-invalid @enderror" value="{{ old('
        file[]
        ') }}" id="file"> <div class="invalid-feedback">@error('
        file '){{ $message }}@enderror</div></td>' +
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