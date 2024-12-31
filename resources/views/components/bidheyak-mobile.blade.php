<div>
    <h4 class="fw-bold mb-3 text-theme-color">
        विधेयक
    </h4>

    @php
        $imageUrls = [
            '/images/mobile-icons/registration.png',
            '/images/mobile-icons/contract.png',
            '/images/mobile-icons/check-list.png',
            '/images/mobile-icons/medical-report.png',
        ];
        $defaultImage = '/images/sudurpashchim-province-assembly-logo.png'; // Path to the default image
    @endphp

    <div class="d-flex gap-5" style="overflow-x: scroll">
        @foreach ($bedheyaks as $index => $bedheyak)
            <a class="text-center" href="{{ route('bill-types.show', $bedheyak) }}">
                <div class="d-flex justify-content-center">
                    <figure style="height: 60px; width: 60px;">
                        <img src="{{ $imageUrls[$index] ?? $defaultImage }}" style="height: 60px; width: 60px;"
                            alt="Bidheyak Image">
                    </figure>
                </div>
                <h5>
                    {{ $bedheyak->name }}
                </h5>
            </a>
        @endforeach
    </div>
</div>
