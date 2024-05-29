@extends('deartments.backends.edit')

@section('departmentContent')
    <div class="card mt-2">
        {{-- @if ($information->id)
            @push('scripts')
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $("#noticeExample").modal('show');
                    })
                </script>
            @endpush
        @endif --}}

        <div class="modal fade bd-example-modal-lg" id="noticeExample" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content p-2">

                </div>
            </div>
        </div>
        <div class="card-body">

            <form
                action="{{ $information->id ? route('information.update', [$department->slug, $information->id]) : route('information.store') }}"
                method="POST" enctype="multipart/form-data" class="form">
                @csrf
                @isset($information->id)
                    @method('put')
                @endisset
                <input type="hidden" value="{{ $department->id }}" name="department_id">
                <div class="form-group">
                    <label for="input-name" class="required">शीर्षक</label>
                    <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{ old('name', $information->name) }}"
                        id="">
                        <x-invalid-feedback field="name" />
                </div>


                <div class="form-group">
                    <label for="input-name" class="required">विवरण</label>
                    <textarea name="description" class="form-control  @error('description') is-invalid @enderror" id="summernote" cols="30" rows="10"
                        placeholder="Text Message">{{ old('description', $information->description) }}</textarea>
                        <x-invalid-feedback field="description" />

                </div>

                <div class="form-group float-right">
                    <button type="submit" class="btn btn-primary z-depth-0">सुरक्षित</button>
                </div>
            </form>
        </div>
    </div>
@endsection
