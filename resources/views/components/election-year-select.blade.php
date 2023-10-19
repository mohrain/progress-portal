<div class="mb-3">
    <label class="form-label required">निर्बाचन वर्ष</label>
    <select class="form-control text-capitalize required @error('election_id') is-invalid @enderror" name="election_id"
        id="election_id">
        <option value="">छान्नुहोस्</option>
        @foreach ($elections as $election)
            <option value="{{ $election->id }}" {{old('election_id',$member->election_id ? $member->election_id : settings('election_id'))  == $election->id ? 'selected' : ""}}>
                {{ $election->name }}
            </option>
        @endforeach
    </select>
    <div class="invalid-feedback">
        @error('election_id')
            {{ $message }}
        @enderror

    </div>
</div>
