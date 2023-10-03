<div class="box">
    <div class="box__body">
        <table class="table suchis-table table-responsive-sm">
            <thead>
                <tr>
                    <th>क्र.स.</th>
                    <th>{{ $type == 'registered' ? 'दर्ता नं.' : 'टोकन नं.' }}</th>
                    <th>{{ $type == 'registered' ? 'दर्ता मिति' : 'आवेदन मिति' }}</th>
                    <th>संस्था</th>
                    <th>प्रकार</th>
                    <th>माेबाइल नंं.</th>
                    @if($type == 'registered')
                    <th>रकम</th>
                    @endif
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($suchis as $suchi)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <span class="project-register-no">{{ $suchi->isRegistered() ? $suchi->full_reg_no : $suchi->token_no }}</span>
                    </td>
                    <td class="font-roboto">{{ $suchi->isRegistered() ? $suchi->reg_date : $suchi->application_date }}</td>
                    <td class="font-roboto">{{ $suchi->name }}</td>
                    <td class="font-roboto">{{ $suchi->suchiType->title }}</td>
                    <td class="font-roboto">{{ $suchi->mobile }}</td>
                    @if($type == 'registered')
                    <td class="font-roboto">{{ $suchi->receipt_amount ? 'रु ' . $suchi->receipt_amount : '-'  }}</td>
                    @endif
                    <td class="text-right">
                        <a href="{{ route('suchi.show', $suchi) }}" class="btn btn-primary my-0 z-depth-0"><i class="fa fa-eye mr-2"></i>View</a>
                        {{-- <a href="{{ route('project.edit', $suchi) }}" class="action-btn text-primary"><i class="far fa-edit"></i></a> --}}
                        {{-- <form action="{{ route('project.destroy', $suchi) }}" method="post" onsubmit="return confirm('के तपाईँ निश्चित हुनुहुन्छ?')" class="form-inline d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="action-btn text-danger"><i class="far fa-trash-alt"></i></button>
                        </form> --}}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="text-center font-italic">डाटाबेसमा कुनै डाटा छैन |</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <nav class="p-2 px-3 font-noto">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    Showing {{ $suchis->firstItem() }} to {{ $suchis->lastItem() }} of {{ $suchis->total() }} records
                </div>
                <div>
                    {{ $suchis->links() }}
                </div>
            </div>
        </nav>
    </div>
</div>
