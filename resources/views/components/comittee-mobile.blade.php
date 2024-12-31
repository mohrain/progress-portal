<div>
    <h4 class="fw-bold mb-3 text-theme-color">
        समिति
    </h4>
    <div class="d-flex gap-5" style="overflow-x: scroll">
        @php
            $imageUrls = [
                '/images/mobile-icons/organization-structure (1).png',
                '/images/mobile-icons/accounting-book.png',
                '/images/mobile-icons/fund.png',
                '/images/mobile-icons/csr.png',
            ];
            $defaultImage = '/images/sudurpashchim-province-assembly-logo.png'; // Path to the default image
        @endphp

        @foreach (\App\Models\Committee::get() as $index => $committee)
            <a class="text-center" href="{{ route('frontend.committees.show', $committee->slug) }}">
                <div class="d-flex justify-content-center">
                    <figure style="height: 60px; width:60px;">
                        <img src="{{ $imageUrls[$index] ?? $defaultImage }}" style="height: 60px; width:60px;"
                            alt="Committee Image">
                    </figure>
                </div>
                <h5>
                    {{ $committee->name }}
                </h5>
            </a>
        @endforeach
    </div>
    <!-- Order your soul. Reduce your wants. - Augustine -->
</div>
