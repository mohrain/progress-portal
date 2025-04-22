@php
    // Get the category objects first
    $category10 = $postCategories->firstWhere('id', 10);
    $category4 = $postCategories->firstWhere('id', 4);

    // Only call methods if the category exists
    $category10Posts = $category10 ? $category10->posts()->latest()->take(5)->get() : collect();
    $category4Posts = $category4 ? $category4->posts()->latest()->take(5)->get() : collect();

    // Merge and sort as before
    $mergedPosts = $category4Posts->merge($category10Posts)->sortByDesc('created_at')->take(5)->values();
@endphp


<div class="row my-4">
    @foreach ($postCategories as $postCategory)
        {{-- Skip category 10 because it's merged into category 4 --}}
        @if ($postCategory->id == 10)
            @continue
        @endif

        <div class="col-md-4">
            <div class="bg-theme-color-blue py-3 text-center">
                {{-- Show category 4's title only when displaying merged posts --}}
                {{ $postCategory->name }}
            </div>
            <ul class="list-group">
                @php
                    // Use merged posts for category 4, otherwise fetch normally
                    $posts = $postCategory->id == 4 ? $mergedPosts : $postCategory->posts()->latest()->take(5)->get();
                @endphp

                @forelse ($posts as $post)
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">{{ $post->title }}</div>
                            <span class="text-muted">{{ $post->created_at }}</span>
                        </div>
                        <a class="badge btn-primary rounded-pill" href="{{ route('posts.show', $post) }}">
                            पढ्नुहोस् <i class="bi bi-chevron-double-right"></i>
                        </a>
                    </li>
                @empty
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        कुनैपनि सूचना छैन !!!
                    </li>
                @endforelse

                <a href="{{ route('post-categories.show', $postCategory) }}"
                    class="nav-link bg-theme-color-blue text-center">
                    सबै सूचनाहरु <i class="bi bi-chevron-double-right"></i>
                </a>
            </ul>
        </div>
    @endforeach
</div>
