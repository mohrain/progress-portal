@extends('layouts.app')

@section('content')
<div class="container">
    {{-- @include('alerts.all') --}}
</div>
<div class="px-2">
    <div class="card z-depth-0">
        <div class="card-header">
            शाखा सिर्जना
        </div>
        <div class="card-body">
            <form action="{{route('department.store')}}" method="POST" class="form">
                @csrf
                <div class="form-group">
                    <label for="input-name"> शाखाको नाम</label>
                    <input type="text" id="input-name" name="name" class="form-control" autocomplete="off"
                        value="{{ old('name') }}">
                </div>
          <div class="row">
            <div class="form-group col">
                <label>माहा साखा  </label>
                <select class="form-control text-capitalize required @error('department_id') is-invalid @enderror"
                    name="department_id" id="department_id">
                    <option value="">Null</option>
                    @foreach ($departments as $department)
                    <option value="{{ $department->id }}">
                        <div>
                            {{ $department->name }}
                        </div>

                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col">
                <label>अबस्था</label>
                <select class="form-control text-capitalize required @error('status') is-invalid @enderror"
                    name="status" id="status">
                    <option value="1">Active</option>
                    <option value="0">Deactive</option>
                </select>
            </div>
          </div>

                <div class="form-group">
                    <label for="input-name"> शाखाको परिचय</label>
                    <textarea name="description" class="form-control" id="summernote" cols="30" rows="10" placeholder="Text Message"></textarea>
                </div>
                <div class="form-group">
                    <label for="input-name"> फिचर फोटो </label>
                    <input type="file" id="input-name" name="image" class="form-control" autocomplete="off"
                        value="{{ old('image') }}">
                </div>

                <div class="form-group float-right">
                    <button type="submit" class="btn btn-primary z-depth-0">सुरक्षित</button>
                </div>
            </form>
        </div>
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