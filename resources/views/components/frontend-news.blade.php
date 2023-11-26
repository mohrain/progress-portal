<div class="row my-4">
    @foreach ($postCategories as $postCategory)
        @php
            if ($postCategory->name == 'स्व: प्रकाशन') {
                continue;
            }
        @endphp
        <div class="col-md-4">
            <div class="bg-theme-color-blue py-3 text-center">
                {{ $postCategory->name }}
            </div>
            <ul class="list-group">
                @php

                    $posts = $postCategory
                        ->posts()
                        ->latest()
                        ->take(5)
                        ->get();

                @endphp
                @forelse ($posts as $post)
                    <li class="list-group-item d-flex justify-content-between align-items-start">

                        <div class="ms-2 me-auto">
                            <div class="fw-bold">{{ $post->title }}</div>
                            <span class="text-muted">

                                {{ $post->created_at }}
                            </span>
                        </div>

                        <a class="badge btn-primary rounded-pill" href="{{ route('posts.show', $post) }}">पढ्नुहोस् <i
                                class="bi bi-chevron-double-right"></i></a>

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
