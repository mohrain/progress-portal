@extends('ward.ward-view')

@section('wardContent') {{-- You might rename this to @section('wardContent') in the layout --}}
<div class="card mt-2">
    <div class="box__header">
        <div class="d-flex justify-content-between align-items-center">
            <div class="box__title">वार्डको परिचय <i>({{ $ward->ward_id ? $ward->ward->name . '/' . $ward->name : $ward->name }})</i></div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('ward.update', $ward->id) }}" method="POST" class="form">
            @csrf
            @isset($ward->id)
                @method('put')
            @endisset

            <div class="form-group">
                <label for="input-name">वार्डको नाम</label>
                <input type="text" id="input-name" name="name" class="form-control" autocomplete="off"
                    value="{{ old('name', $ward->name) }}" readonly>
            </div>

            <div class="form-group" style="display: none">
                <label for="input-name">Ward Name</label>
                <input type="text" id="input-name" name="name_en" class="form-control" autocomplete="off"
                    value="{{ old('name_en', $ward->name_en) }}">
            </div>
            {{-- Uncomment and adjust if ward has a representative --}}
            {{--
            <div class="form-group">
                <label>वार्ड अध्यक्ष</label>
                <select class="form-control text-capitalize @error('employee_id') is-invalid @enderror"
                    name="employee_id" id="employee_id">
                    <option value="">छान्नुहोस्</option>
                    @foreach ($representatives as $rep)
                        <option value="{{ $rep->id }}" {{ $ward->employee_id == $rep->id ? 'selected' : '' }}>
                            {{ $rep->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            --}}

            <div class="form-group">
                <label for="input-description">वार्डको परिचय</label>
                <textarea name="description" class="form-control" id="summernote" cols="30" rows="10" placeholder="Text Message">{{ $ward->description }}</textarea>
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
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
                allowClear: Boolean($(this).data('allow-clear')),
                closeOnSelect: !$(this).attr('multiple'),
            });
        });
    });
</script>
@endpush
