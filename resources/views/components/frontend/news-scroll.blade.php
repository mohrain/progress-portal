<div class="breaking-news d-flex align-items-center mb-4 font-noto overflow-hidden">
    <div class="new-update py-2 px-4 fw-bolder rounded-start">
        ताजा अपडेटहरु
    </div>
    <div class="bg-white flex-grow-1 py-2 px-2 rounded-end">
        <marquee direction="left" style="line-height: 1;">
            @foreach ($news as $item)
                <a href="{{ route('posts.show', $item) }}" class="me-3">
                    <i class="bi bi-forward-fill">{{ $item->title }}</i>
                </a>
            @endforeach
        </marquee>
    </div>
</div>

@push('styles')
    <style>
        .breaking-news .new-update {
            background-color: #e64555;
            color: #fff;
            white-space: nowrap;
        }
    </style>
@endpush
