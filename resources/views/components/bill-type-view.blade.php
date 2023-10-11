<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
    @foreach ($billTypes as $billType)
        <li>
            <a class="dropdown-item" href="#">{{ $billType->name }}</a>
        </li>
            @if ($loop->last)
            @else
                <hr class="dropdown-divider">
            @endif

    @endforeach
</ul>
