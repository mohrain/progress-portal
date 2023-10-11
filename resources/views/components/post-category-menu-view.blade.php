@foreach ($postCategoryMenus as $categoryMenu)
    @foreach ($postCategories as $category)
        @if ($categoryMenu->post_category_id == $category->id)
            @if ($category->childCategories->isEmpty())
                <li class="nav-item">
                    <a href="{{ route('post-categories.show', $category) }}"
                        class="nav-link scrollto">{{ $category->name }}</a>
                </li>
            @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ $category->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($category->childCategories as $secondLevelCategory)
                            <li>
                                <a href="{{ route('post-categories.show', $secondLevelCategory) }}"
                                    class="dropdown-item text-capitalize">{{ $secondLevelCategory->name }}</a>
                            </li>
                            @if ($loop->last)
                            @else
                                <hr class="dropdown-divider">
                            @endif
                        @endforeach
                    </ul>
                </li>
            @endif
        @endif
    @endforeach
@endforeach
