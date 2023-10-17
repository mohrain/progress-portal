<div class="mb-3">
    <label class="form-label required">मन्त्रालय</label>

    <select class="form-control text-capitalize required @error('ministry_id') is-invalid @enderror" name="ministry_id"
        id="ministry_id">
        <option value="">छान्नुहोस्</option>
        @foreach ($ministries as $ministry)
            <option value="{{ $ministry->id }}"
                {{ old('ministry_id', $bill->ministry_id) == $ministry->id ? 'selected' : '' }}>
                <div>
                    {{ $ministry->name }}
                </div>
            </option>
        @endforeach
    </select>
    <div class="invalid-feedback">
        @error('ministry_id')
            {{ $message }}
        @enderror

    </div>
</div>
