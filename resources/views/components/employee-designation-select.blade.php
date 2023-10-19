<div class="mb-3">
    <label class="form-label required">पद</label>

    <select class="form-control text-capitalize required @error('employee_designation_id') is-invalid @enderror"
        name="employee_designation_id" id="employee_designation_id">
        <option value="">छान्नुहोस्</option>
        @foreach ($employeeDesignations as $employeeDesignation)
            <option value="{{ $employeeDesignation->id }}"
                {{ old('employee_designation_id', $informationOfficer->employee_designation_id) == $employeeDesignation->id ? 'selected' : '' }}>
                {{ $employeeDesignation->name }}
            </option>
        @endforeach
    </select>
    <div class="invalid-feedback">
        @error('employee_designation_id')
            {{ $message }}
        @enderror

    </div>
</div>
