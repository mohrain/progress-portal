<li class="nav-item">
    <a class="nav-link" aria-current="page" href="/">गृह पृष्ठ</a>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        प्रदेश सभा
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li>
            <a class="dropdown-item" href="{{ route('pages.show', 1) }}">प्रदेश सभा परिचय</a>
        </li>
        <li><a class="dropdown-item" href="{{ route('office-bearers.frontendIndex') }}">पदाधिकारीहरु</a></li>
        <li>
            <a class="dropdown-item" href="{{ route('pages.show', 5) }}">कार्यव्यवस्था परामर्श समिति</a>
        </li>
        <li><a class="dropdown-item" href="{{ route('current-parliamentary-parties.frontendIndex') }}">संसदीय दल</a></li>
        <li><a class="dropdown-item" href="{{ route('office-bearers.frontendIndexOld') }}">पूर्व पदाधिकारीहरु</a></li>

    </ul>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        प्रदेश सभा सचिवालय
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li>
            <a class="dropdown-item" href="{{ route('pages.show', 2) }}">संगठनिक संरचना</a>
        </li>
        <li><a class="dropdown-item" href="{{ route('pages.show', 3) }}">दरबन्दी संरचना</a></li>
        <li><a class="dropdown-item" href="{{ route('employees.frontendIndex') }}">कर्मचारी विवरण</a></li>
        {{-- <li><a class="dropdown-item" href="{{ route('employees.frontendIndexOld') }}">पूर्व कर्मचारी विवरण</a></li> --}}
    </ul>
</li>

<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        सदस्यहरु
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="{{ route('members.frontendIndex') }}">सदस्यहरुका विवरण</a></li>
        <li><a class="dropdown-item" href="{{ route('members.frontendIndexOld') }}">पूर्व सदस्यहरुका विवरण </a></li>
    </ul>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        समिति
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        @foreach (\App\Models\Committee::get() as $committee)
        <li><a class="dropdown-item" href="{{ route('frontend.committees.show', $committee->slug) }}">{{ $committee->name }}</a></li>
        @endforeach

    </ul>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        विधेयक
    </a>
    <x-bill-type-view />
</li>
<x-post-category-menu-view />
<li class="nav-item">
    <a class="nav-link" href="/gallery">फोटो संग्रह</a>
</li>
