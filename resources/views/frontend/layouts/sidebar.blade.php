

{{-- <a href="#" class="cta-button v-blue mb-3">
    <div class="icon">
        <i class="bi bi-calendar3"></i>
    </div>
    <div class="cta-title">आजको संसद</div>
</a> --}}
<a class="cta-button v-red mb-3" href="{{route('frontend.live')}}">
    <div class="icon">
        <i class="bi bi-youtube"></i>
    </div>
    <div class="cta-title">
        प्रत्यक्ष प्रसारण
    </div>
</a>
<a class="cta-button v-orange mb-3" href="/videos">
    <div class="icon">
        <i class="bi bi-camera-video"></i>
    </div>
    <div class="cta-title">
        भिडियो संग्रहहरु
    </div>
</a>
<a class="cta-button v-yellow mb-3" href="#">
    <div class="icon">
        <i class="bi bi-headphones"></i>
    </div>
    <div class="cta-title">
        अडियो संग्रहहरु
    </div>
</a>
<a class="cta-button v-purple mb-3" href="{{ route('post-categories.show', 8) }}">
    <div class="icon">
        <i class="bi bi-list-task"></i>
    </div>
    <div class="cta-title">
        सम्पूर्ण विवरण (Varbatim)
    </div>
</a>
<a class="cta-button v-pink mb-3" href="{{ route('provincial-assembly-library.frontendIndex') }}">
    <div class="icon">
        <i class="bi bi-book"></i>
    </div>
    <div class="cta-title">
        कार्यपालिका पुस्तकालय
    </div>
</a>


@push('styles')
<style>
    .cta-button {
        background-color: #fff;
        display: flex;
        gap: 1rem;
        align-items: center;
        border-radius: 6px;
        color: inherit;
        box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px;
    }

    .cta-button:hover {
        box-shadow: rgba(17, 17, 26, 0.1) 0px 0px 16px;
    }

    .cta-button .icon {
        padding: 1rem 1.5rem;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        border-radius: 4px;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        font-size: 1.5rem;
    }

    .cta-button .cta-title {
        font-size: 1.2rem;
    }

    .cta-button.v-red .icon {
        background-color: rgb(230 71 87 / 28%);
        color: rgb(230 71 87 / 100%);
    }

    .cta-button.v-blue .icon {
        background-color: rgb(204, 231, 255);
        color: #4583FF;
    }

    .cta-button.v-orange .icon {
        background-color: rgb(255, 225, 191);
        color: #f5781f;
    }

    .cta-button.v-yellow .icon {
        background-color: rgb(255, 235, 176);
        color: #FFA200;
    }

    .cta-button.v-purple .icon {
        background-color: rgb(229, 214, 255);
        color: #6200FF;
    }

    .cta-button.v-pink .icon {
        background-color: rgb(255, 199, 231);
        color: #FF0898;
    }

</style>
@endpush

{{-- <div class="bg-theme-color-blue py-3 mb-2 px-2">
    <i class="bi bi-cloud-arrow-down"></i> डाउनलोडस्
</div> --}}
