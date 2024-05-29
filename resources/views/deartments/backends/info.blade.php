@extends('deartments.backends.edit')

@section('departmentContent')
    <div class="card mt-2">
        @if ($information->id)
            @push('scripts')
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $("#noticeExample").modal('show');
                    })
                </script>
            @endpush
        @endif

        <div class="modal fade bd-example-modal-lg" id="noticeExample" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content p-2">
                    <form
                        action="{{ $information->id ? route('information.update', [$department->slug, $information->id]) : route('information.store') }}"
                        method="POST" enctype="multipart/form-data" class="form">
                        @csrf
                        @isset($information->id)
                            @method('put')
                        @endisset
                        <input type="hidden" value="{{ $department->id }}" name="department_id">
                        <div class="form-group">
                            <label for="input-name">शीर्षक</label>
                            <input type="text" class="form-control" name="name"
                                value="{{ old('name', $information->name) }}" id="">
                        </div>
                        {{-- <div class="form-group">
                            <label for="input-name">फाइल</label>
                            <input type="file" class="form-control" name="file" value="{{old('file',$information->file)}}" id="">
                        </div> --}}

                        <div class="form-group">
                            <label for="input-name">विवरण</label>
                            <textarea name="description" class="form-control" id="summernote" cols="30" rows="10"
                                placeholder="Text Message">{{ old('description', $information->description) }}</textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit"
                                class="btn btn-success z-depth-0">{{ $information->id ? 'अपडेट' : 'सेभ' }}
                                गर्नुहोस्</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="mb-3 d-flex justify-content-between align-items-center">
                <h5>सूचनाहरु</h5>
                <a href="{{route('department.notices.create',$department->slug)}}" class="btn btn-primary">सूचना
                    थप्नुहोस</a>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>क्र.स.</th>
                        <th>शीर्षक</th>
                        <th>कार्य</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($informations as $information)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $information->name }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('information.edit', [$department->slug, $information->id]) }}"
                                        class="btn btn-warning">Edit</a>

                                    <form action="{{ route('information.delete', $information->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure ?')">
                                        @csrf

                                        @method('delete')
                                        <button class="
                                            btn btn-danger ml-2"
                                            type="submit">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
