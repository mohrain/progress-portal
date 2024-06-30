<div class="mt-3">
    <div class="bg-theme-color-blue py-2 text-center mb-3 rounded-1">
        सभापति
    </div>
    @empty($committeeMember->member)
    @else
        <div class="card">
            <div style="aspct-ratio: 1/1; width: 100%">
                <img id="newProfilePhotoPreview"
                src="{{ $committeeMember->member?->profile ? asset('storage/' . $committeeMember->member->profile) : asset('assets/img/no-image.png') }}"
                class="w-100 h-100"
                style="object-fit: contain;">
            </div>
            <div class="card-body text-center">
                <b class="card-title text-theme-color">मा.
                    {{ $committeeMember->member->name }}
                </b>
                <div class="cart-text mb-1">
                    {{ $committeeMember->designation }}
                </div>
                <a href="{{ route('members.show', $committeeMember->member) }}" class="btn btn-sm btn-primary">पुरा
                    हेर्नुहोस्</a>
            </div>
        </div>
    @endempty
    <div class="bg-theme-color-blue py-2 text-center my-3 rounded-1">
        समिति सचिव
    </div>
    @if($committeeSecretary && $committeeSecretary->employee)
        <div class="card">
            <div style="aspct-ratio: 1/1; width: 100%">
                <img id="newProfilePhotoPreview"
                src="{{ $committeeSecretary->employee->profile ? asset('storage/' . $committeeSecretary->employee->profile) : asset('assets/img/no-image.png') }}"
                class="w-100 h-100"
                style="object-fit: contain;">
            </div>
            <div class="card-body text-center">
                <b class="card-title text-theme-color">
                    {{ $committeeSecretary->employee->name }}
                </b>
                <div class="cart-text mb-1">
                    {{ $committeeSecretary->employee->designation }}
                </div>
                <a href="{{ route('employees.show', $committeeSecretary->employee) }}" class="btn btn-sm btn-primary">पुरा
                    हेर्नुहोस्</a>
            </div>
        </div>
    @endif

</div>
