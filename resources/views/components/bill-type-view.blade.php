<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
    @foreach ($billTypes as $billType)
        <li>
            <a class="dropdown-item" href="{{route('bill-types.show',$billType)}}">{{ $billType->name }}</a>
        </li>
            @if ($loop->last)
            @else
                <hr class="dropdown-divider">
            @endif

    @endforeach
</ul>
