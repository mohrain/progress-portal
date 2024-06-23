@extends('deartments.backends.edit')

@section('departmentContent')
    <div class="card mt-2">
        {{-- @if ($publication->id)
            @push('scripts')
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $("#noticeExample").modal('show');
                    })
                </script>
            @endpush
        @endif --}}

        {{-- <div class="modal fade bd-example-modal-lg" id="noticeExample" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content p-2">

                </div>
            </div>
        </div> --}}
        <div class="box__header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="box__title">प्रकाशनहरु/डाउनलोडस् <i>({{ $department->name }})</i></div>
            </div>
        </div>
        <div class="card-body">
            <form
                action="{{ $publication->id ? route('department.publication.update', [$department->slug, $publication->id]) : route('department.publication.store') }}"
                method="POST" enctype="multipart/form-data" class="form">
                @csrf
                @isset($publication->id)
                    @method('put')
                @endisset
                <input type="hidden" value="{{ $department->id }}" name="department_id">
                <div class="form-group">
                    <label for="input-name">शीर्षक</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $publication->name) }}"
                        id="">
                </div>

                <div class="form-group">
                    <label for="input-name">फाइल</label>
                    <input type="file" class="form-control" name="file" value="{{ old('file', $publication->file) }}"
                        id="">
                </div>

                <div class="form-group float-right">
                    <button type="submit" class="btn btn-primary z-depth-0">सुरक्षित</button>
                </div>
            </form>

        </div>
    </div>
@endsection
