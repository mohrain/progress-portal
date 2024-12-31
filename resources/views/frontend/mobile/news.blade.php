@extends('frontend.layouts.app', ['title' => __('सूचना')])
@section('content')
    <div class="container">
        <h4 class="fw-bold mb-3 text-theme-color">सूचनाहरू</h4>

        @php
            $postCategories = App\PostCategory::with('childcategories.childcategories')
                ->where('parent_id', 1)
                ->actived()
                ->get();
        @endphp

        {{-- News Type Tabs --}}
        <div>
            <ul class="nav nav-underline shadow-md rounded-md" id="news-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-category-id="all" href="javascript:void(0);"
                        onclick="filterNewsTab('all')">सबै</a>
                </li>
                @foreach ($postCategories as $postCategory)
                    <li class="nav-item">
                        <a class="nav-link" data-category-id="{{ $postCategory->id }}" href="javascript:void(0);"
                            onclick="filterNewsTab('{{ $postCategory->id }}')">
                            {{ $postCategory->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        {{-- News Container --}}
        <div id="news-container" class="mt-4">
            @foreach ($postCategories as $postCategory)
                <div class="news-category" data-category-id="{{ $postCategory->id }}">
                    <h5 class="bg-theme-color-blue text-center py-2">
                        {{ $postCategory->name }}
                    </h5>
                    <ul class="list-group mb-4">
                        @php
                            $posts = $postCategory->posts()->latest()->take(5)->get();
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
                            <li class="list-group-item text-center">कुनैपनि सूचना छैन !!!</li>
                        @endforelse
                    </ul>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        /* Style for active nav link */
        #news-tabs {
            background: #fff;
            padding: 3px 0;
            font-size: 0.7rem;
            font-weight: bold;
            display: flex;
            overflow-y: scroll;
        }

        .nav-link.active {
            color: red;
            border-bottom: solid 2px red;
            /* background-color: red; */
            /* Bootstrap primary color */
            /* border-radius: 0.25rem; */
            /* Optional: rounded corners */
            padding: 0.5rem;
            /* Optional: spacing */
        }

        .nav-link {
            color: #5f5c5c;
            /* Default color */
            transition: background-color 0.3s, color 0.3s;
            /* Smooth transition */
        }

        .nav-link:hover {
            color: red;
            /* background-color: red; */
            /* Change on hover */
        }
    </style>

    <script>
        function filterNewsTab(categoryId) {
            // Highlight the active tab
            const tabs = document.querySelectorAll('.nav-link');
            tabs.forEach(tab => {
                tab.classList.remove('active');
                if (tab.getAttribute('data-category-id') === categoryId) {
                    tab.classList.add('active');
                }
            });

            // Show or hide news categories
            const allCategories = document.querySelectorAll('.news-category');
            allCategories.forEach(category => {
                if (categoryId === 'all' || category.getAttribute('data-category-id') === categoryId) {
                    category.style.display = 'block';
                } else {
                    category.style.display = 'none';
                }
            });
        }

        // Show all categories by default
        filterNewsTab('all');
    </script>
@endsection
