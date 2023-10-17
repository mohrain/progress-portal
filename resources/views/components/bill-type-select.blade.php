<div class="mb-3">
    <label class="form-label required">विधयेक</label>

    <select class="form-control text-capitalize required @error('bill_type_id') is-invalid @enderror" name="bill_type_id"
        id="bill_type_id">
        {{-- <option value="">छान्नुहोस्</option> --}}
        @foreach ($billTypes as $billType)
            <option value="{{ $billType->id }}"
                {{ old('bill_type_id', $bill->bill_type_id) == $billType->id ? 'selected' : '' }}>
                <div>
                    {{ $billType->name }}
                </div>
            </option>
        @endforeach
    </select>
    <div class="invalid-feedback">
        @error('bill_type_id')
            {{ $message }}
        @enderror

    </div>
</div>
