<div class="mb-3">
    <label class="form-label required">वर्ग</label>

    <select class="form-control text-capitalize required @error('bill_category_id') is-invalid @enderror" name="bill_category_id"
        id="bill_category_id">
        {{-- <option value="">छान्नुहोस्</option> --}}
        @foreach ($billCategories as $billCategory)
            <option value="{{ $billCategory->id }}"
                {{ old('bill_category_id', $bill->bill_category_id) == $billCategory->id ? 'selected' : '' }}>
                <div>
                    {{ $billCategory->name }}
                </div>
            </option>
        @endforeach
    </select>
    <div class="invalid-feedback">
        @error('bill_category_id')
            {{ $message }}
        @enderror

    </div>
</div>
