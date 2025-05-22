<div class="">
    <div class="bg-theme-color-blue py-2 text-center mb-3 rounded-1">
        जनप्रतिनिधिहरु
    </div>
    @foreach ($members as $member)
    <div class="officer-card mb-3">
        <div class="bg-pattern"></div>
        <div class="officer-card-content">
            <div class="officer-image">
                <a class="officer-image-wrap" href="{{ route('members.show', $member) }}">
                    <img src="{{ $member->profile ? asset('storage/' . $member->profile) : asset('assets/img/no-image.png') }}" alt="{{ $member->name }}">
                </a>
            </div>
            <div class="officer-info">
                <a href="{{ route('members.show', $member) }}">
                    <h4>{{ $member->name }}</h4>
                    <div>{{ $member->officeDesignation->name }}</div>
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>


@push('styles')
<style>
    * {
        box-sizing: border-box;
    }

    .bearer-container {
        width: 100%;
    }

    .officer-card {
        background-color: #fff;
        border-radius: 6px;
        overflow: hidden;
        padding: 10px;
        background-image: url('/images/pattern/pattern-4.svg');
        background-position: top left;
        background-repeat: no-repeat;
        background-size: contain;
        box-shadow: rgba(99, 99, 99, 0.1) 0px 2px 8px 0px;
        transition: box-shadow 150ms;
    }

    .officer-card:hover {
        box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px,
            rgba(17, 17, 26, 0.05) 0px 8px 32px;
    }

    .officer-card-content {
        display: flex;
        align-items: center;
        gap: 1rem;
        width: 100%;
    }

    .officer-image {
        width: 100px;
        height: 100px;
        flex-shrink: 0;
    }

    .officer-image-wrap {
        display: block;
        width: 100%;
        height: 100%;
        overflow: hidden;
        border-radius: 4px;
    }

    .officer-image-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        display: block;
    }

    .officer-info {
        flex-grow: 1;
        color: inherit;
    }

    .officer-info h4 {
        font-size: 1rem;
        font-weight: 600;
        margin: 0;
    }

    .officer-info div {
        color: gray;
    }
</style>

@endpush