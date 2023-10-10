<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    {{-- <div class="carousel-indicators">
        @foreach ($carouselImages as $carouselImage)
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $loop->iteration }}" class="{{ $loop->first ? 'active' : '' }}"
                aria-current="{{ $loop->first ? 'true' : 'false' }}" aria-label="Slide-{{ $loop->iteration }}"></button>
        @endforeach
    </div> --}}
    <div class="carousel-inner">
        @foreach ($carouselImages as $carouselImage)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <img src="{{ asset('storage/' . $carouselImage->image) }}" class="d-block w-100 carousel-image"
                    alt="{{ $carouselImage->title }}">
                <div class="carousel-caption d-none d-md-block">
                    <h4>{{ $carouselImage->title }}</h4>
                    <p class="text-center">{!! $carouselImage->descriptions !!}</p>
                    @if ($carouselImage->url)
                        <div>
                            <a href="{{ $carouselImage->url }}"
                                class="btn btn-danger btn-get-started animate__animated animate__fadeInUp scrollto">पुरा हेर्नुहोस्</a>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
