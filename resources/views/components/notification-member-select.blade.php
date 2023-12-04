<div class="mb-3">

    <label class="form-label required">To</label>
    <select class="form-control text-capitalize required  @error('member_id') is-invalid @enderror" name="member_id[]"
        id="member_id" multiple data-placeholder="Choose" data-allow-clear="1">
        @foreach ($members as $member)
            @if ($committee)
                <option value="{{ $member->id }}" @if (in_array($member, $committeeMember)) selected @endif>

                    <div>
                        {{ $member->name }} - {{ $member->mobile }}
                    </div>
                    {{-- <div>
                ({{ $member->parliamentaryParty->name }})
            </div> --}}
                </option>
            @else
                <option value="{{ $member->id }}"  {{ old('member_id') == $member->id ? 'selected' : '' }}>
                    <div>
                        {{ $member->name }} - {{ $member->mobile }}
                    </div>
                </option>
            @endif
        @endforeach
    </select>
    <div class="invalid-feedback">
        @error('member_id')
            {{ $message }}
        @enderror

    </div>
    @push('scripts')
        <script>
            const addSelectAll = matches => {
                if (matches.length > 0) {
                    // Insert a special "Select all matches" item at the start of the 
                    // list of matched items.
                    return [{
                            id: 'selectAll',
                            text: 'Select all members',
                            matchIds: matches.map(match => match.id)
                        },
                        ...matches
                    ];
                }
            };

            const handleSelection = event => {
                if (event.params.data.id === 'selectAll') {
                    $('#member_id').val(event.params.data.matchIds);
                    $('#member_id').trigger('change');
                };
            };
            $(function() {
                $('#member_id').each(function() {
                    $(this).select2({
                        theme: 'bootstrap4',
                        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass(
                            'w-100') ? '100%' : 'style',
                        placeholder: $(this).data('placeholder'),
                        allowClear: Boolean($(this).data('allow-clear')),
                        closeOnSelect: !$(this).attr('multiple'),
                        multiple: true,
                        sorter: addSelectAll,
                    });
                });
            });
            $('#member_id').on('select2:select', handleSelection);
        </script>
    @endpush
</div>
