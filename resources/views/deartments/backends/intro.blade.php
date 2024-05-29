@extends('deartments.backends.edit')

@section('departmentContent')
<div class="card mt-2">
    <div class="card-body">
        <form action="{{route('department.update',$department->id)}}" method="POST" class="form">
            @csrf
            @isset($department->id)
                @method('put')
            @endisset
            <div class="form-group">
                <label for="input-name">सचिवालयका शाखा नाम</label>
                <input type="text" id="input-name" name="name" class="form-control" autocomplete="off"
                    value="{{ old('name',$department->name) }}">
            </div>
            <div class="form-group">
                <label>पदाधिकारी</label>
                <select class="form-control text-capitalize required @error('employee_id') is-invalid @enderror"
                    name="employee_id" id="employee_id">
                    <option value="">छान्नुहोस्</option>
                    @foreach ($officeBeareds as $officeBeared)
                        <option value="{{ $officeBeared->id }}" {{$department->employee_id == $officeBeared->id ? 'selected' : ''}}>
                            <div>
                                {{ $officeBeared->name }}
                            </div>

                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="input-name">सचिवालयका शाखा परिचय</label>
                <textarea name="description" class="form-control" id="summernote" cols="30" rows="10" placeholder="Text Message">{{$department->description}}</textarea>
            </div>

            <div class="form-group float-right">
                <button type="submit" class="btn btn-primary z-depth-0">सुरक्षित</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $(function() {
            $('#employee_id').each(function() {
                $(this).select2({
                    theme: 'bootstrap4',
                    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass(
                        'w-100') ? '100%' : 'style',
                    placeholder: $(this).data('placeholder'),
                    allowClear: Boolean($(this).data('allow-clear')),
                    closeOnSelect: !$(this).attr('multiple'),
                });
            });
        });
    </script>
@endpush
