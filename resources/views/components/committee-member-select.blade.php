<div class="mb-3">
    <label class="form-label required">जनप्रतिनिधि</label>

    <select class="form-control text-capitalize select2 required @error('member_id') is-invalid @enderror"
        name="member_id" id="member_id">
        <option value="">छान्नुहोस्</option>
        @foreach ($members as $member)
            <option value="{{ $member->id }}"
                {{ old('member_id', $committeeMember->member_id) == $member->id ? 'selected' : '' }}>
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
    @push('scripts')
        <script>
            $(function() {
                $('#member_id').each(function() {
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
</div>
