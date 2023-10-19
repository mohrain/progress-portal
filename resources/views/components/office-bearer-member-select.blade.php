<div class="mb-3">
    <label class="form-label required">जनप्रतिनिधि</label>

    <select class="form-control text-capitalize required @error('member_id') is-invalid @enderror" name="member_id"
        id="member_id">
        <option value="">छान्नुहोस्</option>
        @foreach ($members as $member)
            <option value="{{ $member->id }}"
                {{ old('member_id', $officeBearer->member_id) == $member->id ? 'selected' : '' }}>
                <div>
                    {{ $member->name }}
                </div>
                <div>
                    ({{ $member->parliamentaryParty->name }})
                </div>
            </option>
        @endforeach
    </select>
    <div class="invalid-feedback">
        @error('member_id')
            {{ $message }}
        @enderror

    </div>
</div>
