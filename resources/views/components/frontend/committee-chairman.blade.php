<div class="mt-3">
    <div class="bg-theme-color-blue py-2 text-center mb-3 rounded-1">
        सभापति
    </div>
    @empty($committeeMember->member)
    @else
        <div class="card" style="height: 320px;">
            <img id="newProfilePhotoPreview"
                src="{{ $committeeMember->member->profile ? asset('storage/' . $committeeMember->member->profile) : asset('assets/img/no-image.png') }}"
                class="feature-image card-img-top">
            <div class="card-body text-center">
                <b class="card-title text-theme-color">मा.
                    {{ $committeeMember->member->name }}
                </b>
                <div class="cart-text">
                    {{ $committeeMember->designation == true ? 'सभापति' : 'सदस्य' }}
                </div>
                <a href="{{ route('members.show', $committeeMember->member) }}" class="btn btn-sm btn-primary">पुरा
                    हेर्नुहोस्</a>
            </div>
        </div>
    @endempty

</div>
