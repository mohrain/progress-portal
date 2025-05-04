@if ($postCategories->isNotEmpty())
    <ul class="nav nav-pills justify-content-center mb-3">
        @foreach ($postCategories as $category)
            <li class="nav-item">
                <a class="nav-link {{ $selectedCategoryId == $category->id ? 'active' : '' }}"
                   href="{{ request()->fullUrlWithQuery(['category' => $category->id]) }}">
                    {{ $category->name }}
                </a>
            </li>
        @endforeach
    </ul>

    <div class="card">
        <div class="card-header bg-theme-color-blue text-white text-center">
            {{ $postCategories->firstWhere('id', $selectedCategoryId)?->name ?? 'सूचना' }}
        </div>

        <ul class="list-group list-group-flush">
            @forelse ($posts as $post)
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">{{ $post->title }}</div>
                        <small class="text-muted">{{ $post->created_at->format('Y-m-d') }}</small>
                    </div>
                    <a class="badge btn-primary rounded-pill" href="{{ route('posts.show', $post) }}">
                        पढ्नुहोस् <i class="bi bi-chevron-double-right"></i>
                    </a>
                </li>
            @empty
                <li class="list-group-item text-center">कुनैपनि सूचना छैन !!!</li>
            @endforelse
        </ul>
    </div>
@else
    <p class="text-center text-danger">सूचना श्रेणीहरू उपलब्ध छैनन्।</p>
@endif
