<div class="mb-3">
    <label class="form-label required">राजनीतिक दल</label>

    <select class="form-control text-capitalize required @error('parliamentary_party_id') is-invalid @enderror"
        name="parliamentary_party_id" id="parliamentary_party_id">
        <option value="">छान्नुहोस्</option>
        @foreach ($parliamentaryParties as $parliamentaryParty)
            <option value="{{ $parliamentaryParty->id }}"
                {{ old('parliamentary_party_id', $member->parliamentary_party_id) == $parliamentaryParty->id ? 'selected' : '' }}>
                {{ $parliamentaryParty->name }}
            </option>
        @endforeach
    </select>
    <div class="invalid-feedback">
        @error('parliamentary_party_id')
            {{ $message }}
        @enderror

    </div>
</div>
