@php
use Carbon\Carbon;

$badgeColors = [
1 => 'bg-primary text-white',
2 => 'bg-danger text-white',
3 => 'bg-success text-white',
4 => 'bg-warning text-white',
5 => 'bg-info text-white',
];
@endphp
<div class="bg-theme-color-blue py-2 text-center mb-3 rounded-1">
    सूचनाहरु
</div>

<ul class="posts-list">
    @forelse ($news as $n)
    @php
    $dt = new \DateTime($n->time, new \DateTimeZone('Asia/Kathmandu'));
    $timeFormatted = $dt->format('g:i');
    $timePeriod = $dt->format('a') === 'am' ? 'बिहानको' : 'दिनको';
    @endphp

    <li class="post-item  position-relative shadow-sm">
        <div class="post-content ">
            <div>
                @foreach ($n->postCategories as $category)
                <small class="meeting-type-tag {{ $badgeColors[$category->id] ?? 'bg-light text-dark border' }}">
                    {{ $category->name ?? 'मिटिङ प्रकार छैन' }}
                </small>
                @endforeach
            </div>

            <h6 class=" mt-3">
                <a href="{{ route('posts.show', $n->id) }}" class="text-dark text-decoration-none">
                    {{ $n->title }}
                </a>
            </h6>
            <div class="d-flex flex-wrap gap-3 align-items-center small text-muted">
                <div>

                    <i class="bi bi-clock me-1"></i>
                    <span>{{ \Carbon\Carbon::parse($n->created_at)->diffForHumans() }}</span>

                    {{-- <span id="date_bs-{{ $n->id }}"></span> --}}
                </div>

                {{-- <div>
                        <i class="bi bi-clock me-1"></i>
                        {{ $timePeriod }} {{ $timeFormatted }} बजे
            </div> --}}

            @if ($n->document)
            <div>
                <a href="{{ asset('/storage/' . $n->document) }}" target="_blank" class="text-muted">
                    <i class="bi bi-download fw-bold"></i>
                </a>
            </div>
            @endif
        </div>
        </div>
    </li>
    @empty
    <li class="text-muted">सूचना फेला परेन।</li>
    @endforelse
</ul>





@push('styles')
<style>
    .meeting-type-tag {
        position: absolute;
        top: 0;
        left: -8px;
        padding: 2px 6px;
        font-size: 10px;
        border-radius: 4px;
        z-index: 1;
    }

    .categories {
        display: flex;
        gap: 0.5rem;
        margin-bottom: 1rem;
        justify-content: start;
        flex-wrap: wrap;
        background-color: #1c4267;
        padding: 10px;
    }

    .category-button {
        padding: 0.5rem 1rem;
        border-radius: 0.25rem;
        background-color: transparent;
        color: #e5e7eb;
        cursor: pointer;
        border: none;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .category-button.selected {
        background-color: #fff;
        color: #982121;
    }

    .category-button:focus {
        outline: none;
    }

    .posts-list {
        list-style-type: none;
        padding: 0;
        margin: 0;
        border-radius: 0.375rem;
        background-color: white;
        border: 1px solid #e5e7eb;
    }

    .post-item {
        padding: 0.5rem;
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
        border-bottom: 1px solid #d2d5dbc9;
        position: relative;
    }

    .post-item:hover {
        background: #e5e7eb;
    }

    .post-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        width: 100%;
    }

    .post-details {
        width: 100%;
    }

    .post-title {
        margin-top: 8px;
        font-weight: 600;
        font-size: 16px;
    }

    .post-date {
        font-size: 0.875rem;
        color: #6b7280;
    }

    .read-more {
        display: flex;
        align-items: center;
        gap: 0.25rem;
        color: #2563eb;
        text-decoration: none;
    }

    .read-more:hover {
        text-decoration: underline;
    }

    .no-posts {
        padding: 1rem;
        text-align: center;
        color: #6b7280;
    }
</style>
@endpush