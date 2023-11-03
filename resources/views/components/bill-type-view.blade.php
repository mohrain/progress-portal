<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
    @foreach ($billTypes as $billType)
    <li>
        <a class="dropdown-item" href="{{route('bill-types.show',$billType)}}">{{ $billType->name }}</a>
    </li>
    @endforeach
</ul>
