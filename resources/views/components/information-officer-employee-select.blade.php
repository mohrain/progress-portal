<div class="mb-3">
    <label class="form-label required">कर्मचारीहरु</label>

    <select class="form-control text-capitalize required @error('employee_id') is-invalid @enderror" name="employee_id"
        id="employee_id">
        <option value="">छान्नुहोस्</option>
        @foreach ($employees as $employee)
            <option value="{{ $employee->id }}"
                {{ old('employee_id', $informationOfficer->employee_id) == $employee->id ? 'selected' : '' }}>
                <div>
                    {{ $employee->name }}
                </div>
                <div>
                    ({{ $employee->designation }})
                </div>
            </option>
        @endforeach
    </select>
    <div class="invalid-feedback">
        @error('employee_id')
            {{ $message }}
        @enderror

    </div>
</div>
